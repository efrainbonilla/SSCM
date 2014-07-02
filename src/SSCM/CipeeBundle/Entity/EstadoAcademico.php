<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoAcademico
 *
 * @ORM\Table(name="estado_academico", indexes={@ORM\Index(name="codi_malla", columns={"codi_malla", "codi_aldea"}), @ORM\Index(name="cedu_alumno", columns={"cedu_alumno"}), @ORM\Index(name="codi_aldea", columns={"codi_aldea"}), @ORM\Index(name="IDX_DFDE279BBDDFE09E", columns={"codi_malla"})})
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
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer", nullable=true)
     */
    private $estatus;

    /**
     * @var \Malla
     *
     * @ORM\ManyToOne(targetEntity="Malla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_malla", referencedColumnName="codi_malla")
     * })
     */
    private $codiMalla;

    /**
     * @var \Alumno
     *
     * @ORM\ManyToOne(targetEntity="Alumno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cedu_alumno", referencedColumnName="cedu_alumno")
     * })
     */
    private $ceduAlumno;

    /**
     * @var \Aldea
     *
     * @ORM\ManyToOne(targetEntity="Aldea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_aldea", referencedColumnName="codi_aldea")
     * })
     */
    private $codiAldea;



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
     * Set codiMalla
     *
     * @param \SSCM\CipeeBundle\Entity\Malla $codiMalla
     * @return EstadoAcademico
     */
    public function setCodiMalla(\SSCM\CipeeBundle\Entity\Malla $codiMalla = null)
    {
        $this->codiMalla = $codiMalla;

        return $this;
    }

    /**
     * Get codiMalla
     *
     * @return \SSCM\CipeeBundle\Entity\Malla 
     */
    public function getCodiMalla()
    {
        return $this->codiMalla;
    }

    /**
     * Set ceduAlumno
     *
     * @param \SSCM\CipeeBundle\Entity\Alumno $ceduAlumno
     * @return EstadoAcademico
     */
    public function setCeduAlumno(\SSCM\CipeeBundle\Entity\Alumno $ceduAlumno = null)
    {
        $this->ceduAlumno = $ceduAlumno;

        return $this;
    }

    /**
     * Get ceduAlumno
     *
     * @return \SSCM\CipeeBundle\Entity\Alumno 
     */
    public function getCeduAlumno()
    {
        return $this->ceduAlumno;
    }

    /**
     * Set codiAldea
     *
     * @param \SSCM\CipeeBundle\Entity\Aldea $codiAldea
     * @return EstadoAcademico
     */
    public function setCodiAldea(\SSCM\CipeeBundle\Entity\Aldea $codiAldea = null)
    {
        $this->codiAldea = $codiAldea;

        return $this;
    }

    /**
     * Get codiAldea
     *
     * @return \SSCM\CipeeBundle\Entity\Aldea 
     */
    public function getCodiAldea()
    {
        return $this->codiAldea;
    }
}
