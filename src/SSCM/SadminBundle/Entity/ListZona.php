<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListZona
 *
 * @ORM\Table(name="_list_zona", indexes={@ORM\Index(name="codi_parroq", columns={"codi_parroq"})})
 * @ORM\Entity
 */
class ListZona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codi_zona", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiZona;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_zona", type="string", length=200, nullable=true)
     */
    private $nombZona;

    /**
     * @var string
     *
     * @ORM\Column(name="codi_postal", type="string", length=10, nullable=true)
     */
    private $codiPostal;

    /**
     * @var \ListParroquia
     *
     * @ORM\ManyToOne(targetEntity="ListParroquia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_parroq", referencedColumnName="codi_parroq")
     * })
     */
    private $codiParroq;



    /**
     * Get codiZona
     *
     * @return integer 
     */
    public function getCodiZona()
    {
        return $this->codiZona;
    }

    /**
     * Set nombZona
     *
     * @param string $nombZona
     * @return ListZona
     */
    public function setNombZona($nombZona)
    {
        $this->nombZona = $nombZona;

        return $this;
    }

    /**
     * Get nombZona
     *
     * @return string 
     */
    public function getNombZona()
    {
        return $this->nombZona;
    }

    /**
     * Set codiPostal
     *
     * @param string $codiPostal
     * @return ListZona
     */
    public function setCodiPostal($codiPostal)
    {
        $this->codiPostal = $codiPostal;

        return $this;
    }

    /**
     * Get codiPostal
     *
     * @return string 
     */
    public function getCodiPostal()
    {
        return $this->codiPostal;
    }

    /**
     * Set codiParroq
     *
     * @param \SSCM\SadminBundle\Entity\ListParroquia $codiParroq
     * @return ListZona
     */
    public function setCodiParroq(\SSCM\SadminBundle\Entity\ListParroquia $codiParroq = null)
    {
        $this->codiParroq = $codiParroq;

        return $this;
    }

    /**
     * Get codiParroq
     *
     * @return \SSCM\SadminBundle\Entity\ListParroquia 
     */
    public function getCodiParroq()
    {
        return $this->codiParroq;
    }
}
