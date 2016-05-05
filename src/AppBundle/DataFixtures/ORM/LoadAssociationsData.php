<?php
/**
 * Created by PhpStorm.
 * User: ilario
 * Date: 05/05/16
 * Time: 11.00
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Articolo;
use AppBundle\Entity\Prodotto;
use AppBundle\Entity\ProdottoVendutoInsieme;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAssociationsData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager) {
        /** @var Prodotto $prodotto */
        $prodotto = $this->getReference('maglioncino');
        /** @var Prodotto[] $insieme */
        $insieme = [];
        $insieme[] = $this->getReference('pantaloni');
        $insieme[] = $this->getReference('scarpe');
        foreach ($insieme as $prodottoInsieme) {
            $prodottoVendutoInsieme = new ProdottoVendutoInsieme();
            $prodottoVendutoInsieme->setProdotto($prodottoInsieme);
            $prodottoVendutoInsieme->setFrequenza(10);
            $prodottoVendutoInsieme->setVendutoCon($prodotto);
            $prodotto->addVendutiInsieme($prodottoVendutoInsieme);

            $manager->persist($prodottoVendutoInsieme);
        }
        $manager->persist($prodotto);
        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }

}