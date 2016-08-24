<?php

namespace inventarioBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * TabGeneraDepart
 *
 * @ORM\Table(name="tab_genera_depart")
 * @ORM\Entity
 */

class TabGeneraDepart {
	/**
	 * @var string
	 *
	 * @ORM\Column(name="nom_depart", type="string", length=50, nullable=false)
	 */
	private $nomDepart = '';

	/**
	 * @var string
	 *
	 * @ORM\Column(name="abr_depart", type="string", length=15, nullable=false)
	 */
	private $abrDepart = '';

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
	private $fecCreaci = '2003-10-17 00:00:00';

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
	 * @var integer
	 *
	 * @ORM\Column(name="cod_depart", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	private $codDepart;

	/**
	 * Set nomDepart
	 *
	 * @param string $nomDepart
	 *
	 * @return TabGeneraDepart
	 */
	public function setNomDepart($nomDepart) {
		$this->nomDepart = $nomDepart;

		return $this;
	}

	/**
	 * Get nomDepart
	 *
	 * @return string
	 */
	public function getNomDepart() {
		return $this->nomDepart;
	}

	/**
	 * Set abrDepart
	 *
	 * @param string $abrDepart
	 *
	 * @return TabGeneraDepart
	 */
	public function setAbrDepart($abrDepart) {
		$this->abrDepart = $abrDepart;

		return $this;
	}

	/**
	 * Get abrDepart
	 *
	 * @return string
	 */
	public function getAbrDepart() {
		return $this->abrDepart;
	}

	/**
	 * Set usrCreaci
	 *
	 * @param string $usrCreaci
	 *
	 * @return TabGeneraDepart
	 */
	public function setUsrCreaci($usrCreaci) {
		$this->usrCreaci = $usrCreaci;

		return $this;
	}

	/**
	 * Get usrCreaci
	 *
	 * @return string
	 */
	public function getUsrCreaci() {
		return $this->usrCreaci;
	}

	/**
	 * Set fecCreaci
	 *
	 * @param \DateTime $fecCreaci
	 *
	 * @return TabGeneraDepart
	 */
	public function setFecCreaci($fecCreaci) {
		$this->fecCreaci = $fecCreaci;

		return $this;
	}

	/**
	 * Get fecCreaci
	 *
	 * @return \DateTime
	 */
	public function getFecCreaci() {
		return $this->fecCreaci;
	}

	/**
	 * Set usrModifi
	 *
	 * @param string $usrModifi
	 *
	 * @return TabGeneraDepart
	 */
	public function setUsrModifi($usrModifi) {
		$this->usrModifi = $usrModifi;

		return $this;
	}

	/**
	 * Get usrModifi
	 *
	 * @return string
	 */
	public function getUsrModifi() {
		return $this->usrModifi;
	}

	/**
	 * Set fecModifi
	 *
	 * @param \DateTime $fecModifi
	 *
	 * @return TabGeneraDepart
	 */
	public function setFecModifi($fecModifi) {
		$this->fecModifi = $fecModifi;

		return $this;
	}

	/**
	 * Get fecModifi
	 *
	 * @return \DateTime
	 */
	public function getFecModifi() {
		return $this->fecModifi;
	}

	/**
	 * Set codPaisxx
	 *
	 * @param integer $codPaisxx
	 *
	 * @return TabGeneraDepart
	 */
	public function setCodPaisxx($codPaisxx) {
		$this->codPaisxx = $codPaisxx;

		return $this;
	}

	/**
	 * Get codPaisxx
	 *
	 * @return integer
	 */
	public function getCodPaisxx() {
		return $this->codPaisxx;
	}

	/**
	 * Set codDepart
	 *
	 * @param integer $codDepart
	 *
	 * @return TabGeneraDepart
	 */
	public function setCodDepart($codDepart) {
		$this->codDepart = $codDepart;

		return $this;
	}

	/**
	 * Get codDepart
	 *
	 * @return integer
	 */
	public function getCodDepart() {
		return $this->codDepart;
	}

	public function __toString()
    {
      if(is_null($this->getNomDepart())) {
              return 'NULL';
                  
      }
      return $this->getNomDepart();
    }
}
