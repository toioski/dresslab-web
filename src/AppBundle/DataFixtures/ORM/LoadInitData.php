<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Articolo;
use AppBundle\Entity\Prodotto;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadInitData implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager) {

        /**
         * Maglioncino
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Maglioncino");
        // Inserisco nel database
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore A5")
            ->setTaglia("M")
            ->setPrezzo(89.00)
            ->setQuantita(2)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore A5")
            ->setTaglia("S")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore A5")
            ->setTaglia("L")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);


        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore A5")
            ->setTaglia("M")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore A5")
            ->setTaglia("S")
            ->setPrezzo(89.00)
            ->setQuantita(3);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore A5")
            ->setTaglia("L")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("verde")
            ->setColoreHex("#2596BE")
            ->setPosizione("Settore A5")
            ->setTaglia("S")
            ->setPrezzo(89.00)
            ->setQuantita(3);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("verde")
            ->setColoreHex("#2596BE")
            ->setPosizione("Settore A5")
            ->setTaglia("L")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);


        /**
         * Abito da sera
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Abito da sera");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore B1")
            ->setTaglia("M")
            ->setPrezzo(150.00)
            ->setQuantita(1)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore B2")
            ->setTaglia("S")
            ->setPrezzo(150.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore B2")
            ->setTaglia("S")
            ->setPrezzo(150.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore B2")
            ->setTaglia("L")
            ->setPrezzo(150.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore B2")
            ->setTaglia("M")
            ->setPrezzo(150.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        // Flush del database
        $manager->flush();
    }

    public function getOrder() {
        return 0;
    }
}