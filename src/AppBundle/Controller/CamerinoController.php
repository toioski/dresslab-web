<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Articolo;
use AppBundle\Entity\ArticoloProvato;
use AppBundle\Entity\Flag;
use AppBundle\Entity\ProdottoVendutoInsieme;
use AppBundle\Entity\Task;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CamerinoController
 *
 * @package AppBundle\Controller
 * @Route("/camerino")
 */
class CamerinoController extends BaseController
{
    const CAMERINO_VUOTO = 1;
    const CAMERINO_INIZIALIZZATO = 2;
    const CAMERINO_NUOVO_CAPO = 3;

    /**
     * @Route(name="app_camerino_index")
     */
    public function indexAction() {
        return $this->render('camerino/index.html.twig', array(// ...
        ));
    }

    /**
     * @Route("/dress/{id}", name="app_camerino_dress_detail", requirements={"id":"\d+"})
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dressDetailAction($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        /** @var Articolo $articolo */
        $articolo = $em->getRepository("AppBundle:Articolo")
            ->find($id);

        $path = '/assets/images/vestiti/capo_' . $articolo->getId() . '.jpg';
        
        $qb = $em->getRepository("AppBundle:ProdottoVendutoInsieme")->createQueryBuilder('pvi');
        $qb->where('pvi.vendutoCon = :prodotto')
            ->setParameter('prodotto', $articolo->getProdotto()->getId());
        /** @var ProdottoVendutoInsieme[] $pvi */
        $pvi = $qb->getQuery()->getResult();
        
        /** @var Articolo[] $vendutiInsieme */
        $vendutiInsieme = [];
        $path_immagini = [];
        foreach ($pvi as $prodV) {
            $prodotto = $prodV->getProdotto();
            $articoloVetrina = $em->getRepository("AppBundle:Articolo")
                ->findOneBy([
                    "prodotto" => $prodotto->getId(),
                    "vetrina" => true
                ]);
            $vendutiInsieme[] = $articoloVetrina;
            $path_immagini[$articoloVetrina->getId()] =
                $this->get('assets.packages')->getUrl(
                    '/assets/images/vestiti/capo_' . $articoloVetrina->getId() . '.jpg');
        }

