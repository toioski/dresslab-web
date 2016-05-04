<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CamerinoController
 *
 * @package AppBundle\Controller
 *
 * @Route("/camerino")
 */
class CamerinoController extends Controller
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
     * @Route("/dress/add", name="app_camerino_dress_add")
     */
    public function enterDressAction() {
        
    }
}
