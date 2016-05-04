<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Articolo
 *
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="articolo")
 */
class Articolo
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prodotto", inversedBy="articoli")
     */
    private $prodotto;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $rfid;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $colore;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $colore_hex;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $taglia;

    /**
     * @var double
     * @ORM\Column(type="decimal", scale=2)
     */
    private $prezzo;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $quantita;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     */
    private $posizione;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $vetrina = false;

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
     * Set rfid
     *
     * @param string $rfid
     *
     * @return Articolo
     */
    public function setRfid($rfid)
    {
        $this->rfid = $rfid;

        return $this;
    }

    /**
     * Get rfid
     *
     * @return string
     */
    public function getRfid()
    {
        return $this->rfid;
    }

    /**
     * Set colore
     *
     * @param string $colore
     *
     * @return Articolo
     */
    public function setColore($colore)
    {
        $this->colore = $colore;

        return $this;
    }

    /**
     * Get colore
     *
     * @return string
     */
    public function getColore()
    {
        return $this->colore;
    }

    /**
     * Set coloreHex
     *
     * @param string $coloreHex
     *
     * @return Articolo
     */
    public function setColoreHex($coloreHex)
    {
        $this->colore_hex = $coloreHex;

        return $this;
    }

    /**
     * Get coloreHex
     *
     * @return string
     */
    public function getColoreHex()
    {
        return $this->colore_hex;
    }

    /**
     * Set taglia
     *
     * @param string $taglia
     *
     * @return Articolo
     */
    public function setTaglia($taglia)
    {
        $this->taglia = $taglia;

        return $this;
    }

    /**
     * Get taglia
     *
     * @return string
     */
    public function getTaglia()
    {
        return $this->taglia;
    }

    /**
     * Set prezzo
     *
     * @param string $prezzo
     *
     * @return Articolo
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;

        return $this;
    }

    /**
     * Get prezzo
     *
     * @return string
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * Set quantita
     *
     * @param integer $quantita
     *
     * @return Articolo
     */
    public function setQuantita($quantita)
    {
        $this->quantita = $quantita;

        return $this;
    }

    /**
     * Get quantita
     *
     * @return integer
     */
    public function getQuantita()
    {
        return $this->quantita;
    }

    /**
     * Set posizione
     *
     * @param string $posizione
     *
     * @return Articolo
     */
    public function setPosizione($posizione)
    {
        $this->posizione = $posizione;

        return $this;
    }

    /**
     * Get posizione
     *
     * @return string
     */
    public function getPosizione()
    {
        return $this->posizione;
    }

    /**
     * Set vetrina
     *
     * @param boolean $vetrina
     *
     * @return Articolo
     */
    public function setVetrina($vetrina)
    {
        $this->vetrina = $vetrina;

        return $this;
    }

    /**
     * Get vetrina
     *
     * @return boolean
     */
    public function getVetrina()
    {
        return $this->vetrina;
    }

    /**
     * Set prodotto
     *
     * @param \AppBundle\Entity\Prodotto $prodotto
     *
     * @return Articolo
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
}
