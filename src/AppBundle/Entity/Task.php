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
     * @var string
     * @ORM\Column(type="string", length=250)
     */
    private $messaggio;

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

    /**
     * Set messaggio
     *
     * @param string $messaggio
     *
     * @return Task
     */
    public function setMessaggio($messaggio)
    {
        $this->messaggio = $messaggio;

        return $this;
    }

    /**
     * Get messaggio
     *
     * @return string
     */
    public function getMessaggio()
    {
        return $this->messaggio;
    }
}
