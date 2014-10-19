<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Aldea
 *
 * @ORM\Table(name="aldea", indexes={@ORM\Index(name="codi_parroq", columns={"codi_parroq"})})
 * @ORM\Entity(repositoryClass="SSCM\CipeeBundle\Entity\AldeaRepository")
 * @ExclusionPolicy("all")
 */
class Aldea
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_aldea", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Expose
     */
    private $codiAldea;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_aldea", type="string", length=100, nullable=true)
     * @Expose
     */
    private $nombAldea;

    /**
     * @var \Parroquia
     *
     * @ORM\ManyToOne(targetEntity="Parroquia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_parroq", referencedColumnName="codi_parroq")
     * })
     * @Expose
     * @SerializedName("parroquia")
     */
    private $codiParroq;

    /**
     * Set codiAldea
     *
     * @param  string $codiAldea
     * @return Aldea
     */
    public function setCodiAldea($codiAldea)
    {
        $this->codiAldea = $codiAldea;

        return $this;
    }

    /**
     * Get codiAldea
     *
     * @return string
     */
    public function getCodiAldea()
    {
        return $this->codiAldea;
    }

    /**
     * Set nombAldea
     *
     * @param  string $nombAldea
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
     * @param  \SSCM\CipeeBundle\Entity\Parroquia $codiParroq
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

    public function __toString()
    {
        return $this->getCodiAldea()?: '-';
    }
}
