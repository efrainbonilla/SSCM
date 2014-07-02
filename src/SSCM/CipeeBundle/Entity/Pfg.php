<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pfg
 *
 * @ORM\Table(name="pfg")
 * @ORM\Entity
 */
class Pfg
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_pfg", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiPfg = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_pfg", type="string", length=100, nullable=true)
     */
    private $nombPfg;



    /**
     * Get codiPfg
     *
     * @return string 
     */
    public function getCodiPfg()
    {
        return $this->codiPfg;
    }

    /**
     * Set nombPfg
     *
     * @param string $nombPfg
     * @return Pfg
     */
    public function setNombPfg($nombPfg)
    {
        $this->nombPfg = $nombPfg;

        return $this;
    }

    /**
     * Get nombPfg
     *
     * @return string 
     */
    public function getNombPfg()
    {
        return $this->nombPfg;
    }
}
