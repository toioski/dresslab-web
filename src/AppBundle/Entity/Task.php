<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Task
 *
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="task")
 */
class Task
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Articolo")
     */
    private $articolo;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $camerino;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $inElaborazione;

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
     * Set camerino
     *
     * @param string $camerino
     *
     * @return Task
     */
    public function setCamerino($camerino)
    {
        $this->camerino = $camerino;

        return $this;
    }

    /**
     * Get camerino
     *
     * @return string
     */
    public function getCamerino()
    {
        return $this->camerino;
    }

    /**
     * Set inElaborazione
     *
     * @param boolean $inElaborazione
     *
     * @return Task
     */
    public function setInElaborazione($inElaborazione)
    {
        $this->inElaborazione = $inElaborazione;

        return $this;
    }

    /**
     * Get inElaborazione
     *
     * @return boolean
     */
    public function getInElaborazione()
    {
        return $this->inElaborazione;
    }

    /**
     * Set articolo
     *
     * @param \AppBundle\Entity\Articolo $articolo
     *
     * @return Task
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
