<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListParroquia
 *
 * @ORM\Table(name="_list_parroquia", indexes={@ORM\Index(name="codi_muni", columns={"codi_muni"})})
 * @ORM\Entity
 */
class ListParroquia
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_parroq", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiParroq;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_parroq", type="string", length=200, nullable=true)
     */
    private $nombParroq;

    /**
     * @var \ListMunicipio
     *
     * @ORM\ManyToOne(targetEntity="ListMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_muni", referencedColumnName="codi_muni")
     * })
     */
    private $codiMuni;



    /**
     * Get codiParroq
     *
     * @return string 
     */
    public function getCodiParroq()
    {
        return $this->codiParroq;
    }

    /**
     * Set nombParroq
     *
     * @param string $nombParroq
     * @return ListParroquia
     */
    public function setNombParroq($nombParroq)
    {
        $this->nombParroq = $nombParroq;

        return $this;
    }

    /**
     * Get nombParroq
     *
     * @return string 
     */
    public function getNombParroq()
    {
        return $this->nombParroq;
    }

    /**
     * Set codiMuni
     *
     * @param \SSCM\SadminBundle\Entity\Municipio $codiMuni
     * @return ListParroquia
     */
    public function setCodiMuni(\SSCM\SadminBundle\Entity\Municipio $codiMuni = null)
    {
        $this->codiMuni = $codiMuni;

        return $this;
    }

    /**
     * Get codiMuni
     *
     * @return \SSCM\SadminBundle\Entity\Municipio 
     */
    public function getCodiMuni()
    {
        return $this->codiMuni;
    }
}
