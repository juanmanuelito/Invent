<?php

namespace inventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TabGeneraPaises
 *
 * @ORM\Table(name="tab_genera_paises")
 * @ORM\Entity
 */
class TabGeneraPaises
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_paisxx", type="string", length=50, nullable=false)
     */
    private $nomPaisxx = '';

    /**
     * @var string
     *
     * @ORM\Column(name="abr_paisxx", type="string", length=15, nullable=false)
     */
    private $abrPaisxx = '';

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
    private $fecCreaci = '2003-10-29 00:00:00';

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
     * @var integer
     *
     * @ORM\Column(name="cod_paisxx", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codPaisxx;



    /**
     * Set nomPaisxx
     *
     * @param string $nomPaisxx
     *
     * @return TabGeneraPaises
     */
    public function setNomPaisxx($nomPaisxx)
    {
        $this->nomPaisxx = $nomPaisxx;

        return $this;
    }

    /**
     * Get nomPaisxx
     *
     * @return string
     */
    public function getNomPaisxx()
    {
        return $this->nomPaisxx;
    }

    /**
     * Set abrPaisxx
     *
     * @param string $abrPaisxx
     *
     * @return TabGeneraPaises
     */
    public function setAbrPaisxx($abrPaisxx)
    {
        $this->abrPaisxx = $abrPaisxx;

        return $this;
    }

    /**
     * Get abrPaisxx
     *
     * @return string
     */
    public function getAbrPaisxx()
    {
        return $this->abrPaisxx;
    }

    /**
     * Set usrCreaci
     *
     * @param string $usrCreaci
     *
     * @return TabGeneraPaises
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
     * @return TabGeneraPaises
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
     * @return TabGeneraPaises
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
     * @return TabGeneraPaises
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
     * Get codPaisxx
     *
     * @return integer
     */
    public function getCodPaisxx()
    {
        return $this->codPaisxx;
    }
    public function __toString()
    {
      if(is_null($this->getNomPaisxx())) {
              return 'NULL';
                  
      }
      return $this->getNomPaisxx();
    }


}
