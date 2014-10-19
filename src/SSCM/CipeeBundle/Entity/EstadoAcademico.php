<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EstadoAcademico
 *
 * @ORM\Table(name="estado_academico", indexes={@ORM\Index(name="codi_malla", columns={"codi_malla", "codi_aldea"}), @ORM\Index(name="cedu_almn", columns={"cedu_almn"}), @ORM\Index(name="codi_aldea", columns={"codi_aldea"}), @ORM\Index(name="IDX_DFDE279BBDDFE09E", columns={"codi_malla"})})
 * @ORM\Entity
 * @ExclusionPolicy("all")
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
     * @Expose
     * @Assert\NotBlank()
     */
    private $ceduAlmn;

    /**
     * @var \Malla
     *
     * @ORM\ManyToOne(targetEntity="Malla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_malla", referencedColumnName="codi_malla")
     * })
     * @Expose
     * @SerializedName("malla")
     * @Assert\NotBlank()
     */
    private $codiMalla;

    /**
     * @var \Aldea
     *
     * @ORM\ManyToOne(targetEntity="Aldea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_aldea", referencedColumnName="codi_aldea")
     * })
     * @Expose
     * @SerializedName("aldea")
     * @Assert\NotBlank()
     */
    private $codiAldea;

    /**
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer", nullable=true)
     * @Expose
     * @Assert\NotBlank()
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
     * @param  integer         $estatus
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
     * @param  \SSCM\CipeeBundle\Entity\Malla $codiMalla
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
     * Set ceduAlmn
     *
     * @param  \SSCM\CipeeBundle\Entity\Alumno $ceduAlmn
     * @return EstadoAcademico
     */
    public function setCeduAlmn(\SSCM\CipeeBundle\Entity\Alumno $ceduAlmn = null)
    {
        $this->ceduAlmn = $ceduAlmn;

        return $this;
    }

    /**
     * Get ceduAlmn
     *
     * @return \SSCM\CipeeBundle\Entity\Alumno
     */
    public function getCeduAlmn()
    {
        return $this->ceduAlmn;
    }

    /**
     * Set codiAldea
     *
     * @param  \SSCM\CipeeBundle\Entity\Aldea $codiAldea
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
