<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Articolo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CamerinoController
 *
 * @package AppBundle\Controller
 *
 * @Route("/camerino")
 */
class CamerinoController extends BaseController
{
    /**
     * @Route(name="app_camerino_index")
     */
    public function indexAction()
    {
        return $this->render('camerino/index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/dress/add/{id}", name="app_camerino_dress_add")
     */
    public function enterDressAction($id) {
        $em = $this->getDoctrine()->getManager();
        /** @var Articolo $articolo */
        $articolo = $em->getRepository("AppBundle:Articolo")
            ->find($id);

        return $this->jsonResponse($this->serialize($articolo));
    }

    /**
     * @Route("/task/list", name="app_camerino_get_tasks")
     */
    public function getTasks() {
        
    }
}
