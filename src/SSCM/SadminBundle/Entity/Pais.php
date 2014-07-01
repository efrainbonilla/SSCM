<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="_list_pais")
 * @ORM\Entity
 */
class Pais
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codi_pais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_pais", type="string", length=100, nullable=false)
     */
    private $nombPais;

    /**
     * @var float
     *
     * @ORM\Column(name="lat_pais", type="float", precision=10, scale=0, nullable=false)
     */
    private $latPais;

    /**
     * @var float
     *
     * @ORM\Column(name="lng_pais", type="float", precision=10, scale=0, nullable=false)
     */
    private $lngPais;



    /**
     * Get Id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombPais
     *
     * @param string $nombPais
     * @return Pais
     */
    public function setNombPais($nombPais)
    {
        $this->nombPais = $nombPais;

        return $this;
    }

    /**
     * Get nombPais
     *
     * @return string 
     */
    public function getNombPais()
    {
        return $this->nombPais;
    }

    /**
     * Set latPais
     *
     * @param float $latPais
     * @return Pais
     */
    public function setLatPais($latPais)
    {
        $this->latPais = $latPais;

        return $this;
    }

    /**
     * Get latPais
     *
     * @return float 
     */
    public function getLatPais()
    {
        return $this->latPais;
    }

    /**
     * Set lngPais
     *
     * @param float $lngPais
     * @return Pais
     */
    public function setLngPais($lngPais)
    {
        $this->lngPais = $lngPais;

        return $this;
    }

    /**
     * Get lngPais
     *
     * @return float 
     */
    public function getLngPais()
    {
        return $this->lngPais;
    }
}
