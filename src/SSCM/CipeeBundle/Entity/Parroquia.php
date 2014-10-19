<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Parroquia
 *
 * @ORM\Table(name="parroquia", indexes={@ORM\Index(name="codi_muni", columns={"codi_muni"})})
 * @ORM\Entity(repositoryClass="SSCM\CipeeBundle\Entity\ParroquiaRepository")
 * @ExclusionPolicy("all")
 */
class Parroquia
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_parroq", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Expose
     */
    private $codiParroq;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_parroq", type="string", length=100, nullable=true)
     * @Expose
     */
    private $nombParroq;

    /**
     * @var \Municipio
     *
     * @ORM\ManyToOne(targetEntity="Municipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_muni", referencedColumnName="codi_muni")
     * })
     * @Expose
     * @SerializedName("municipio")
     */
    private $codiMuni;

    /**
     * Set codiParroq
     *
     * @param  string    $codiParroq
     * @return Parroquia
     */
    public function setCodiParroq($codiParroq)
    {
        $this->codiParroq = $codiParroq;

        return $this;
    }

    /**
     * Get codiParroq
     *
     * @return string
     */
    public function getCodiParroq()
    {
        return $this->codiParroq;
    }

    /**
     * Set nombParroq
     *
     * @param  string    $nombParroq
     * @return Parroquia
     */
    public function setNombParroq($nombParroq)
    {
        $this->nombParroq = $nombParroq;

        return $this;
    }

    /**
     * Get nombParroq
     *
     * @return string
     */
    public function getNombParroq()
    {
        return $this->nombParroq;
    }

    /**
     * Set codiMuni
     *
     * @param  \SSCM\CipeeBundle\Entity\Municipio $codiMuni
     * @return Parroquia
     */
    public function setCodiMuni(\SSCM\CipeeBundle\Entity\Municipio $codiMuni = null)
    {
        $this->codiMuni = $codiMuni;

        return $this;
    }

    /**
     * Get codiMuni
     *
     * @return \SSCM\CipeeBundle\Entity\Municipio
     */
    public function getCodiMuni()
    {
        return $this->codiMuni;
    }

    public function __toString()
    {
        return $this->getNombParroq()?: '-';
    }
}