        return $this->render('camerino/detail.html.twig', array(
            "articolo" => $articolo,
            "path_immagine" => $this->get('assets.packages')->getUrl($path),
            "vendutiInsieme" => $vendutiInsieme,
            "path_insieme" => $path_immagini
        ));
    }
    
    

    /**
     * @Route("/dress/add/{id}", name="app_camerino_dress_add")
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
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

        if (count($articoliProvati) == 0) {
            $articoloProvato = new ArticoloProvato();
            $articoloProvato->setArticolo($articolo)
                ->setQuantitaProvati(1)
                ->setData(new \DateTime("now"));
            var_dump("vuoto");
            die();
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
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/rfid", name="app_camerino_rfid")
     */
    public function rfidAction() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Flag[] $flag */
        $flag = $em->getRepository("AppBundle:Flag")
            ->findAll();
        if (count($flag) == 0) {
            /** @var Flag $flag */
            $flag = new Flag();
            $flag->setTrue(TRUE);
        } else {
            /** @var Flag $flag */
            $flag = $flag[0];
            $flag->setTrue(!$flag->getTrue());
        }
        $em->persist($flag);
        $em->flush();
        return $this->jsonResponse($this->serialize($flag));
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/rfid/show", name="app_camerino_rfid_show")
     */
    public function showRfidAction() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Flag[] $flags */
        $flags = $em->getRepository("AppBundle:Flag")->findAll();
        if (count($flags) == 0) {
            return new JsonResponse(["message" => "not set"], 404);
        } else {
            return $this->jsonResponse($this->serialize($flags[0]));
        }
    }

    /**
     * @Route("/reset", name="app_camerino_reset")
     */
    public function resetAction() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $flag = $em->getRepository("AppBundle:Flag")->findAll();
        if (count($flag) > 0) {
            foreach ($flag as $f) {
                $em->remove($f);
            }
            $em->flush();
        }

        return new JsonResponse(["success" => TRUE], 200);
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @Route("/dress/{id}/request", name="app_camerino_richiedi_articolo")
     */
    public function setTaskAction($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $articolo = $em->getRepository("AppBundle:Articolo")
            ->find($id);
        if ($articolo == null) {
            return new JsonResponse(["success" => false], 404);
        }

        $task = new Task();
        $task->setArticolo($articolo)
            ->setCamerino("Camerino 1");
        $em->persist($task);
        $em->flush();

        return new JsonResponse(["success" => true], 200);
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @Route("/product/{id}/taglia/{taglia}/colore/{colore}")
     */
    public function addTaskAction($id, $taglia, $colore) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $articolo = $em->getRepository("AppBundle:Articolo")
            ->findOneBy([
                'prodotto' => $id,
                'taglia' => $taglia,
                'colore' => $colore
            ]);
        if ($articolo == null) {
            return new JsonResponse(["success" => false], 404);
        }

        $task = new Task();
        $task->setArticolo($articolo)
            ->setCamerino("Camerino 1");
        $em->persist($task);
        $em->flush();

        return new JsonResponse(["success" => true], 200);
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @Route("/dress/{id}/taglie", name="app_camerino_taglie_disponibili")
     */
    public function getTaglieAction($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $articolo = $em->getRepository("AppBundle:Articolo")
            ->find($id);
        if ($articolo == null) {
            return new JsonResponse(["success" => false], 404);
        }

        $taglie = [];

        $qb = $em->getRepository("AppBundle:Articolo")
            ->createQueryBuilder('a');
        $qb->where("a.prodotto = :prodotto")
            ->groupBy("a.taglia")
            ->setParameter('prodotto', $articolo->getId());
        /** @var Articolo[] $articoli */
        $articoli = $qb->getQuery()->getResult();
        foreach ($articoli as $item) {
            $taglie[] = $item->getTaglia();
        }
        return new JsonResponse(['taglie' => $taglie]);
    }

    /**
     * @param $id
     * @Route("/product/{id}/vetrina")
     *
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function getArticoloVetrina($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $prodotto = $em->getRepository("AppBundle:Prodotto")
            ->find($id);
        if ($prodotto == null) {
            return new JsonResponse(["success" => false], 404);
        }

        $articoloVetrina = $em->getRepository("AppBundle:Articolo")
            ->findBy([
                "prodotto" => $prodotto->getId(),
                "vetrina" => true
            ]);

        return $this->jsonResponse($this->articoliSerializer($articoloVetrina));
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @Route("/dress/{id}/colori", name="app_camerino_colori_disponibili")
     */
    public function getColoriAction($id) {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $articolo = $em->getRepository("AppBundle:Articolo")
            ->find($id);
        if ($articolo == null) {
            return new JsonResponse(["success" => false], 404);
        }

        $colori = [];

        $qb = $em->getRepository("AppBundle:Articolo")
            ->createQueryBuilder('a');
        $qb->where("a.prodotto = :prodotto")
            ->groupBy("a.colore")
            ->setParameter('prodotto', $articolo->getId());
        /** @var Articolo[] $articoli */
        $articoli = $qb->getQuery()->getResult();
        foreach ($articoli as $item) {
            $colori[] = [
                "colore" => $item->getColore(),
                "colore_hex" => $item->getColoreHex()
            ];
        }
        return new JsonResponse(['colori' => $colori]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/task/list", name="app_camerino_task_list")
     */
    public function getTaskListAction() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        /** @var Task[] $tasks */
        $tasks = $em->getRepository("AppBundle:Task")->findAll();
        return $this->jsonResponse($this->serialize($tasks));
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return JsonResponse
     * @Route("/task/{id}/message", name="app_camerino_task_set_message")
     * @Method("POST")
     */
    public function serveTaskAction(Request $request, $id) {
        try {
            $data = $this->jsonRequest($request);
            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();

            $task = $em->getRepository("AppBundle:Task")->find($id);
            if ($task == null) {
                return new JsonResponse(["success" => false], 404);
            }
            $task->setMessaggio($data['messaggio']);
            $em->persist($task);
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/dress/list", name="app_camerino_list_dresses")
     */
    public function getCapiInCamerinoAction() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        // @TODO Cambiare gli id dei capi
        /** @var Articolo[] $articoli */
        $articoli = [];

        $articoli[] = $em->getRepository("AppBundle:Articolo")->find(1);
        $articoli[] = $em->getRepository("AppBundle:Articolo")->find(2);
        $articoli[] = $em->getRepository("AppBundle:Articolo")->find(3);

        switch ($this->getCamerinoStatus()) {
            case self::CAMERINO_VUOTO: {
                $response = new JsonResponse([], 200);
                break;
            }
            case self::CAMERINO_INIZIALIZZATO: {
                $response = $this->jsonResponse($this->articoliSerializer($articoli));
                break;
            }
            case self::CAMERINO_NUOVO_CAPO: {
                $qb = $em->getRepository("AppBundle:Task")
                    ->createQueryBuilder('t');
                $qb->where('t.messaggio IS NOT NULL');
                /** @var Task[] $task */
                $task = $qb->getQuery()->getResult();

                if (count($task) > 0) {
                    /** @var Task $task */
                    $task = $task[0];
                    $articoli[] = $task->getArticolo();
                    $em->remove($task);
                    $em->flush();
                }
                $response = $this->jsonResponse($this->articoliSerializer($articoli));
                break;
            }
            default: {
                $response = new JsonResponse([], 200);
            }
        }
        return $response;
    }

    private function getCamerinoStatus() {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $flag = $em->getRepository("AppBundle:Flag")->findAll();
        if (count($flag) > 0) {
            /** @var Flag $flag */
            $flag = $flag[0];
            if ($flag->getTrue()) {
                return self::CAMERINO_INIZIALIZZATO;
            } else {
                return self::CAMERINO_NUOVO_CAPO;
            }
        } else {
            return self::CAMERINO_VUOTO;
        }
    }
}
