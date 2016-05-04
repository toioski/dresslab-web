<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CamerinoController extends Controller
{
    /**
     * @Route("/camerino")
     */
    public function indexAction()
    {
        return $this->render('camerino/index.html.twig', array(
            // ...
        ));
    }

}
