<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Municipio
 *
 * @ORM\Table(name="municipio", indexes={@ORM\Index(name="codi_edo", columns={"codi_edo", "codi_eje"}), @ORM\Index(name="IDX_FE98F5E04011D818", columns={"codi_edo"})})
 * @ORM\Entity(repositoryClass="SSCM\CipeeBundle\Entity\MunicipioRepository")
 * @ExclusionPolicy("all")
 */
class Municipio
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_muni", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Expose
     */
    private $codiMuni;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_muni", type="string", length=100, nullable=true)
     * @Expose
     */
    private $nombMuni;

    /**
     * @var string
     *
     * @ORM\Column(name="codi_eje", type="string", length=11, nullable=true)
     * @Expose
     */
    private $codiEje;

    /**
     * @var \Estado
     *
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_edo", referencedColumnName="codi_edo")
     * })
     * @Expose
     * @SerializedName("estado")
     */
    private $codiEdo;

    /**
     * Set codiMuni
     *
     * @param  string    $codiMuni
     * @return Municipio
     */
    public function setCodiMuni($codiMuni)
    {
        $this->codiMuni = $codiMuni;

        return $this;
    }

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
     * @param  string    $nombMuni
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
     * @param  string    $codiEje
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
     * @param  \SSCM\CipeeBundle\Entity\Estado $codiEdo
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

    public function __toString()
    {
        return $this->getNombMuni()?: '-';
    }
}
