<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Flag
 *
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="flag")
 */
class Flag
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="flag")
     */
    private $true = false;

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
     * Set true
     *
     * @param boolean $true
     *
     * @return Flag
     */
    public function setTrue($true)
    {
        $this->true = $true;

        return $this;
    }

    /**
     * Get true
     *
     * @return boolean
     */
    public function getTrue()
    {
        return $this->true;
    }
}
