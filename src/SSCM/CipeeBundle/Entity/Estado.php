<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Estado
 *
 * @ORM\Table(name="estado")
 * @ORM\Entity(repositoryClass="SSCM\CipeeBundle\Entity\EstadoRepository")
 * @ExclusionPolicy("all")
 */
class Estado
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_edo", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Expose
     */
    private $codiEdo;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_edo", type="string", length=100, nullable=true)
     * @Expose
     */
    private $nombEdo;

    /**
     * Set codiEdo
     *
     * @param  string $codiEdo
     * @return Estado
     */
    public function setCodiEdo($codiEdo)
    {
        $this->codiEdo = $codiEdo;

        return $this;
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
     * @param  string $nombEdo
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

    public function __toString()
    {
        return $this->getNombEdo()?: '-';
    }
}
