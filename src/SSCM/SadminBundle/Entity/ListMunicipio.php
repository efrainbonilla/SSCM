<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListMunicipio
 *
 * @ORM\Table(name="_list_municipio", indexes={@ORM\Index(name="codi_entidad", columns={"codi_edo"})})
 * @ORM\Entity
 */
class ListMunicipio
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_muni", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiMuni;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_muni", type="string", length=200, nullable=true)
     */
    private $nombMuni;

    /**
     * @var string
     *
     * @ORM\Column(name="codi_eje", type="string", length=10, nullable=false)
     */
    private $codiEje;

    /**
     * @var \ListEstado
     *
     * @ORM\ManyToOne(targetEntity="ListEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_edo", referencedColumnName="codi_edo")
     * })
     */
    private $codiEdo;



    /**
     * Get codiMuni
     *
     * @return string 
     */
    public function getCodiMuni()
    {
        return $this->codiMuni;
    }

    /**
     * Set nombMuni
     *
     * @param string $nombMuni
     * @return ListMunicipio
     */
    public function setNombMuni($nombMuni)
    {
        $this->nombMuni = $nombMuni;

        return $this;
    }

    /**
     * Get nombMuni
     *
     * @return string 
     */
    public function getNombMuni()
    {
        return $this->nombMuni;
    }

    /**
     * Set codiEje
     *
     * @param string $codiEje
     * @return ListMunicipio
     */
    public function setCodiEje($codiEje)
    {
        $this->codiEje = $codiEje;

        return $this;
    }

    /**
     * Get codiEje
     *
     * @return string 
     */
    public function getCodiEje()
    {
        return $this->codiEje;
    }

    /**
     * Set codiEdo
     *
     * @param \SSCM\SadminBundle\Entity\ListEstado $codiEdo
     * @return ListMunicipio
     */
    public function setCodiEdo(\SSCM\SadminBundle\Entity\ListEstado $codiEdo = null)
    {
        $this->codiEdo = $codiEdo;

        return $this;
    }

    /**
     * Get codiEdo
     *
     * @return \SSCM\SadminBundle\Entity\ListEstado 
     */
    public function getCodiEdo()
    {
        return $this->codiEdo;
    }
}
