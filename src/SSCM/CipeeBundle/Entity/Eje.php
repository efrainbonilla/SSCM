<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eje
 *
 * @ORM\Table(name="eje", indexes={@ORM\Index(name="codi_edo", columns={"codi_edo"})})
 * @ORM\Entity
 */
class Eje
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_eje", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codiEje = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_eje", type="string", length=100, nullable=true)
     */
    private $nombEje;

    /**
     * @var \Estado
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_edo", referencedColumnName="codi_edo")
     * })
     */
    private $codiEdo;

    public function __toString()
    {
        return $this->getNombEje()?: '-';
    }

    /**
     * Set codiEje
     *
     * @param  string $codiEje
     * @return Eje
     */
    public function setCodiEje($codiEje)
    {
        $this->codiEje = $codiEje;

        return $this;
    }

    /**
     * Get codiEje
     *
     * @return string
     */
    public function getCodiEje()
    {
        return $this->codiEje;
    }

    /**
     * Set nombEje
     *
     * @param  string $nombEje
     * @return Eje
     */
    public function setNombEje($nombEje)
    {
        $this->nombEje = $nombEje;

        return $this;
    }

    /**
     * Get nombEje
     *
     * @return string
     */
    public function getNombEje()
    {
        return $this->nombEje;
    }

    /**
     * Set codiEdo
     *
     * @param  \SSCM\CipeeBundle\Entity\Estado $codiEdo
     * @return Eje
     */
    public function setCodiEdo(\SSCM\CipeeBundle\Entity\Estado $codiEdo)
    {
        $this->codiEdo = $codiEdo;

        return $this;
    }

    /**
     * Get codiEdo
     *
     * @return \SSCM\CipeeBundle\Entity\Estado
     */
    public function getCodiEdo()
    {
        return $this->codiEdo;
    }
}
