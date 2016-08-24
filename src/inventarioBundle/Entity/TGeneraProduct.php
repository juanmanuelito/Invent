<?php

namespace inventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TGeneraProduct
 *
 * @ORM\Table(name="TGeneraProduct")
 * @ORM\Entity(repositoryClass="inventarioBundle\Repository\TGeneraProductRepository")
 */
class TGeneraProduct
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomProduct", type="string", length=150)
     */
    private $nomProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="desProduct", type="string", length=200, nullable=true)
     */
    private $desProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="usrCreate", type="string", length=100)
     */
    private $usrCreate;

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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nomProduct
     *
     * @param string $nomProduct
     *
     * @return TGeneraProduct
     */
    public function setNomProduct($nomProduct)
    {
        $this->nomProduct = $nomProduct;

        return $this;
    }

    /**
     * Get nomProduct
     *
     * @return string
     */
    public function getNomProduct()
    {
        return $this->nomProduct;
    }

    /**
     * Set desProduct
     *
     * @param string $desProduct
     *
     * @return TGeneraProduct
     */
    public function setDesProduct($desProduct)
    {
        $this->desProduct = $desProduct;

        return $this;
    }

    /**
     * Get desProduct
     *
     * @return string
     */
    public function getDesProduct()
    {
        return $this->desProduct;
    }

    /**
     * Set usrCreate
     *
     * @param string $usrCreate
     *
     * @return TGeneraProduct
     */
    public function setUsrCreate($usrCreate)
    {
        $this->usrCreate = $usrCreate;

        return $this;
    }

    /**
     * Get usrCreate
     *
     * @return string
     */
    public function getUsrCreate()
    {
        return $this->usrCreate;
    }

    /**
     * Set fecCreaci
     *
     * @param \DateTime $fecCreaci
     *
     * @return TGeneraProduct
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
     * @return TGeneraProduct
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
     * Set fecModify
     *
     * @param \DateTime $fecModify
     *
     * @return TGeneraProduct
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
    public function __toString()
    {
      if(is_null($this->getNomProduct())) {
              return 'NULL';
                  
      }
      return $this->getNomProduct();
    }

}
