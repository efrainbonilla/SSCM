<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEje
 *
 * @ORM\Table(name="_list_eje", indexes={@ORM\Index(name="codi_entidad", columns={"codi_edo"})})
 * @ORM\Entity
 */
class ListEje
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_eje", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEje;

    /**
     * @var string
     *
     * @ORM\Column(name="codi_eje", type="string", length=10, nullable=false)
     */
    private $codiEje;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_eje", type="string", length=100, nullable=false)
     */
    private $nombEje;

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
     * Get idEje
     *
     * @return integer 
     */
    public function getIdEje()
    {
        return $this->idEje;
    }

    /**
     * Set codiEje
     *
     * @param string $codiEje
     * @return ListEje
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
     * Set nombEje
     *
     * @param string $nombEje
     * @return ListEje
     */
    public function setNombEje($nombEje)
    {
        $this->nombEje = $nombEje;

        return $this;
    }

    /**
     * Get nombEje
     *
     * @return string 
     */
    public function getNombEje()
    {
        return $this->nombEje;
    }

    /**
     * Set codiEdo
     *
     * @param \SSCM\SadminBundle\Entity\ListEstado $codiEdo
     * @return ListEje
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
