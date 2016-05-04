<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class ProdottoVendutoInsieme
 *
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="prodotto_venduto_insieme")
 */

class ProdottoVendutoInsieme
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var Prodotto
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Prodotto")
     */
    private $prodotto;

    /**
     * @var integer
     * @ORM\Column(type="integer", options={"default" = 0})
     */
    private $frequenza;

    /**
     * @var Prodotto
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodotto", inversedBy="vendutiInsieme")
     */
    private $vendutoCon;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set frequenza
     *
     * @param integer $frequenza
     *
     * @return ProdottoVendutoInsieme
     */
    public function setFrequenza($frequenza)
    {
        $this->frequenza = $frequenza;

        return $this;
    }

    /**
     * Get frequenza
     *
     * @return integer
     */
    public function getFrequenza()
    {
        return $this->frequenza;
    }

    /**
     * Set prodotto
     *
     * @param \AppBundle\Entity\Prodotto $prodotto
     *
     * @return ProdottoVendutoInsieme
     */
    public function setProdotto(\AppBundle\Entity\Prodotto $prodotto = null)
    {
        $this->prodotto = $prodotto;

        return $this;
    }

    /**
     * Get prodotto
     *
     * @return \AppBundle\Entity\Prodotto
     */
    public function getProdotto()
    {
        return $this->prodotto;
    }

    /**
     * Set vendutoCon
     *
     * @param \AppBundle\Entity\Prodotto $vendutoCon
     *
     * @return ProdottoVendutoInsieme
     */
    public function setVendutoCon(\AppBundle\Entity\Prodotto $vendutoCon = null)
    {
        $this->vendutoCon = $vendutoCon;

        return $this;
    }

    /**
     * Get vendutoCon
     *
     * @return \AppBundle\Entity\Prodotto
     */
    public function getVendutoCon()
    {
        return $this->vendutoCon;
    }
}
