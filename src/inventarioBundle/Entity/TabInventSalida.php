<?php

namespace inventarioBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * TabInventSalida
 *
 * @ORM\Table(name="TabInventSalida")
 * @ORM\Entity(repositoryClass="inventarioBundle\Repository\TabInventSalidaRepository")
 */

class TabInventSalida {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="canProducto", type="integer")
	 */
	private $canProducto;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="codDocument", type="string", length=150, nullable=true)
	 */
	private $codDocument;
	/**
	 * @var string
	 *
	 * @ORM\Column(name="valSalida", type="decimal", precision=10, scale=2, nullable=true)
	 */

	private $valSalida;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="usrCreaci", type="string", length=100)
	 */
	private $usrCreaci;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="fecCreaci", type="datetime")
	 */
	private $fecCreaci;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="usrModify", type="string", length=100, nullable=true)
	 */
	private $usrModify;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="fecModify", type="datetime", nullable=true)
	 */
	private $fecModify;

	/**
	 * @var integer
	 *
	 * @ORM\ManyToOne(targetEntity="TGeneraAlmacen", cascade={"all"})
	 * @ORM\JoinColumn(name="codAlmacen", referencedColumnName="id")
	 */
	private $almacen;

	/**
	 * @var integer
	 *
	 * @ORM\ManyToOne(targetEntity="TGeneraProduct", cascade={"all"})
	 * @ORM\JoinColumn(name="codProduct", referencedColumnName="id")
	 */
	private $product;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * Set canProducto
	 *
	 * @param integer $canProducto
	 *
	 * @return TabInventSalida
	 */
	public function setCanProducto($canProducto) {
		$this->canProducto = $canProducto;

		return $this;
	}

	/**
	 * Get canProducto
	 *
	 * @return integer
	 */
	public function getCanProducto() {
		return $this->canProducto;
	}

	/**
	 * Set codDocument
	 *
	 * @param string $codDocument
	 *
	 * @return TabInventSalida
	 */
	public function setCodDocument($codDocument) {
		$this->codDocument = $codDocument;

		return $this;
	}

	/**
	 * Get codDocument
	 *
	 * @return string
	 */
	public function getCodDocument() {
		return $this->codDocument;
	}

	/**
	 * Set valSalida
	 *
	 * @param string $valSalida
	 *
	 * @return TabInventSalida
	 */
	public function setValSalida($valSalida) {
		$this->valSalida = $valSalida;

		return $this;
	}

	/**
	 * Get valSalida
	 *
	 * @return string
	 */
	public function getValSalida() {
		return $this->valSalida;
	}

	/**
	 * Set usrCreaci
	 *
	 * @param string $usrCreaci
	 *
	 * @return TabInventSalida
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
	 * @return TabInventSalida
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
	 * Set usrModify
	 *
	 * @param string $usrModify
	 *
	 * @return TabInventSalida
	 */
	public function setUsrModify($usrModify) {
		$this->usrModify = $usrModify;

		return $this;
	}

	/**
	 * Get usrModify
	 *
	 * @return string
	 */
	public function getUsrModify() {
		return $this->usrModify;
	}

	/**
	 * Set fecModify
	 *
	 * @param \DateTime $fecModify
	 *
	 * @return TabInventSalida
	 */
	public function setFecModify($fecModify) {
		$this->fecModify = $fecModify;

		return $this;
	}

	/**
	 * Get fecModify
	 *
	 * @return \DateTime
	 */
	public function getFecModify() {
		return $this->fecModify;
	}

	/**
	 * Set almacen
	 *
	 * @param integer $almacen
	 *
	 * @return TabInventSalida
	 */
	public function setAlmacen($almacen) {
		$this->almacen = $almacen;

		return $this;
	}

	/**
	 * Get almacen
	 *
	 * @return integer
	 */
	public function getAlmacen() {
		return $this->almacen;
	}

	/**
	 * Set product
	 *
	 * @param integer $product
	 *
	 * @return TabInventSalida
	 */
	public function setProduct($product) {
		$this->product = $product;

		return $this;
	}

	/**
	 * Get product
	 *
	 * @return integer
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
}
