<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: vincenzodisciullo
 * Date: 03/05/16
 * Time: 12:59 PM
 */


class ProvaController extends Controller{

    /**
     * @Route("/prova", name="index")
     */
   public function indexAction(){

       return $this->render('prova/index.html.twig');

   }

    /**
     * @Route("/other", name="other")
     */
    public function otherAction(){
        return $this->render('prova/other.html.twig');
    }
}