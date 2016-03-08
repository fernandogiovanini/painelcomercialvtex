<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 18/11/15
 * Time: 15:26
 */

namespace PainelComercial\BusinessIntelligenceBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 * @package PainelComercial\BusinessIntelligenceBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="vtex_order")
 */
class Order {

    /**
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
    protected $orderId;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20)
     */
    protected $sequence;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $origin;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $affiliateId;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $salesChannel;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $merchantName;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $status;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    protected $statusDescription;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $value;

    /**
     * @var
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $creationDate;

    /**
     * @var
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $lastChange;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $orderGroup;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $totalsItems;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $totalsDiscount;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $totalsShipping;

    /**
     * @var
     *
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    protected $totalsTax;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utmSource;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utmPartner;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utmCampaign;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utmMedium;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $coupon;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utmiCampaign;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utmiPage;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utmiPart;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $shippingPostalCode;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $shippingCity;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    protected $shippingState;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $sellerId;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $sellerName;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $openTextField;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $hostname;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $callCenterOperatorUserName;

    /**
     * @var
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Item", mappedBy="order", cascade={"persist"})
     */
    protected $items;

    function __construct(){
        $this->items = new ArrayCollection();
        $this->createdAt = new \DateTime();
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

    /**
     * Set orderId
     *
     * @param string $orderId
     *
     * @return Order
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set sequence
     *
     * @param string $sequence
     *
     * @return Order
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return string
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set origin
     *
     * @param string $origin
     *
     * @return Order
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set affiliateId
     *
     * @param string $affiliateId
     *
     * @return Order
     */
    public function setAffiliateId($affiliateId)
    {
        $this->affiliateId = $affiliateId;

        return $this;
    }

    /**
     * Get affiliateId
     *
     * @return string
     */
    public function getAffiliateId()
    {
        return $this->affiliateId;
    }

    /**
     * Set salesChannel
     *
     * @param string $salesChannel
     *
     * @return Order
     */
    public function setSalesChannel($salesChannel)
    {
        $this->salesChannel = $salesChannel;

        return $this;
    }

    /**
     * Get salesChannel
     *
     * @return string
     */
    public function getSalesChannel()
    {
        return $this->salesChannel;
    }

    /**
     * Set merchantName
     *
     * @param string $merchantName
     *
     * @return Order
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;

        return $this;
    }

    /**
     * Get merchantName
     *
     * @return string
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statusDescription
     *
     * @param string $statusDescription
     *
     * @return Order
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;

        return $this;
    }

    /**
     * Get statusDescription
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Order
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Order
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set lastChange
     *
     * @param \DateTime $lastChange
     *
     * @return Order
     */
    public function setLastChange($lastChange)
    {
        $this->lastChange = $lastChange;

        return $this;
    }

    /**
     * Get lastChange
     *
     * @return \DateTime
     */
    public function getLastChange()
    {
        return $this->lastChange;
    }

    /**
     * Set orderGroup
     *
     * @param string $orderGroup
     *
     * @return Order
     */
    public function setOrderGroup($orderGroup)
    {
        $this->orderGroup = $orderGroup;

        return $this;
    }

    /**
     * Get orderGroup
     *
     * @return string
     */
    public function getOrderGroup()
    {
        return $this->orderGroup;
    }

    /**
     * Set totalsItems
     *
     * @param integer $totalsItems
     *
     * @return Order
     */
    public function setTotalsItems($totalsItems)
    {
        $this->totalsItems = $totalsItems;

        return $this;
    }

    /**
     * Get totalsItems
     *
     * @return integer
     */
    public function getTotalsItems()
    {
        return $this->totalsItems;
    }

    /**
     * Set totalsDiscount
     *
     * @param integer $totalsDiscount
     *
     * @return Order
     */
    public function setTotalsDiscount($totalsDiscount)
    {
        $this->totalsDiscount = $totalsDiscount;

        return $this;
    }

    /**
     * Get totalsDiscount
     *
     * @return integer
     */
    public function getTotalsDiscount()
    {
        return $this->totalsDiscount;
    }

    /**
     * Set totalsShipping
     *
     * @param integer $totalsShipping
     *
     * @return Order
     */
    public function setTotalsShipping($totalsShipping)
    {
        $this->totalsShipping = $totalsShipping;

        return $this;
    }

    /**
     * Get totalsShipping
     *
     * @return integer
     */
    public function getTotalsShipping()
    {
        return $this->totalsShipping;
    }

    /**
     * Set totalsTax
     *
     * @param integer $totalsTax
     *
     * @return Order
     */
    public function setTotalsTax($totalsTax)
    {
        $this->totalsTax = $totalsTax;

        return $this;
    }

    /**
     * Get totalsTax
     *
     * @return integer
     */
    public function getTotalsTax()
    {
        return $this->totalsTax;
    }

    /**
     * Set utmSource
     *
     * @param string $utmSource
     *
     * @return Order
     */
    public function setUtmSource($utmSource)
    {
        $this->utmSource = $utmSource;

        return $this;
    }

    /**
     * Get utmSource
     *
     * @return string
     */
    public function getUtmSource()
    {
        return $this->utmSource;
    }

    /**
     * Set utmPartner
     *
     * @param string $utmPartner
     *
     * @return Order
     */
    public function setUtmPartner($utmPartner)
    {
        $this->utmPartner = $utmPartner;

        return $this;
    }

    /**
     * Get utmPartner
     *
     * @return string
     */
    public function getUtmPartner()
    {
        return $this->utmPartner;
    }

    /**
     * Set utmCampaign
     *
     * @param string $utmCampaign
     *
     * @return Order
     */
    public function setUtmCampaign($utmCampaign)
    {
        $this->utmCampaign = $utmCampaign;

        return $this;
    }

    /**
     * Get utmCampaign
     *
     * @return string
     */
    public function getUtmCampaign()
    {
        return $this->utmCampaign;
    }

    /**
     * Set utmMedium
     *
     * @param string $utmMedium
     *
     * @return Order
     */
    public function setUtmMedium($utmMedium)
    {
        $this->utmMedium = $utmMedium;

        return $this;
    }

    /**
     * Get utmMedium
     *
     * @return string
     */
    public function getUtmMedium()
    {
        return $this->utmMedium;
    }

    /**
     * Set coupon
     *
     * @param string $coupon
     *
     * @return Order
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Get coupon
     *
     * @return string
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Set utmiCampaign
     *
     * @param string $utmiCampaign
     *
     * @return Order
     */
    public function setUtmiCampaign($utmiCampaign)
    {
        $this->utmiCampaign = $utmiCampaign;

        return $this;
    }

    /**
     * Get utmiCampaign
     *
     * @return string
     */
    public function getUtmiCampaign()
    {
        return $this->utmiCampaign;
    }

    /**
     * Set utmiPage
     *
     * @param string $utmiPage
     *
     * @return Order
     */
    public function setUtmiPage($utmiPage)
    {
        $this->utmiPage = $utmiPage;

        return $this;
    }

    /**
     * Get utmiPage
     *
     * @return string
     */
    public function getUtmiPage()
    {
        return $this->utmiPage;
    }

    /**
     * Set utmiPart
     *
     * @param string $utmiPart
     *
     * @return Order
     */
    public function setUtmiPart($utmiPart)
    {
        $this->utmiPart = $utmiPart;

        return $this;
    }

    /**
     * Get utmiPart
     *
     * @return string
     */
    public function getUtmiPart()
    {
        return $this->utmiPart;
    }

    /**
     * Set shippingPostalCode
     *
     * @param string $shippingPostalCode
     *
     * @return Order
     */
    public function setShippingPostalCode($shippingPostalCode)
    {
        $this->shippingPostalCode = $shippingPostalCode;

        return $this;
    }

    /**
     * Get shippingPostalCode
     *
     * @return string
     */
    public function getShippingPostalCode()
    {
        return $this->shippingPostalCode;
    }

    /**
     * Set shippingCity
     *
     * @param string $shippingCity
     *
     * @return Order
     */
    public function setShippingCity($shippingCity)
    {
        $this->shippingCity = $shippingCity;

        return $this;
    }

    /**
     * Get shippingCity
     *
     * @return string
     */
    public function getShippingCity()
    {
        return $this->shippingCity;
    }

    /**
     * Set shippingState
     *
     * @param string $shippingState
     *
     * @return Order
     */
    public function setShippingState($shippingState)
    {
        $this->shippingState = $shippingState;

        return $this;
    }

    /**
     * Get shippingState
     *
     * @return string
     */
    public function getShippingState()
    {
        return $this->shippingState;
    }

    /**
     * Set sellerId
     *
     * @param string $sellerId
     *
     * @return Order
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;

        return $this;
    }

    /**
     * Get sellerId
     *
     * @return string
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * Set sellerName
     *
     * @param string $sellerName
     *
     * @return Order
     */
    public function setSellerName($sellerName)
    {
        $this->sellerName = $sellerName;

        return $this;
    }

    /**
     * Get sellerName
     *
     * @return string
     */
    public function getSellerName()
    {
        return $this->sellerName;
    }

    /**
     * Set openTextField
     *
     * @param string $openTextField
     *
     * @return Order
     */
    public function setOpenTextField($openTextField)
    {
        $this->openTextField = $openTextField;

        return $this;
    }

    /**
     * Get openTextField
     *
     * @return string
     */
    public function getOpenTextField()
    {
        return $this->openTextField;
    }

    /**
     * Set hostname
     *
     * @param string $hostname
     *
     * @return Order
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * Get hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Set callCenterOperatorUserName
     *
     * @param string $callCenterOperatorUserName
     *
     * @return Order
     */
    public function setCallCenterOperatorUserName($callCenterOperatorUserName)
    {
        $this->callCenterOperatorUserName = $callCenterOperatorUserName;

        return $this;
    }

    /**
     * Get callCenterOperatorUserName
     *
     * @return string
     */
    public function getCallCenterOperatorUserName()
    {
        return $this->callCenterOperatorUserName;
    }

    /**
     * Get createdAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add item
     *
     * @param \PainelComercial\BusinessIntelligenceBundle\Entity\Item $item
     *
     * @return Order
     */
    public function addItem(\PainelComercial\BusinessIntelligenceBundle\Entity\Item $item)
    {
        $this->items[] = $item;
        $item->setOrder($this);

        return $this;
    }

    /**
     * Remove item
     *
     * @param \PainelComercial\BusinessIntelligenceBundle\Entity\Item $item
     */
    public function removeItem(\PainelComercial\BusinessIntelligenceBundle\Entity\Item $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
