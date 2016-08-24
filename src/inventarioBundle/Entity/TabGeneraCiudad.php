<?php

namespace inventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TabGeneraCiudad
 *
 * @ORM\Table(name="tab_genera_ciudad", indexes={@ORM\Index(name="cod_ciudad", columns={"cod_ciudad"})})
 * @ORM\Entity
 */
class TabGeneraCiudad
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_ciudad", type="string", length=50, nullable=false)
     */
    private $nomCiudad = '';

    /**
     * @var string
     *
     * @ORM\Column(name="abr_ciudad", type="string", length=15, nullable=false)
     */
    private $abrCiudad = '';

    /**
     * @var float
     *
     * @ORM\Column(name="cod_latitu", type="float", precision=10, scale=0, nullable=true)
     */
    private $codLatitu;

    /**
     * @var float
     *
     * @ORM\Column(name="cod_longit", type="float", precision=10, scale=0, nullable=true)
     */
    private $codLongit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ubicax", type="string", length=255, nullable=true)
     */
    private $nomUbicax;

    /**
     * @var string
     *
     * @ORM\Column(name="ind_estado", type="string", length=1, nullable=false)
     */
    private $indEstado = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="ind_danexx", type="string", length=1, nullable=false)
     */
    private $indDanexx = '1';

    /**
     * @var float
     *
     * @ORM\Column(name="val_icaxxx", type="float", precision=10, scale=0, nullable=false)
     */
    private $valIcaxxx = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cod_people", type="string", length=5, nullable=true)
     */
    private $codPeople;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_creaci", type="string", length=15, nullable=false)
     */
    private $usrCreaci = 'Administrador';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_creaci", type="datetime", nullable=false)
     */
    private $fecCreaci;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_modifi", type="string", length=15, nullable=true)
     */
    private $usrModifi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_modifi", type="datetime", nullable=true)
     */
    private $fecModifi;

    /**
     * @var \inventarioBundle\Entity\TabGeneraPaises
     *
     * @ORM\ManyToOne(targetEntity="inventarioBundle\Entity\TabGeneraPaises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cod_paisxx", referencedColumnName="cod_paisxx")
     * })
     */
    private $codPaisxx;

   /**
    * @var \inventarioBundle\Entity\TabGeneraDepart
     *
     * @ORM\ManyToOne(targetEntity="inventarioBundle\Entity\TabGeneraDepart")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="cod_depart", referencedColumnName="cod_depart")
     * })
    */
     
    private $codDepart;

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="cod_ciudad", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codCiudad;



    /**
     * Set nomCiudad
     *
     * @param string $nomCiudad
     *
     * @return TabGeneraCiudad
     */
    public function setNomCiudad($nomCiudad)
    {
        $this->nomCiudad = $nomCiudad;

        return $this;
    }

    /**
     * Get nomCiudad
     *
     * @return string
     */
    public function getNomCiudad()
    {
        return $this->nomCiudad;
    }

    /**
     * Set abrCiudad
     *
     * @param string $abrCiudad
     *
     * @return TabGeneraCiudad
     */
    public function setAbrCiudad($abrCiudad)
    {
        $this->abrCiudad = $abrCiudad;

        return $this;
    }

    /**
     * Get abrCiudad
     *
     * @return string
     */
    public function getAbrCiudad()
    {
        return $this->abrCiudad;
    }

    /**
     * Set codLatitu
     *
     * @param float $codLatitu
     *
     * @return TabGeneraCiudad
     */
    public function setCodLatitu($codLatitu)
    {
        $this->codLatitu = $codLatitu;

        return $this;
    }

    /**
     * Get codLatitu
     *
     * @return float
     */
    public function getCodLatitu()
    {
        return $this->codLatitu;
    }

    /**
     * Set codLongit
     *
     * @param float $codLongit
     *
     * @return TabGeneraCiudad
     */
    public function setCodLongit($codLongit)
    {
        $this->codLongit = $codLongit;

        return $this;
    }

    /**
     * Get codLongit
     *
     * @return float
     */
    public function getCodLongit()
    {
        return $this->codLongit;
    }

    /**
     * Set nomUbicax
     *
     * @param string $nomUbicax
     *
     * @return TabGeneraCiudad
     */
    public function setNomUbicax($nomUbicax)
    {
        $this->nomUbicax = $nomUbicax;

        return $this;
    }

    /**
     * Get nomUbicax
     *
     * @return string
     */
    public function getNomUbicax()
    {
        return $this->nomUbicax;
    }

    /**
     * Set indEstado
     *
     * @param string $indEstado
     *
     * @return TabGeneraCiudad
     */
    public function setIndEstado($indEstado)
    {
        $this->indEstado = $indEstado;

        return $this;
    }

    /**
     * Get indEstado
     *
     * @return string
     */
    public function getIndEstado()
    {
        return $this->indEstado;
    }

    /**
     * Set indDanexx
     *
     * @param string $indDanexx
     *
     * @return TabGeneraCiudad
     */
    public function setIndDanexx($indDanexx)
    {
        $this->indDanexx = $indDanexx;

        return $this;
    }

    /**
     * Get indDanexx
     *
     * @return string
     */
    public function getIndDanexx()
    {
        return $this->indDanexx;
    }

    /**
     * Set valIcaxxx
     *
     * @param float $valIcaxxx
     *
     * @return TabGeneraCiudad
     */
    public function setValIcaxxx($valIcaxxx)
    {
        $this->valIcaxxx = $valIcaxxx;

        return $this;
    }

    /**
     * Get valIcaxxx
     *
     * @return float
     */
    public function getValIcaxxx()
    {
        return $this->valIcaxxx;
    }

    /**
     * Set codPeople
     *
     * @param string $codPeople
     *
     * @return TabGeneraCiudad
     */
    public function setCodPeople($codPeople)
    {
        $this->codPeople = $codPeople;

        return $this;
    }

    /**
     * Get codPeople
     *
     * @return string
     */
    public function getCodPeople()
    {
        return $this->codPeople;
    }

    /**
     * Set usrCreaci
     *
     * @param string $usrCreaci
     *
     * @return TabGeneraCiudad
     */
    public function setUsrCreaci($usrCreaci)
    {
        $this->usrCreaci = $usrCreaci;

        return $this;
    }

    /**
     * Get usrCreaci
     *
     * @return string
     */
    public function getUsrCreaci()
    {
        return $this->usrCreaci;
    }

    /**
     * Set fecCreaci
     *
     * @param \DateTime $fecCreaci
     *
     * @return TabGeneraCiudad
     */
    public function setFecCreaci($fecCreaci)
    {
        $this->fecCreaci = $fecCreaci;

        return $this;
    }

    /**
     * Get fecCreaci
     *
     * @return \DateTime
     */
    public function getFecCreaci()
    {
        return $this->fecCreaci;
    }

    /**
     * Set usrModifi
     *
     * @param string $usrModifi
     *
     * @return TabGeneraCiudad
     */
    public function setUsrModifi($usrModifi)
    {
        $this->usrModifi = $usrModifi;

        return $this;
    }

    /**
     * Get usrModifi
     *
     * @return string
     */
    public function getUsrModifi()
    {
        return $this->usrModifi;
    }

    /**
     * Set fecModifi
     *
     * @param \DateTime $fecModifi
     *
     * @return TabGeneraCiudad
     */
    public function setFecModifi($fecModifi)
    {
        $this->fecModifi = $fecModifi;

        return $this;
    }

    /**
     * Get fecModifi
     *
     * @return \DateTime
     */
    public function getFecModifi()
    {
        return $this->fecModifi;
    }

    /**
     * Set codPaisxx
     *
     * @param integer $codPaisxx
     *
     * @return TabGeneraCiudad
     */
    public function setCodPaisxx($codPaisxx)
    {
        $this->codPaisxx = $codPaisxx;

        return $this;
    }

    /**
     * Get codPaisxx
     *
     * @return integer
     */
    public function getCodPaisxx()
    {
        return $this->codPaisxx;
    }

    /**
     * Set codDepart
     *
     * @param integer $codDepart
     *
     * @return TabGeneraCiudad
     */
    public function setCodDepart($codDepart)
    {
        $this->codDepart = $codDepart;

        return $this;
    }

    /**
     * Get codDepart
     *
     * @return integer
     */
    public function getCodDepart()
    {
        return $this->codDepart;
    }

    /**
     * Set codCiudad
     *
     * @param integer $codCiudad
     *
     * @return TabGeneraCiudad
     */
    public function setCodCiudad($codCiudad)
    {
        $this->codCiudad = $codCiudad;

        return $this;
    }

    /**
     * Get codCiudad
     *
     * @return integer
     */
    public function getCodCiudad()
    {
        return $this->codCiudad;
    }
    public function __toString()
    {
      if(is_null($this->getNomCiudad())) {
              return 'NULL';
                  
      }
      return $this->getNomCiudad();
    }

}
