<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Articolo;
use AppBundle\Entity\ArticoloProvato;
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

        /** @var ArticoloProvato[] $articoliProvati */
        $articoliProvati = $em->getRepository("AppBundle:ArticoloProvato")
            ->findBy([
                "articolo" => $articolo->getId(),
                "data" => new \DateTime("now")
            ]);

        if(count($articoliProvati) == 0) {
            $articoloProvato = new ArticoloProvato();
            $articoloProvato->setArticolo($articolo)
                ->setQuantitaProvati(1)
                ->setData(new \DateTime("now"));
            var_dump("vuoto"); die();
        } else {
            $articoloProvato = $articoliProvati[0];
            $articoloProvato->setQuantitaProvati(
                $articoloProvato->getQuantitaProvati() + 1);
        }
        $em->persist($articoloProvato);
        $em->flush();

        return $this->jsonResponse($this->serialize($articolo));
    }

    /**
     * @Route("/task/list", name="app_camerino_get_tasks")
     */
    public function getTasks() {
        
    }
}
