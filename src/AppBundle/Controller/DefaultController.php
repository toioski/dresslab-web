<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Articolo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/articolo/{id}", name="app_articolo_get")
     */
    public function getArticoloAction($id) {
        $em = $this->getDoctrine()->getManager();
        /** @var Articolo $articolo */
        $articolo = $em->getRepository("AppBundle:Articolo")
            ->find($id);
        return $this->jsonResponse($this->serialize($articolo));
    }

    /**
     * @param $id
     *
     * @return Response
     *
     * @Route("/articolo/{id}/image", name="app_articolo_image_get")
     */
    public function getImmagineArticolo($id) {
        $imagePath = $this->get('kernel')->getRootDir() . DIRECTORY_SEPARATOR
            . "Resources" . DIRECTORY_SEPARATOR
            . "assets" . DIRECTORY_SEPARATOR
            . "images" . DIRECTORY_SEPARATOR
            . "vestiti";

        $filepath = realpath($imagePath . DIRECTORY_SEPARATOR . "capo_{$id}.jpg");
        if(! file_exists($filepath)) {
            throw new NotFoundHttpException();
        }

        $content = file_get_contents($filepath);

        $response = new Response();
        $response->headers->set("Content-Type", "image/jpg");
        $response->setContent(base64_encode($content));
        return $response;
    }
}
