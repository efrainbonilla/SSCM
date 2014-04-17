<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEstado
 *
 * @ORM\Table(name="_list_estado", indexes={@ORM\Index(name="codi_pais", columns={"codi_pais"})})
 * @ORM\Entity
 */
class ListEstado
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_edo", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiEdo;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_edo", type="string", length=200, nullable=true)
     */
    private $nombEdo;

    /**
     * @var \ListPais
     *
     * @ORM\ManyToOne(targetEntity="ListPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_pais", referencedColumnName="codi_pais")
     * })
     */
    private $codiPais;



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
     * @return ListEstado
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

    /**
     * Set codiPais
     *
     * @param \SSCM\SadminBundle\Entity\ListPais $codiPais
     * @return ListEstado
     */
    public function setCodiPais(\SSCM\SadminBundle\Entity\ListPais $codiPais = null)
    {
        $this->codiPais = $codiPais;

        return $this;
    }

    /**
     * Get codiPais
     *
     * @return \SSCM\SadminBundle\Entity\ListPais 
     */
    public function getCodiPais()
    {
        return $this->codiPais;
    }
}
