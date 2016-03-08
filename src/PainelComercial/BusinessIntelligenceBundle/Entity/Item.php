<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 18/11/15
 * Time: 15:26
 */

namespace PainelComercial\BusinessIntelligenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Item
 * @package PainelComercial\BusinessIntelligenceBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="vtex_item")
 */
class Item {

    /**
     * @var
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20)
     */
    protected $skuId;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $productId;

    /**
     * @var
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $quantity;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $seller;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $name;

    /**
     * @var
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $refId;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $price;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $listPrice;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $manualPrice;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $brandName;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $categoriesIds;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="items")
     */
    protected $order;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set skuId
     *
     * @param string $skuId
     *
     * @return Item
     */
    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;

        return $this;
    }

    /**
     * Get skuId
     *
     * @return string
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Set productId
     *
     * @param string $productId
     *
     * @return Item
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Item
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set seller
     *
     * @param string $seller
     *
     * @return Item
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;

        return $this;
    }

    /**
     * Get seller
     *
     * @return string
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set refId
     *
     * @param integer $refId
     *
     * @return Item
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;

        return $this;
    }

    /**
     * Get refId
     *
     * @return integer
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set listPrice
     *
     * @param integer $listPrice
     *
     * @return Item
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    /**
     * Get listPrice
     *
     * @return integer
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Set manualPrice
     *
     * @param integer $manualPrice
     *
     * @return Item
     */
    public function setManualPrice($manualPrice)
    {
        $this->manualPrice = $manualPrice;

        return $this;
    }

    /**
     * Get manualPrice
     *
     * @return integer
     */
    public function getManualPrice()
    {
        return $this->manualPrice;
    }

    /**
     * Set brandName
     *
     * @param string $brandName
     *
     * @return Item
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * Get brandName
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Set categoriesIds
     *
     * @param string $categoriesIds
     *
     * @return Item
     */
    public function setCategoriesIds($categoriesIds)
    {
        $this->categoriesIds = $categoriesIds;

        return $this;
    }

    /**
     * Get categoriesIds
     *
     * @return string
     */
    public function getCategoriesIds()
    {
        return $this->categoriesIds;
    }

    /**
     * Set order
     *
     * @param \PainelComercial\BusinessIntelligenceBundle\Entity\Order $order
     *
     * @return Item
     */
    public function setOrder(\PainelComercial\BusinessIntelligenceBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \PainelComercial\BusinessIntelligenceBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }
}
