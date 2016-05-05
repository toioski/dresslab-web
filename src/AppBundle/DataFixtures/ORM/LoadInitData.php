<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Articolo;
use AppBundle\Entity\Prodotto;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadInitData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager) {

        /**
         * Maglioncino
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Maglioncino");
        // Inserisco nel database
        $manager->persist($prodotto);
        $this->addReference('maglioncino', $prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("carta carbone")
            ->setColoreHex("#313034")
            ->setPosizione("Settore A5")
            ->setTaglia("M")
            ->setPrezzo(89.00)
            ->setQuantita(2)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#ffffff")
            ->setPosizione("Settore A5")
            ->setTaglia("S")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("grigio")
            ->setColoreHex("#948488")
            ->setPosizione("Settore A5")
            ->setTaglia("L")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("verde scuro")
            ->setColoreHex("#645d46")
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

        /**
         * Abito da sera
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Abito da sera");
        $manager->persist($prodotto);
        $this->addReference('abitosera', $prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("rosso")
            ->setColoreHex("#f24348")
            ->setPosizione("Settore B1")
            ->setTaglia("M")
            ->setPrezzo(150.00)
            ->setQuantita(1)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("verde")
            ->setColoreHex("#77ac76")
            ->setPosizione("Settore B2")
            ->setTaglia("S")
            ->setPrezzo(150.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue chiaro")
            ->setColoreHex("#7189ac")
            ->setPosizione("Settore B2")
            ->setTaglia("S")
            ->setPrezzo(150.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        /**
         * Pantaloni
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Pantaloni");
        $manager->persist($prodotto);
        $this->addReference('pantaloni', $prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("grigio chiaro")
            ->setColoreHex("#969593")
            ->setPosizione("Settore C1")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("grigio scuro")
            ->setColoreHex("#655f63")
            ->setPosizione("Settore C1")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#cca06f")
            ->setPosizione("Settore C1")
            ->setTaglia("XL")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#9d877a")
            ->setPosizione("Settore C2")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#9d877a")
            ->setPosizione("Settore C2")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("beige")
            ->setColoreHex("#9d877a")
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
        $this->addReference('camicia', $prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#FFFFFF")
            ->setPosizione("Settore B5")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2)
            ->setVetrina(true);
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
        $this->addReference('tshirt', $prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue scuro")
            ->setColoreHex("#0c2754")
            ->setPosizione("Settore E1")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("rosso scuro")
            ->setColoreHex("#671430")
            ->setPosizione("Settore E1")
            ->setTaglia("M")
            ->setPrezzo(105.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("verde chiaro")
            ->setColoreHex("#026257")
            ->setPosizione("Settore E1")
            ->setTaglia("XL")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("carta da zucchero")
            ->setColoreHex("#434c5d")
            ->setPosizione("Settore E1")
            ->setTaglia("S")
            ->setPrezzo(105.00)
            ->setQuantita(2);
        $manager->persist($articolo);


        /**
         * Scarpe
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Scarpe");
        $manager->persist($prodotto);
        $this->addReference('scarpe', $prodotto);


        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("rosso smeraldo")
            ->setColoreHex("#ef3f41")
            ->setPosizione("Settore A4")
            ->setTaglia("39")
            ->setPrezzo(89.00)
            ->setQuantita(7)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("verde chiaro")
            ->setColoreHex("#90c09a")
            ->setPosizione("Settore A4")
            ->setTaglia("37")
            ->setPrezzo(89.00)
            ->setQuantita(2);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("azzurro scuro")
            ->setColoreHex("#9fafc8")
            ->setPosizione("Settore A4")
            ->setTaglia("36")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);


        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("biege")
            ->setColoreHex("#ac7a45")
            ->setPosizione("Settore A4")
            ->setTaglia("36")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("grigio chiaro")
            ->setColoreHex("#989898")
            ->setPosizione("Settore A4")
            ->setTaglia("36")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);


        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("grigio chiaro")
            ->setColoreHex("#bdbdbd")
            ->setPosizione("Settore A4")
            ->setTaglia("36")
            ->setPrezzo(89.00)
            ->setQuantita(1);
        $manager->persist($articolo);



        /**
         * TAILLEUR
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Tailleur");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("Nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore A3")
            ->setTaglia("S")
            ->setPrezzo(99.00)
            ->setQuantita(2)
            ->setVetrina(true);
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
        $this->setReference('cappotto', $prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore C5")
            ->setTaglia("S")
            ->setPrezzo(79.00)
            ->setQuantita(5);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("rosa chiaro")
            ->setColoreHex("#fff2f4")
            ->setPosizione("Settore C5")
            ->setTaglia("M")
            ->setPrezzo(79.00)
            ->setQuantita(8);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore C5")
            ->setTaglia("L")
            ->setPrezzo(79.00)
            ->setQuantita(3)
            ->setVetrina(true);
        $manager->persist($articolo);

        /**
         * Cardigan
         */
        $prodotto = new Prodotto();
        $prodotto->setNome("Cardigan");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("nero")
            ->setColoreHex("#000000")
            ->setPosizione("Settore D2")
            ->setTaglia("S")
            ->setPrezzo(39.00)
            ->setQuantita(3)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("bianco")
            ->setColoreHex("#ffffff")
            ->setPosizione("Settore D2")
            ->setTaglia("M")
            ->setPrezzo(39.00)
            ->setQuantita(5);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("blue")
            ->setColoreHex("#0000B2")
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
            ->setColore("blue")
            ->setColoreHex("#000066")
            ->setPosizione("Settore B4")
            ->setTaglia("S")
            ->setPrezzo(39.00)
            ->setQuantita(5)
            ->setVetrina(true);
        $manager->persist($articolo);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("rosa")
            ->setColoreHex("#ffc0cb")
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


        /**
         * Borse
         */

        $prodotto = new Prodotto();
        $prodotto->setNome("Borse");
        $manager->persist($prodotto);

        $articolo = new Articolo();
        $articolo->setProdotto($prodotto)
            ->setColore("nera")
            ->setColoreHex("#000000")
            ->setPosizione("Settore B4")
            ->setTaglia("-")
            ->setPrezzo(150.00)
            ->setQuantita(5);
        $manager->persist($articolo);


        // Flush del database
        $manager->flush();
    }

    public function getOrder() {
        return 0;
    }
}