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
     * @ORM\Column(name="cedu_almn", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\OneToMany(targetEntity="EstadoAcademico", mappedBy="almn")
     */
    private $ceduAlmn = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_almn", type="string", length=100, nullable=true)
     */
    private $nombAlmn;

    /**
     * @var string
     *
     * @ORM\Column(name="apell_almn", type="string", length=100, nullable=true)
     */
    private $apellAlmn;

    /**
     * @var string
     *
     * @ORM\Column(name="telf_almn", type="string", length=50, nullable=true)
     */
    private $telfAlmn;


    public function __toString()
    {
        return $this->getCeduAlmn()?: '-';
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
     * @param string $nombAlmn
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
     * @param string $apellAlmn
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
     * @param string $telfAlmn
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
}
