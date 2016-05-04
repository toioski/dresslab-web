<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class ArticoloProvato
 *
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="articolo_provato")
 */
class ArticoloProvato
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Articolo
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Articolo")
     */
    private $articolo;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $quantitaProvati = 0;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $quantitaAcquistati = 0;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $data;

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
     * Set quantitaProvati
     *
     * @param integer $quantitaProvati
     *
     * @return ArticoloProvato
     */
    public function setQuantitaProvati($quantitaProvati)
    {
        $this->quantitaProvati = $quantitaProvati;

        return $this;
    }

    /**
     * Get quantitaProvati
     *
     * @return integer
     */
    public function getQuantitaProvati()
    {
        return $this->quantitaProvati;
    }

    /**
     * Set quantitaAcquistati
     *
     * @param integer $quantitaAcquistati
     *
     * @return ArticoloProvato
     */
    public function setQuantitaAcquistati($quantitaAcquistati)
    {
        $this->quantitaAcquistati = $quantitaAcquistati;

        return $this;
    }

    /**
     * Get quantitaAcquistati
     *
     * @return integer
     */
    public function getQuantitaAcquistati()
    {
        return $this->quantitaAcquistati;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return ArticoloProvato
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set articolo
     *
     * @param \AppBundle\Entity\Articolo $articolo
     *
     * @return ArticoloProvato
     */
    public function setArticolo(\AppBundle\Entity\Articolo $articolo = null)
    {
        $this->articolo = $articolo;

        return $this;
    }

    /**
     * Get articolo
     *
     * @return \AppBundle\Entity\Articolo
     */
    public function getArticolo()
    {
        return $this->articolo;
    }
}
