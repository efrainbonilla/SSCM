<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="_list_estado", indexes={@ORM\Index(name="codi_pais", columns={"codi_pais"})})
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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_edo", type="string", length=200, nullable=true)
     */
    private $nombEdo;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_pais", referencedColumnName="codi_pais")
     * })
     */
    private $codiPais;



    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * Set codiPais
     *
     * @param \SSCM\SadminBundle\Entity\Pais $codiPais
     * @return Estado
     */
    public function setCodiPais(\SSCM\SadminBundle\Entity\Pais $codiPais = null)
    {
        $this->codiPais = $codiPais;

        return $this;
    }

    /**
     * Get codiPais
     *
     * @return \SSCM\SadminBundle\Entity\Pais 
     */
    public function getCodiPais()
    {
        return $this->codiPais;
    }
}
