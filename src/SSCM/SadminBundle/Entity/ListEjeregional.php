<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEjeregional
 *
 * @ORM\Table(name="_list_ejeregional")
 * @ORM\Entity
 */
class ListEjeregional
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codi_ejeregi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiEjeregi;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_ejeregi", type="string", length=100, nullable=false)
     */
    private $nombEjeregi;

    /**
     * @var string
     *
     * @ORM\Column(name="dire_ejeregi", type="string", length=100, nullable=false)
     */
    private $direEjeregi;

    /**
     * @var float
     *
     * @ORM\Column(name="lat_ejeregi", type="float", precision=10, scale=0, nullable=false)
     */
    private $latEjeregi;

    /**
     * @var float
     *
     * @ORM\Column(name="lng_ejeregi", type="float", precision=10, scale=0, nullable=false)
     */
    private $lngEjeregi;

    /**
     * @var integer
     *
     * @ORM\Column(name="codi_pais", type="integer", nullable=false)
     */
    private $codiPais;



    /**
     * Get codiEjeregi
     *
     * @return integer 
     */
    public function getCodiEjeregi()
    {
        return $this->codiEjeregi;
    }

    /**
     * Set nombEjeregi
     *
     * @param string $nombEjeregi
     * @return ListEjeregional
     */
    public function setNombEjeregi($nombEjeregi)
    {
        $this->nombEjeregi = $nombEjeregi;

        return $this;
    }

    /**
     * Get nombEjeregi
     *
     * @return string 
     */
    public function getNombEjeregi()
    {
        return $this->nombEjeregi;
    }

    /**
     * Set direEjeregi
     *
     * @param string $direEjeregi
     * @return ListEjeregional
     */
    public function setDireEjeregi($direEjeregi)
    {
        $this->direEjeregi = $direEjeregi;

        return $this;
    }

    /**
     * Get direEjeregi
     *
     * @return string 
     */
    public function getDireEjeregi()
    {
        return $this->direEjeregi;
    }

    /**
     * Set latEjeregi
     *
     * @param float $latEjeregi
     * @return ListEjeregional
     */
    public function setLatEjeregi($latEjeregi)
    {
        $this->latEjeregi = $latEjeregi;

        return $this;
    }

    /**
     * Get latEjeregi
     *
     * @return float 
     */
    public function getLatEjeregi()
    {
        return $this->latEjeregi;
    }

    /**
     * Set lngEjeregi
     *
     * @param float $lngEjeregi
     * @return ListEjeregional
     */
    public function setLngEjeregi($lngEjeregi)
    {
        $this->lngEjeregi = $lngEjeregi;

        return $this;
    }

    /**
     * Get lngEjeregi
     *
     * @return float 
     */
    public function getLngEjeregi()
    {
        return $this->lngEjeregi;
    }

    /**
     * Set codiPais
     *
     * @param integer $codiPais
     * @return ListEjeregional
     */
    public function setCodiPais($codiPais)
    {
        $this->codiPais = $codiPais;

        return $this;
    }

    /**
     * Get codiPais
     *
     * @return integer 
     */
    public function getCodiPais()
    {
        return $this->codiPais;
    }
}
