<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Malla
 *
 * @ORM\Table(name="malla", indexes={@ORM\Index(name="codi_pfg", columns={"codi_pfg"})})
 * @ORM\Entity(repositoryClass="SSCM\CipeeBundle\Entity\MallaRepository")
 * @ExclusionPolicy("all")
 */
class Malla
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_malla", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Expose
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 10,
     *     minMessage = "Código MALLA debe tener al menos {{ limit }} caracteres.",
     *     maxMessage = "Código MALLA no puede tener mas de {{ limit }} caracteres."
     * )
     */
    private $codiMalla;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_malla", type="string", length=100, nullable=true)
     * @Expose
     * @Assert\NotBlank()
     */
    private $nombMalla;

    /**
     * @var \Pfg
     *
     * @ORM\ManyToOne(targetEntity="Pfg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codi_pfg", referencedColumnName="codi_pfg")
     * })
     * @Assert\NotBlank()
     * @SerializedName("pfg")
     */
    private $codiPfg;

    public function __toString()
    {
        return $this->getNombMalla()?: '-';
    }

    /**
     * Set codiMalla
     *
     * @param string $codiMalla
     *
     * @return Malla
     */
    public function setCodiMalla($codiMalla)
    {
        $this->codiMalla = $codiMalla;

        return $this;
    }

    /**
     * Get codiMalla
     *
     * @return string
     */
    public function getCodiMalla()
    {
        return $this->codiMalla;
    }

    /**
     * Set nombMalla
     *
     * @param string $nombMalla
     *
     * @return Malla
     */
    public function setNombMalla($nombMalla)
    {
        $this->nombMalla = $nombMalla;

        return $this;
    }

    /**
     * Get nombMalla
     *
     * @return string
     */
    public function getNombMalla()
    {
        return $this->nombMalla;
    }

    /**
     * Set codiPfg
     *
     * @param \SSCM\CipeeBundle\Entity\Pfg $codiPfg
     *
     * @return Malla
     */
    public function setCodiPfg(\SSCM\CipeeBundle\Entity\Pfg $codiPfg = null)
    {
        $this->codiPfg = $codiPfg;

        return $this;
    }

    /**
     * Get codiPfg
     *
     * @return \SSCM\CipeeBundle\Entity\Pfg
     */
    public function getCodiPfg()
    {
        return $this->codiPfg;
    }
}
