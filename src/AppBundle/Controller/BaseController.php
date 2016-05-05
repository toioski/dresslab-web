<?php
/**
 * Created by PhpStorm.
 * User: ilario
 * Date: 04/05/16
 * Time: 12.27
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Articolo;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BaseController extends Controller
{
    /** @var  Serializer */
    protected $serializer;

    public function __construct() {
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $this->serializer = new Serializer([$normalizer], [new JsonEncoder()]);
    }

    protected function serialize($object) {
        return $this->serializer->serialize($object, 'json');
    }
    
    protected function jsonResponse($json) {
        $response = new Response();
        $response->headers->set("Content-Type", "application/json");
        $response->setContent($json);
        return $response;
    }
    
    protected function jsonRequest(Request $request) {
        $jsonString = $request->getContent();
        return json_decode($jsonString, true);
    }

    /**
     * @param Articolo[] $articoli
     */
    protected function articoliSerializer($articoli) {
        $json = $this->serialize($articoli);
        $arrayData = json_decode($json, true);
        foreach ($arrayData as $k => $articoloArray) {
            $id = $articoloArray['id'];
            $imagePath = $this->get('kernel')->getRootDir() . DIRECTORY_SEPARATOR
                . "Resources" . DIRECTORY_SEPARATOR
                . "assets" . DIRECTORY_SEPARATOR
                . "images" . DIRECTORY_SEPARATOR
                . "vestiti";

            $filepath = realpath($imagePath . DIRECTORY_SEPARATOR . "capo_{$id}.jpg");
            if(! file_exists($filepath)) {
                $arrayData[$k]['image'] = null;
            } else {
                $content = file_get_contents($filepath);
                $arrayData[$k]['image'] = base64_encode($content);
            }
        }
        return json_encode($arrayData, true);
    }
}