<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class TemplateController
 *
 * @package AppBundle\Controller
 *
 * @Route("/template")
 */
class TemplateController extends BaseController
{
    /**
     * @Route("/dresscard")
     */
    public function dressCardAction() {
        return $this->render('template/dress-card.html.twig');
    }
    
    /**
     * @Route("/test")
     */
    public function testAction() {
        return $this->render('template/test.html.twig');
    }
}