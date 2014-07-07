<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Malla
 *
 * @ORM\Table(name="malla", indexes={@ORM\Index(name="codi_pfg", columns={"codi_pfg"})})
 * @ORM\Entity
 */
class Malla
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_malla", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiMalla = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_malla", type="string", length=100, nullable=true)
     */
    private $nombMalla;

    /**
     * @var \Pfg
     *
     * @ORM\ManyToOne(targetEntity="Pfg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_pfg", referencedColumnName="codi_pfg")
     * })
     */
    private $codiPfg;

    public function __toString()
    {
        return $this->getNombMalla()?: '-';
    }

    /**
     * Get codiMalla
     *
     * @return string 
     */
    public function getCodiMalla()
    {
        return $this->codiMalla;
    }

    /**
     * Set nombMalla
     *
     * @param string $nombMalla
     * @return Malla
     */
    public function setNombMalla($nombMalla)
    {
        $this->nombMalla = $nombMalla;

        return $this;
    }

    /**
     * Get nombMalla
     *
     * @return string 
     */
    public function getNombMalla()
    {
        return $this->nombMalla;
    }

    /**
     * Set codiPfg
     *
     * @param \SSCM\CipeeBundle\Entity\Pfg $codiPfg
     * @return Malla
     */
    public function setCodiPfg(\SSCM\CipeeBundle\Entity\Pfg $codiPfg = null)
    {
        $this->codiPfg = $codiPfg;

        return $this;
    }

    /**
     * Get codiPfg
     *
     * @return \SSCM\CipeeBundle\Entity\Pfg 
     */
    public function getCodiPfg()
    {
        return $this->codiPfg;
    }
}
