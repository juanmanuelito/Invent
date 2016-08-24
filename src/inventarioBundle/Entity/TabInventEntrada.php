<?php

namespace inventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TabInventEntrada
 *
 * @ORM\Table(name="TabInventEntrada")
 * @ORM\Entity(repositoryClass="inventarioBundle\Repository\TabInventEntradaRepository")
 */
class TabInventEntrada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="canProduct", type="integer")
     */
    private $canProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="valEntrada", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $valEntrada;

    /**
     * @var string
     *
     * @ORM\Column(name="codDocument", type="string", length=150, nullable=true)
     */
    private $codDocument;

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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="TGeneraAlmacen", cascade={"all"})
     * @ORM\JoinColumn(name="codAlmacen", referencedColumnName="id")
     */
    private $Almacen;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="TGeneraProduct", cascade={"all"})
     * @ORM\JoinColumn(name="codProduct", referencedColumnName="id")
     */
    private $Producto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecModify", type="datetime", nullable=true)
     */
    private $fecModify;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set canProduct
     *
     * @param integer $canProduct
     *
     * @return TabInventEntrada
     */
    public function setCanProduct($canProduct)
    {
        $this->canProduct = $canProduct;

        return $this;
    }

    /**
     * Get canProduct
     *
     * @return integer
     */
    public function getCanProduct()
    {
        return $this->canProduct;
    }

    /**
     * Set valEntrada
     *
     * @param string $valEntrada
     *
     * @return TabInventEntrada
     */
    public function setValEntrada($valEntrada)
    {
        $this->valEntrada = $valEntrada;

        return $this;
    }

    /**
     * Get valEntrada
     *
     * @return string
     */
    public function getValEntrada()
    {
        return $this->valEntrada;
    }

    /**
     * Set codDocument
     *
     * @param string $codDocument
     *
     * @return TabInventEntrada
     */
    public function setCodDocument($codDocument)
    {
        $this->codDocument = $codDocument;

        return $this;
    }

    /**
     * Get codDocument
     *
     * @return string
     */
    public function getCodDocument()
    {
        return $this->codDocument;
    }

    /**
     * Set usrCreaci
     *
     * @param string $usrCreaci
     *
     * @return TabInventEntrada
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
     * @return TabInventEntrada
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
     * Set usrModify
     *
     * @param string $usrModify
     *
     * @return TabInventEntrada
     */
    public function setUsrModify($usrModify)
    {
        $this->usrModify = $usrModify;

        return $this;
    }

    /**
     * Get usrModify
     *
     * @return string
     */
    public function getUsrModify()
    {
        return $this->usrModify;
    }

    /**
     * Set almacen
     *
     * @param integer $almacen
     *
     * @return TabInventEntrada
     */
    public function setAlmacen($almacen)
    {
        $this->Almacen = $almacen;

        return $this;
    }

    /**
     * Get almacen
     *
     * @return integer
     */
    public function getAlmacen()
    {
        return $this->Almacen;
    }

    /**
     * Set producto
     *
     * @param integer $producto
     *
     * @return TabInventEntrada
     */
    public function setProducto($producto)
    {
        $this->Producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return integer
     */
    public function getProducto()
    {
        return $this->Producto;
    }

    /**
     * Set fecModify
     *
     * @param \DateTime $fecModify
     *
     * @return TabInventEntrada
     */
    public function setFecModify($fecModify)
    {
        $this->fecModify = $fecModify;

        return $this;
    }

    /**
     * Get fecModify
     *
     * @return \DateTime
     */
    public function getFecModify()
    {
        return $this->fecModify;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
