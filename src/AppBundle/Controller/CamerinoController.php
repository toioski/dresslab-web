<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Articolo;
use AppBundle\Entity\ArticoloProvato;
use AppBundle\Entity\Flag;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $tasks = $em->getRepository("AppBundle:Task")->findBy(["messaggio" => null]);
        return $this->jsonResponse($this->serialize($tasks));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/rfid", name="app_camerino_rfid")
     */
    public function rfidAction() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Flag[] $flag */
        $flag = $em->getRepository("AppBundle:Flag")
            ->findAll();
        if(count($flag) == 0) {
            $flag = new Flag();
            $flag->setTrue(true);
        } else {
            /** @var Flag $flag */
            $flag = $flag[0];
            $flag->setTrue(! $flag->getTrue());
        }
        $em->persist($flag);
        $em->flush();
        return $this->jsonResponse($this->serialize($flag));
    }

    /**
     * @Route("/reset", name="app_camerino_reset")
     */
    public function resetAction() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $flag = $em->getRepository("AppBundle:Flag")->findAll();
        if(count($flag) > 0) {
            foreach ($flag as $f) {
                $em->remove($f);
            }
            $em->flush();
        }

        return new JsonResponse(["success" => true], 200);
    }
}
