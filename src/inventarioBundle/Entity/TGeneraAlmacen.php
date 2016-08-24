<?php
namespace inventarioBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Tgeneraalmacen
 *
 * @ORM\Table(name="TGeneraAlmacen")
 * @ORM\Entity
 */

class TGeneraAlmacen {
	/**
	 * @var string
	 *
	 * @ORM\Column(name="nomAlmacen", type="string", length=100, nullable=false)
	 */
	private $nomalmacen;

	/**
	 * @var \inventarioBundle\Entity\TabGeneraPaises
	 *
	 * @ORM\ManyToOne(targetEntity="inventarioBundle\Entity\TabGeneraPaises")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="cod_paisxx", referencedColumnName="cod_paisxx")
	 * })
	 */
	private $codpais;

	/**
	 * @var \inventarioBundle\Entity\TabGeneraDepart
	 *
	 * @ORM\ManyToOne(targetEntity="inventarioBundle\Entity\TabGeneraDepart")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="cod_depart", referencedColumnName="cod_depart")
	 * })
	 */
	private $coddepart;

	/**
	 * @var \inventarioBundle\Entity\TabGeneraCiudad
	 *
	 * @ORM\ManyToOne(targetEntity="inventarioBundle\Entity\TabGeneraCiudad")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="cod_ciudad", referencedColumnName="cod_ciudad")
	 * })
	 */
	private $codciudad;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="usrCreaci", type="string", length=100, nullable=false)
	 */
	private $usrcreaci;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="fecCreaci", type="datetime", nullable=false)
	 */
	private $feccreaci;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="usrModify", type="string", length=100, nullable=true)
	 */
	private $usrmodify;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="fecModify", type="datetime", nullable=true)
	 */
	private $fecmodify;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * Set nomalmacen
	 *
	 * @param string $nomalmacen
	 *
	 * @return Tgeneraalmacen
	 */
	public function setNomalmacen($nomalmacen) {
		$this->nomalmacen = $nomalmacen;

		return $this;
	}

	/**
	 * Get nomalmacen
	 *
	 * @return string
	 */
	public function getNomalmacen() {
		return $this->nomalmacen;
	}

	/**
	 * Set codpais
	 *
	 * @param string $codpais
	 *
	 * @return Tgeneraalmacen
	 */
	public function setCodpais($codpais) {
		$this->codpais = $codpais;

		return $this;
	}

	/**
	 * Get codpais
	 *
	 * @return string
	 */
	public function getCodpais() {
		return $this->codpais;
	}

	/**
	 * Set coddepart
	 *
	 * @param string $coddepart
	 *
	 * @return Tgeneraalmacen
	 */
	public function setCoddepart($coddepart) {
		$this->coddepart = $coddepart;

		return $this;
	}

	/**
	 * Get coddepart
	 *
	 * @return string
	 */
	public function getCoddepart() {
		return $this->coddepart;
	}

	/**
	 * Set codciudad
	 *
	 * @param string $codciudad
	 *
	 * @return Tgeneraalmacen
	 */
	public function setCodciudad($codciudad) {
		$this->codciudad = $codciudad;

		return $this;
	}

	/**
	 * Get codciudad
	 *
	 * @return string
	 */
	public function getCodciudad() {
		return $this->codciudad;
	}

	/**
	 * Set usrcreaci
	 *
	 * @param string $usrcreaci
	 *
	 * @return Tgeneraalmacen
	 */
	public function setUsrcreaci($usrcreaci) {
		$this->usrcreaci = $usrcreaci;

		return $this;
	}

	/**
	 * Get usrcreaci
	 *
	 * @return string
	 */
	public function getUsrcreaci() {
		return $this->usrcreaci;
	}

	/**
	 * Set feccreaci
	 *
	 * @param \DateTime $feccreaci
	 *
	 * @return Tgeneraalmacen
	 */
	public function setFeccreaci($feccreaci) {
		$this->feccreaci = $feccreaci;

		return $this;
	}

	/**
	 * Get feccreaci
	 *
	 * @return \DateTime
	 */
	public function getFeccreaci() {
		return $this->feccreaci;
	}

	/**
	 * Set usrmodify
	 *
	 * @param string $usrmodify
	 *
	 * @return Tgeneraalmacen
	 */
	public function setUsrmodify($usrmodify) {
		$this->usrmodify = $usrmodify;

		return $this;
	}

	/**
	 * Get usrmodify
	 *
	 * @return string
	 */
	public function getUsrmodify() {
		return $this->usrmodify;
	}

	/**
	 * Set fecmodify
	 *
	 * @param \DateTime $fecmodify
	 *
	 * @return Tgeneraalmacen
	 */
	public function setFecmodify($fecmodify) {
		$this->fecmodify = $fecmodify;

		return $this;
	}

	/**
	 * Get fecmodify
	 *
	 * @return \DateTime
	 */
	public function getFecmodify() {
		return $this->fecmodify;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	public function __toString() {
		if (is_null($this->getNomalmacen())) {
			return 'NULL';

		}
		return $this->getNomalmacen();
	}
}
