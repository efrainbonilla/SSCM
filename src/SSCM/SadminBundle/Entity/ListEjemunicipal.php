<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEjemunicipal
 *
 * @ORM\Table(name="_list_ejemunicipal", indexes={@ORM\Index(name="codi_ejeregi", columns={"codi_ejeregi"})})
 * @ORM\Entity
 */
class ListEjemunicipal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codi_ejemuni", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiEjemuni;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_ejemuni", type="string", length=100, nullable=false)
     */
    private $nombEjemuni;

    /**
     * @var string
     *
     * @ORM\Column(name="dire_ejemuni", type="string", length=100, nullable=false)
     */
    private $direEjemuni;

    /**
     * @var float
     *
     * @ORM\Column(name="lat_ejemuni", type="float", precision=10, scale=0, nullable=false)
     */
    private $latEjemuni;

    /**
     * @var float
     *
     * @ORM\Column(name="lng_ejemuni", type="float", precision=10, scale=0, nullable=false)
     */
    private $lngEjemuni;

    /**
     * @var \ListEjeregional
     *
     * @ORM\ManyToOne(targetEntity="ListEjeregional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_ejeregi", referencedColumnName="codi_ejeregi")
     * })
     */
    private $codiEjeregi;



    /**
     * Get codiEjemuni
     *
     * @return integer 
     */
    public function getCodiEjemuni()
    {
        return $this->codiEjemuni;
    }

    /**
     * Set nombEjemuni
     *
     * @param string $nombEjemuni
     * @return ListEjemunicipal
     */
    public function setNombEjemuni($nombEjemuni)
    {
        $this->nombEjemuni = $nombEjemuni;

        return $this;
    }

    /**
     * Get nombEjemuni
     *
     * @return string 
     */
    public function getNombEjemuni()
    {
        return $this->nombEjemuni;
    }

    /**
     * Set direEjemuni
     *
     * @param string $direEjemuni
     * @return ListEjemunicipal
     */
    public function setDireEjemuni($direEjemuni)
    {
        $this->direEjemuni = $direEjemuni;

        return $this;
    }

    /**
     * Get direEjemuni
     *
     * @return string 
     */
    public function getDireEjemuni()
    {
        return $this->direEjemuni;
    }

    /**
     * Set latEjemuni
     *
     * @param float $latEjemuni
     * @return ListEjemunicipal
     */
    public function setLatEjemuni($latEjemuni)
    {
        $this->latEjemuni = $latEjemuni;

        return $this;
    }

    /**
     * Get latEjemuni
     *
     * @return float 
     */
    public function getLatEjemuni()
    {
        return $this->latEjemuni;
    }

    /**
     * Set lngEjemuni
     *
     * @param float $lngEjemuni
     * @return ListEjemunicipal
     */
    public function setLngEjemuni($lngEjemuni)
    {
        $this->lngEjemuni = $lngEjemuni;

        return $this;
    }

    /**
     * Get lngEjemuni
     *
     * @return float 
     */
    public function getLngEjemuni()
    {
        return $this->lngEjemuni;
    }

    /**
     * Set codiEjeregi
     *
     * @param \SSCM\SadminBundle\Entity\ListEjeregional $codiEjeregi
     * @return ListEjemunicipal
     */
    public function setCodiEjeregi(\SSCM\SadminBundle\Entity\ListEjeregional $codiEjeregi = null)
    {
        $this->codiEjeregi = $codiEjeregi;

        return $this;
    }

    /**
     * Get codiEjeregi
     *
     * @return \SSCM\SadminBundle\Entity\ListEjeregional 
     */
    public function getCodiEjeregi()
    {
        return $this->codiEjeregi;
    }
}
