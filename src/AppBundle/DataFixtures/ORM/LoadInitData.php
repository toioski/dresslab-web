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

        /**
         * Pantaloni
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Pantaloni");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore C1")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore C1")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore C1")
            ->setTaglia("XL")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore C2")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore C2")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore C2")
            ->setTaglia("L")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);




        /**
         * Camicia
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Camicia");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#FFFFFF")
            ->setPosizione("Settore B5")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#FFFFFF")
            ->setPosizione("Settore B5")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#FFFFFF")
            ->setPosizione("Settore B5")
            ->setTaglia("XL")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#FFFFFF")
            ->setPosizione("Settore B5")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#FFFFFF")
            ->setPosizione("Settore B5")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore B5")
            ->setTaglia("L")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);


        /**
         * T-Shirt
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("T-Shirt");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore E1")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Rosa")
            ->setColoreHex("#ffd2e8")
            ->setPosizione("Settore E1")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore E1")
            ->setTaglia("XL")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore E1")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore E1")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore E1")
            ->setTaglia("L")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);


        /**
         * Scarpe
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Scarpa da passeggio");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A4")
            ->setTaglia("39")
            ->setPrezzo(89.00)
            ->setQuantita(7);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A4")
            ->setTaglia("37")
            ->setPrezzo(89.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A4")
            ->setTaglia("36")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A4")
            ->setTaglia("38")
            ->setPrezzo(89.00)
            ->setQuantita(4);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A4")
            ->setTaglia("38.5")
            ->setPrezzo(89.00)
            ->setQuantita(3);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A4")
            ->setTaglia("37.5")
            ->setPrezzo(89.00)
            ->setQuantita(2);
        $manager->persist($articolo);


        /**
         * tajer
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Tajer");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A3")
            ->setTaglia("S")
            ->setPrezzo(99.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Blue")
            ->setColoreHex("#0000FF")
            ->setPosizione("Settore A3")
            ->setTaglia("M")
            ->setPrezzo(99.00)
            ->setQuantita(5);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bordeaux")
            ->setColoreHex("#D8D8D8")
            ->setPosizione("Settore A3")
            ->setTaglia("L")
            ->setPrezzo(99.00)
            ->setQuantita(7);
        $manager->persist($articolo);




        /**
         * Cappotto
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Cappotto");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore C5")
            ->setTaglia("S")
            ->setPrezzo(79.00)
            ->setQuantita(5);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore C5")
            ->setTaglia("M")
            ->setPrezzo(79.00)
            ->setQuantita(8);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore C5")
            ->setTaglia("L")
            ->setPrezzo(79.00)
            ->setQuantita(3);
        $manager->persist($articolo);

        /**
         * Maglia
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Maglia");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Rosa")
            ->setColoreHex("#ffd2e8")
            ->setPosizione("Settore D1")
            ->setTaglia("S")
            ->setPrezzo(29.00)
            ->setQuantita(8);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore D1")
            ->setTaglia("M")
            ->setPrezzo(29.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#E6DAA6")
            ->setPosizione("Settore D1")
            ->setTaglia("L")
            ->setPrezzo(29.00)
            ->setQuantita(4);
        $manager->persist($articolo);

        /**
         * Cardigan
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Cardigan");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore D2")
            ->setTaglia("S")
            ->setPrezzo(39.00)
            ->setQuantita(3);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Grigio Scuro")
            ->setColoreHex("#4d4d4d")
            ->setPosizione("Settore D2")
            ->setTaglia("M")
            ->setPrezzo(39.00)
            ->setQuantita(5);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Grigio Chiaro")
            ->setColoreHex("#cccccc")
            ->setPosizione("Settore D2")
            ->setTaglia("L")
            ->setPrezzo(39.00)
            ->setQuantita(7);
        $manager->persist($articolo);


        /**
         * Pullover
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Pullover");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Viola Rosso")
            ->setColoreHex("#DB2645")
            ->setPosizione("Settore B4")
            ->setTaglia("S")
            ->setPrezzo(39.00)
            ->setQuantita(5);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Grigio Antracite")
            ->setColoreHex("#293133")
            ->setPosizione("Settore B4")
            ->setTaglia("M")
            ->setPrezzo(39.00)
            ->setQuantita(5);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Grigio Chiaro")
            ->setColoreHex("#cccccc")
            ->setPosizione("Settore B4")
            ->setTaglia("L")
            ->setPrezzo(39.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        // Flush del database
        $manager->flush();
    }

    public function getOrder() {
        return 0;
    }
}