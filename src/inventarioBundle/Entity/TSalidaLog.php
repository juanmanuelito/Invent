<?php

namespace inventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TSalidaLog
 *
 * @ORM\Table(name="t_salida_log")
 * @ORM\Entity(repositoryClass="inventarioBundle\Repository\TSalidaLogRepository")
 */
class TSalidaLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_salida", type="integer")
     */
    private $idSalida;

    /**
     * @var int
     *
     * @ORM\Column(name="id_producto", type="integer")
     */
    private $codProduc;

    /**
     * @var int
     *
     * @ORM\Column(name="id_almacen", type="integer")
     */
    private $codAlmacen;

    /**
     * @var int
     *
     * @ORM\Column(name="id_entrada", type="integer")
     */
    private $idEntrada;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_creaci", type="string", length=150)
     */
    private $usrCreaci;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_creaci", type="datetime")
     */
    private $fecCreaci;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_modifi", type="string", length=150, nullable=true)
     */
    private $usrModifi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_modifi", type="datetime", nullable=true)
     */
    private $fecModifi;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idSalida
     *
     * @param integer $idSalida
     *
     * @return TSalidaLog
     */
    public function setIdSalida($idSalida)
    {
        $this->idSalida = $idSalida;

        return $this;
    }

    /**
     * Get idSalida
     *
     * @return int
     */
    public function getIdSalida()
    {
        return $this->idSalida;
    }

    /**
     * Set idEntrada
     *
     * @param integer $idEntrada
     *
     * @return TSalidaLog
     */
    public function setIdEntrada($idEntrada)
    {
        $this->idEntrada = $idEntrada;

        return $this;
    }

    /**
     * Get idEntrada
     *
     * @return int
     */
    public function getIdEntrada()
    {
        return $this->idEntrada;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return TSalidaLog
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set usrCreaci
     *
     * @param string $usrCreaci
     *
     * @return TSalidaLog
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
     * @return TSalidaLog
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
     * @return TSalidaLog
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
     * @return TSalidaLog
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
     * Set codProduc
     *
     * @param integer $codProduc
     *
     * @return TSalidaLog
     */
    public function setCodProduc($codProduc)
    {
        $this->codProduc = $codProduc;

        return $this;
    }

    /**
     * Get codProduc
     *
     * @return int
     */
    public function getCodProduct()
    {
        return $this->codProduc;
    }


    /**
     * Set codAlmacen
     *
     * @param integer $codAlmacen
     *
     * @return TSalidaLog
     */
    public function setCodAlmacen($codAlmacen)
    {
        $this->codAlmacen = $codAlmacen;

        return $this;
    }

    /**
     * Get codAlmacen
     *
     * @return int
     */
    public function getCodAlmacen()
    {
        return $this->codAlmacen;
    }


}

