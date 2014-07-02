<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipio
 *
 * @ORM\Table(name="municipio", indexes={@ORM\Index(name="codi_edo", columns={"codi_edo", "codi_eje"}), @ORM\Index(name="IDX_FE98F5E04011D818", columns={"codi_edo"})})
 * @ORM\Entity
 */
class Municipio
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_muni", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiMuni = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_muni", type="string", length=100, nullable=true)
     */
    private $nombMuni;

    /**
     * @var string
     *
     * @ORM\Column(name="codi_eje", type="string", length=11, nullable=true)
     */
    private $codiEje;

    /**
     * @var \Estado
     *
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_edo", referencedColumnName="codi_edo")
     * })
     */
    private $codiEdo;



    /**
     * Get codiMuni
     *
     * @return string 
     */
    public function getCodiMuni()
    {
        return $this->codiMuni;
    }

    /**
     * Set nombMuni
     *
     * @param string $nombMuni
     * @return Municipio
     */
    public function setNombMuni($nombMuni)
    {
        $this->nombMuni = $nombMuni;

        return $this;
    }

    /**
     * Get nombMuni
     *
     * @return string 
     */
    public function getNombMuni()
    {
        return $this->nombMuni;
    }

    /**
     * Set codiEje
     *
     * @param string $codiEje
     * @return Municipio
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
     * Set codiEdo
     *
     * @param \SSCM\CipeeBundle\Entity\Estado $codiEdo
     * @return Municipio
     */
    public function setCodiEdo(\SSCM\CipeeBundle\Entity\Estado $codiEdo = null)
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
