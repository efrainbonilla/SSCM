<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoAcademico
 *
 * @ORM\Table(name="estado_academico", indexes={@ORM\Index(name="codi_malla", columns={"codi_malla", "codi_aldea"}), @ORM\Index(name="cedu_almn", columns={"cedu_almn"}), @ORM\Index(name="codi_aldea", columns={"codi_aldea"}), @ORM\Index(name="IDX_DFDE279BBDDFE09E", columns={"codi_malla"})})
 * @ORM\Entity
 */
class EstadoAcademico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Alumno
     *
     * @ORM\ManyToOne(targetEntity="Alumno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cedu_almn", referencedColumnName="cedu_almn")
     * })
     */
    private $almn;

    /**
     * @var \Malla
     *
     * @ORM\ManyToOne(targetEntity="Malla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_malla", referencedColumnName="codi_malla")
     * })
     */
    private $malla;


    /**
     * @var \Aldea
     *
     * @ORM\ManyToOne(targetEntity="Aldea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_aldea", referencedColumnName="codi_aldea")
     * })
     */
    private $aldea;

    /**
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer", nullable=true)
     */
    private $estatus;

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
     * Set estatus
     *
     * @param integer $estatus
     * @return EstadoAcademico
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return integer
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set malla
     *
     * @param \SSCM\CipeeBundle\Entity\Malla $malla
     * @return EstadoAcademico
     */
    public function setMalla(\SSCM\CipeeBundle\Entity\Malla $malla = null)
    {
        $this->malla = $malla;

        return $this;
    }

    /**
     * Get malla
     *
     * @return \SSCM\CipeeBundle\Entity\Malla
     */
    public function getMalla()
    {
        return $this->malla;
    }

    /**
     * Set almn
     *
     * @param \SSCM\CipeeBundle\Entity\Alumno $almn
     * @return EstadoAcademico
     */
    public function setAlmn(\SSCM\CipeeBundle\Entity\Alumno $almn = null)
    {
        $this->almn = $almn;

        return $this;
    }

    /**
     * Get almn
     *
     * @return \SSCM\CipeeBundle\Entity\Alumno
     */
    public function getAlmn()
    {
        return $this->almn;
    }

    /**
     * Set aldea
     *
     * @param \SSCM\CipeeBundle\Entity\Aldea $aldea
     * @return EstadoAcademico
     */
    public function setAldea(\SSCM\CipeeBundle\Entity\Aldea $aldea = null)
    {
        $this->aldea = $aldea;

        return $this;
    }

    /**
     * Get aldea
     *
     * @return \SSCM\CipeeBundle\Entity\Aldea
     */
    public function getAldea()
    {
        return $this->aldea;
    }
}
