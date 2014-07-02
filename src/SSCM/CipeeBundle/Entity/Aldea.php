<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aldea
 *
 * @ORM\Table(name="aldea", indexes={@ORM\Index(name="codi_parroq", columns={"codi_parroq"})})
 * @ORM\Entity
 */
class Aldea
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_aldea", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_aldea", type="string", length=100, nullable=true)
     */
    private $nombAldea;

    /**
     * @var \Parroquia
     *
     * @ORM\ManyToOne(targetEntity="Parroquia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_parroq", referencedColumnName="codi_parroq")
     * })
     */
    private $codiParroq;



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
     * Set nombAldea
     *
     * @param string $nombAldea
     * @return Aldea
     */
    public function setNombAldea($nombAldea)
    {
        $this->nombAldea = $nombAldea;

        return $this;
    }

    /**
     * Get nombAldea
     *
     * @return string 
     */
    public function getNombAldea()
    {
        return $this->nombAldea;
    }

    /**
     * Set codiParroq
     *
     * @param \SSCM\CipeeBundle\Entity\Parroquia $codiParroq
     * @return Aldea
     */
    public function setCodiParroq(\SSCM\CipeeBundle\Entity\Parroquia $codiParroq = null)
    {
        $this->codiParroq = $codiParroq;

        return $this;
    }

    /**
     * Get codiParroq
     *
     * @return \SSCM\CipeeBundle\Entity\Parroquia 
     */
    public function getCodiParroq()
    {
        return $this->codiParroq;
    }
}
