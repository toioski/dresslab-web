<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Prodotto;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadInitData implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager) {
        // Creo un prodotto
        $prodotto = new Prodotto();
        $prodotto->setNome("Maglioncino");

        // Inserisco nel database
        $manager->persist($prodotto);

        // Flush del database
        $manager->flush();
    }

    public function getOrder() {
        return 0;
    }
}