<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="estado")
 * @ORM\Entity
 */
class Estado
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_edo", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiEdo = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_edo", type="string", length=100, nullable=true)
     */
    private $nombEdo;

    public function __toString()
    {
        return $this->getNombEdo()?: '-';
    }

    /**
     * Get codiEdo
     *
     * @return string 
     */
    public function getCodiEdo()
    {
        return $this->codiEdo;
    }

    /**
     * Set nombEdo
     *
     * @param string $nombEdo
     * @return Estado
     */
    public function setNombEdo($nombEdo)
    {
        $this->nombEdo = $nombEdo;

        return $this;
    }

    /**
     * Get nombEdo
     *
     * @return string 
     */
    public function getNombEdo()
    {
        return $this->nombEdo;
    }
}
