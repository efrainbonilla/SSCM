<?php

namespace SSCM\SadminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEspacio
 *
 * @ORM\Table(name="_list_espacio", indexes={@ORM\Index(name="codi_parroq", columns={"codi_parroq"}), @ORM\Index(name="codi_zona", columns={"codi_zona"})})
 * @ORM\Entity
 */
class ListEspacio
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi_espacio", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codiEspacio;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_espacio", type="string", length=100, nullable=false)
     */
    private $nombEspacio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_espacio", type="string", length=50, nullable=false)
     */
    private $tipoEspacio;

    /**
     * @var float
     *
     * @ORM\Column(name="lat_espacio", type="float", precision=10, scale=0, nullable=false)
     */
    private $latEspacio;

    /**
     * @var float
     *
     * @ORM\Column(name="lng_espacio", type="float", precision=10, scale=0, nullable=false)
     */
    private $lngEspacio;

    /**
     * @var string
     *
     * @ORM\Column(name="dire_av_calle", type="string", length=100, nullable=false)
     */
    private $direAvCalle;

    /**
     * @var string
     *
     * @ORM\Column(name="dire_punto_ref", type="string", length=100, nullable=false)
     */
    private $direPuntoRef;

    /**
     * @var integer
     *
     * @ORM\Column(name="codi_zona", type="integer", nullable=false)
     */
    private $codiZona;

    /**
     * @var string
     *
     * @ORM\Column(name="codi_parroq", type="string", length=11, nullable=false)
     */
    private $codiParroq;



    /**
     * Get codiEspacio
     *
     * @return string 
     */
    public function getCodiEspacio()
    {
        return $this->codiEspacio;
    }

    /**
     * Set nombEspacio
     *
     * @param string $nombEspacio
     * @return ListEspacio
     */
    public function setNombEspacio($nombEspacio)
    {
        $this->nombEspacio = $nombEspacio;

        return $this;
    }

    /**
     * Get nombEspacio
     *
     * @return string 
     */
    public function getNombEspacio()
    {
        return $this->nombEspacio;
    }

    /**
     * Set tipoEspacio
     *
     * @param string $tipoEspacio
     * @return ListEspacio
     */
    public function setTipoEspacio($tipoEspacio)
    {
        $this->tipoEspacio = $tipoEspacio;

        return $this;
    }

    /**
     * Get tipoEspacio
     *
     * @return string 
     */
    public function getTipoEspacio()
    {
        return $this->tipoEspacio;
    }

    /**
     * Set latEspacio
     *
     * @param float $latEspacio
     * @return ListEspacio
     */
    public function setLatEspacio($latEspacio)
    {
        $this->latEspacio = $latEspacio;

        return $this;
    }

    /**
     * Get latEspacio
     *
     * @return float 
     */
    public function getLatEspacio()
    {
        return $this->latEspacio;
    }

    /**
     * Set lngEspacio
     *
     * @param float $lngEspacio
     * @return ListEspacio
     */
    public function setLngEspacio($lngEspacio)
    {
        $this->lngEspacio = $lngEspacio;

        return $this;
    }

    /**
     * Get lngEspacio
     *
     * @return float 
     */
    public function getLngEspacio()
    {
        return $this->lngEspacio;
    }

    /**
     * Set direAvCalle
     *
     * @param string $direAvCalle
     * @return ListEspacio
     */
    public function setDireAvCalle($direAvCalle)
    {
        $this->direAvCalle = $direAvCalle;

        return $this;
    }

    /**
     * Get direAvCalle
     *
     * @return string 
     */
    public function getDireAvCalle()
    {
        return $this->direAvCalle;
    }

    /**
     * Set direPuntoRef
     *
     * @param string $direPuntoRef
     * @return ListEspacio
     */
    public function setDirePuntoRef($direPuntoRef)
    {
        $this->direPuntoRef = $direPuntoRef;

        return $this;
    }

    /**
     * Get direPuntoRef
     *
     * @return string 
     */
    public function getDirePuntoRef()
    {
        return $this->direPuntoRef;
    }

    /**
     * Set codiZona
     *
     * @param integer $codiZona
     * @return ListEspacio
     */
    public function setCodiZona($codiZona)
    {
        $this->codiZona = $codiZona;

        return $this;
    }

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
     * Set codiParroq
     *
     * @param string $codiParroq
     * @return ListEspacio
     */
    public function setCodiParroq($codiParroq)
    {
        $this->codiParroq = $codiParroq;

        return $this;
    }

    /**
     * Get codiParroq
     *
     * @return string 
     */
    public function getCodiParroq()
    {
        return $this->codiParroq;
    }
}
