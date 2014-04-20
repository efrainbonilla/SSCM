<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListCvoto
 *
 * @ORM\Table(name="_list_cvoto", indexes={@ORM\Index(name="codi_parroq", columns={"codi_parroq"})})
 * @ORM\Entity
 */
class ListCvoto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cvoto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_cvoto", type="text", nullable=false)
     */
    private $nombCvoto;

    /**
     * @var string
     *
     * @ORM\Column(name="codi_cvoto", type="string", length=20, nullable=false)
     */
    private $codiCvoto;

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
     * Get idCvoto
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->idCvoto;
    }

    /**
     * Set nombCvoto
     *
     * @param string $nombCvoto
     * @return ListCvoto
     */
    public function setNombCvoto($nombCvoto)
    {
        $this->nombCvoto = $nombCvoto;

        return $this;
    }

    /**
     * Get nombCvoto
     *
     * @return string 
     */
    public function getNombCvoto()
    {
        return $this->nombCvoto;
    }

    /**
     * Set codiCvoto
     *
     * @param string $codiCvoto
     * @return ListCvoto
     */
    public function setCodiCvoto($codiCvoto)
    {
        $this->codiCvoto = $codiCvoto;

        return $this;
    }

    /**
     * Get codiCvoto
     *
     * @return string 
     */
    public function getCodiCvoto()
    {
        return $this->codiCvoto;
    }

    /**
     * Set codiParroq
     *
     * @param \SSCM\SadminBundle\Entity\ListParroquia $codiParroq
     * @return ListCvoto
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
