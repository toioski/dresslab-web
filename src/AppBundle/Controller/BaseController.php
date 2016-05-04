<?php
/**
 * Created by PhpStorm.
 * User: ilario
 * Date: 04/05/16
 * Time: 12.27
 */

namespace AppBundle\Controller;


use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}