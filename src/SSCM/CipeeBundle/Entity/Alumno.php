<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity(repositoryClass="SSCM\CipeeBundle\Entity\AlumnoRepository"))
 * @ExclusionPolicy("all")
 */
class Alumno
{
    /**
     * @var string
     *
     * @ORM\Column(name="cedu_almn", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Expose
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 6,
     *     max = 9,
     *     minMessage = "N° de Cédula debe tener al menos {{ limit }} caracteres.",
     *     maxMessage = "N° de Cédula no puede tener mas de {{ limit }} caracteres."
     *  )
     */
    private $ceduAlmn;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_almn", type="string", length=100, nullable=true)
     * @Expose
     * @Assert\NotBlank()
     */
    private $nombAlmn;

    /**
     * @var string
     *
     * @ORM\Column(name="apell_almn", type="string", length=100, nullable=true)
     * @Expose
     * @Assert\NotBlank()
     */
    private $apellAlmn;

    /**
     * @var string
     *
     * @ORM\Column(name="telf_almn", type="string", length=50, nullable=true)
     * @Expose
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 11,
     *     max = 23,
     *     minMessage = "N° de Teléfono debe tener al menos {{ limit }} caracteres.",
     *     maxMessage = "N° de Teléfono no puede tener mas de {{ limit }} caracteres."
     *  )
     */
    private $telfAlmn;

    /**
     * @var Array
     *
     * @ORM\OneToMany(targetEntity="EstadoAcademico", mappedBy="ceduAlmn")
     * @Expose
     */
    protected $estadoAcademico;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->mallas = new ArrayCollection();
    }

    /**
     * Set ceduAlmn
     *
     * @param  string $ceduAlmn
     * @return Alumno
     */
    public function setCeduAlmn($ceduAlmn)
    {
        $this->ceduAlmn = $ceduAlmn;

        return $this;
    }

    /**
     * Get ceduAlmn
     *
     * @return string
     */
    public function getCeduAlmn()
    {
        return $this->ceduAlmn;
    }

    /**
     * Set nombAlmn
     *
     * @param  string $nombAlmn
     * @return Alumno
     */
    public function setNombAlmn($nombAlmn)
    {
        $this->nombAlmn = $nombAlmn;

        return $this;
    }

    /**
     * Get nombAlmn
     *
     * @return string
     */
    public function getNombAlmn()
    {
        return $this->nombAlmn;
    }

    /**
     * Set apellAlmn
     *
     * @param  string $apellAlmn
     * @return Alumno
     */
    public function setApellAlmn($apellAlmn)
    {
        $this->apellAlmn = $apellAlmn;

        return $this;
    }

    /**
     * Get apellAlmn
     *
     * @return string
     */
    public function getApellAlmn()
    {
        return $this->apellAlmn;
    }

    /**
     * Set telfAlmn
     *
     * @param  string $telfAlmn
     * @return Alumno
     */
    public function setTelfAlmn($telfAlmn)
    {
        $this->telfAlmn = $telfAlmn;

        return $this;
    }

    /**
     * Get telfAlmn
     *
     * @return string
     */
    public function getTelfAlmn()
    {
        return $this->telfAlmn;
    }

    /**
     * Add estadoAcademico
     *
     * @param  \SSCM\CipeeBundle\Entity\EstadoAcademico $estadoAcademico
     * @return Alumno
     */
    public function addEstadoAcademico(\SSCM\CipeeBundle\Entity\EstadoAcademico $estadoAcademico)
    {
        $this->estadoAcademico[] = $estadoAcademico;

        return $this;
    }

    /**
     * Remove estadoAcademico
     *
     * @param \SSCM\CipeeBundle\Entity\EstadoAcademico $estadoAcademico
     */
    public function removeEstadoAcademico(\SSCM\CipeeBundle\Entity\EstadoAcademico $estadoAcademico)
    {
        $this->estadoAcademico->removeElement($estadoAcademico);
    }

    /**
     * Get estadoAcademico
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstadoAcademico()
    {
        return $this->estadoAcademico;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getCeduAlmn()?: '-';
    }
}
