<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Prodotto
 *
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="prodotto")
 */
class Prodotto
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, length=250)
     */
    private $nome;

    /**
     * @var ProdottoVendutoInsieme[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProdottoVendutoInsieme", mappedBy="vendutoCon")
     */
    private $vendutiInsieme;

    /**
     * @var Articolo[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Articolo", mappedBy="prodotto")
     */
    private $articoli;

    /**
     * Constructor
     */
    public function __construct() {
        $this->vendutiInsieme = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articoli = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Prodotto
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Add vendutiInsieme
     *
     * @param \AppBundle\Entity\ProdottoVendutoInsieme $vendutiInsieme
     *
     * @return Prodotto
     */
    public function addVendutiInsieme(\AppBundle\Entity\ProdottoVendutoInsieme $vendutiInsieme) {
        $this->vendutiInsieme[] = $vendutiInsieme;

        return $this;
    }

    /**
     * Remove vendutiInsieme
     *
     * @param \AppBundle\Entity\ProdottoVendutoInsieme $vendutiInsieme
     */
    public function removeVendutiInsieme(\AppBundle\Entity\ProdottoVendutoInsieme $vendutiInsieme) {
        $this->vendutiInsieme->removeElement($vendutiInsieme);
    }

    /**
     * Get vendutiInsieme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVendutiInsieme() {
        return $this->vendutiInsieme;
    }

    /**
     * Add articoli
     *
     * @param \AppBundle\Entity\Articolo $articoli
     *
     * @return Prodotto
     */
    public function addArticoli(\AppBundle\Entity\Articolo $articoli) {
        $this->articoli[] = $articoli;

        return $this;
    }

    /**
     * Remove articoli
     *
     * @param \AppBundle\Entity\Articolo $articoli
     */
    public function removeArticoli(\AppBundle\Entity\Articolo $articoli) {
        $this->articoli->removeElement($articoli);
    }

    /**
     * Get articoli
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticoli() {
        return $this->articoli;
    }
}
