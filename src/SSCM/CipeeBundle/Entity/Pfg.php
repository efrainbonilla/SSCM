<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pfg
 *
 * @ORM\Table(name="pfg")
 * @ORM\Entity
 */
class Pfg
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_pfg", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 5,
     *     minMessage = "Código PFG debe tener al menos {{ limit }} caracteres.",
     *     maxMessage = "Código PFG no puede tener mas de {{ limit }} caracteres."
     * )
     */
    private $codiPfg = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_pfg", type="string", length=100, nullable=true)
     * @Assert\NotBlank()
     */
    private $nombPfg;

    public function __toString()
    {
        return $this->getNombPfg()?: '-';
    }

    /**
     * Get codiPfg
     *
     * @return string 
     */
    public function getCodiPfg()
    {
        return $this->codiPfg;
    }

    /**
     * Set codiPfg
     *
     * @return string 
     */
    public function setCodiPfg($codiPfg)
    {
        $this->codiPfg = mb_strtoupper($codiPfg);

        return $this;
    }

    /**
     * Set nombPfg
     *
     * @param string $nombPfg
     * @return Pfg
     */
    public function setNombPfg($nombPfg)
    {
        $this->nombPfg = mb_strtoupper($nombPfg);

        return $this;
    }

    /**
     * Get nombPfg
     *
     * @return string 
     */
    public function getNombPfg()
    {
        return $this->nombPfg;
    }
}
