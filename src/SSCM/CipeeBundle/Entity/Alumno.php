<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity
 */
class Alumno
{
    /**
     * @var string
     *
     * @ORM\Column(name="cedu_alumno", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ceduAlumno = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_alumno", type="string", length=100, nullable=true)
     */
    private $nombAlumno;

    /**
     * @var string
     *
     * @ORM\Column(name="apell_alumno", type="string", length=100, nullable=true)
     */
    private $apellAlumno;

    /**
     * @var string
     *
     * @ORM\Column(name="telf_alumno", type="string", length=50, nullable=true)
     */
    private $telfAlumno;


    public function __toString()
    {
        return $this->getCeduAlumno()?: '-';
    }

    /**
     * Get ceduAlumno
     *
     * @return string 
     */
    public function getCeduAlumno()
    {
        return $this->ceduAlumno;
    }

    /**
     * Set nombAlumno
     *
     * @param string $nombAlumno
     * @return Alumno
     */
    public function setNombAlumno($nombAlumno)
    {
        $this->nombAlumno = $nombAlumno;

        return $this;
    }

    /**
     * Get nombAlumno
     *
     * @return string 
     */
    public function getNombAlumno()
    {
        return $this->nombAlumno;
    }

    /**
     * Set apellAlumno
     *
     * @param string $apellAlumno
     * @return Alumno
     */
    public function setApellAlumno($apellAlumno)
    {
        $this->apellAlumno = $apellAlumno;

        return $this;
    }

    /**
     * Get apellAlumno
     *
     * @return string 
     */
    public function getApellAlumno()
    {
        return $this->apellAlumno;
    }

    /**
     * Set telfAlumno
     *
     * @param string $telfAlumno
     * @return Alumno
     */
    public function setTelfAlumno($telfAlumno)
    {
        $this->telfAlumno = $telfAlumno;

        return $this;
    }

    /**
     * Get telfAlumno
     *
     * @return string 
     */
    public function getTelfAlumno()
    {
        return $this->telfAlumno;
    }
}
