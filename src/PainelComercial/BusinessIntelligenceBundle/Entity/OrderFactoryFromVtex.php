<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 19/11/15
 * Time: 12:34
 */

namespace PainelComercial\BusinessIntelligenceBundle\Entity;

use PainelComercial\BusinessIntelligenceBundle\Util\VtexCurrencyConverter;
use PainelComercial\BusinessIntelligenceBundle\Util\VtexDateTimeConverter;

class OrderFactoryFromVtex implements OrderFactoryInterface {

    public static function create($data){
        $order = new Order();
        $order->setOrderId($data->orderId);
        $order->setSequence($data->sequence);
        $order->setOrigin($data->origin);
        $order->setAffiliateId($data->affiliateId);
        $order->setSalesChannel($data->salesChannel);
        $order->setMerchantName($data->merchantName);
        $order->setStatus($data->status);
        $order->setStatusDescription($data->statusDescription);
        $order->setValue(VtexCurrencyConverter::convert($data->value));
        $order->setOrderGroup($data->orderGroup);
        $order->setHostname($data->hostname);
        $order->setCallCenterOperatorUserName(self::extractCallCenterOperatorName($data));

        $order->setOpenTextField(self::extractOpenTextField($data));

        $order->setCreationDate(VtexDateTimeConverter::convert($data->creationDate));
        $order->setLastChange(VtexDateTimeConverter::convert($data->lastChange));

        $order->setTotalsItems(self::extractTotalsItem($data));
        $order->setTotalsDiscount(self::extractTotalsDiscounts($data));
        $order->setTotalsShipping(self::extractTotalsShipping($data));
        $order->setTotalsTax(self::extractTotalsTax($data));

        $order->setSellerId(self::extractSellerId($data));
        $order->setSellerName(self::extractSellerName($data));

        $order->setUtmSource(self::extractUtmSource($data));
        $order->setUtmPartner(self::extractUtmPartner($data));
        $order->setUtmCampaign(self::extractUtmCampaign($data));
        $order->setCoupon(self::extractCoupon($data));
        $order->setUtmiCampaign(self::extractUtmiCampaign($data));
        $order->setUtmiPage(self::extractUtmiPage($data));
        $order->setUtmiPart(self::extractUtmiPart($data));

        $order->setShippingPostalCode(self::extractShippingPostalCode($data));
        $order->setShippingCity(self::extractShippingCity($data));
        $order->setShippingState(self::extractShippingState($data));

        $items = self::extractItems($data);
        foreach($items as $item){
            $order->addItem($item);
        }

        return $order;
    }

    private static function extractTotals($data, $id){
        if(!is_array($data->totals)){
            return 0;
        }
        $totals = $data->totals;
        foreach($totals as $total){
            if($total->id == $id){
                return VtexCurrencyConverter::convert($total->value);
            }
        }
        return 0;
    }

    private static function extractTotalsItem($data){
        return self::extractTotals($data, 'Items');
    }

    private static function extractTotalsDiscounts($data){
        return self::extractTotals($data, 'Discounts');
    }

    private static function extractTotalsShipping($data){
        return self::extractTotals($data, 'Shipping');
    }

    private static function extractTotalsTax($data){
        return self::extractTotals($data, 'Tax');
    }

    private static function extractMarketingData($data, $item){
        if(!($data->marketingData instanceof \stdClass)){
            return null;
        }
        $marketingData = $data->marketingData;
        if(property_exists($marketingData, $item)){
            return $marketingData->{$item};
        }
    }

    private static function extractUtmSource($data){
        return self::extractMarketingData($data, 'utmSource');
    }

    private static function extractUtmPartner($data){
        return self::extractMarketingData($data, 'utmPartner');
    }

    private static function extractUtmCampaign($data){
        return self::extractMarketingData($data, 'utmCampaign');
    }

    private static function extractCoupon($data){
        return self::extractMarketingData($data, 'coupon');
    }

    private static function extractUtmiCampaign($data){
        return self::extractMarketingData($data, 'utmiCampaign');
    }

    private static function extractUtmiPage($data){
        return self::extractMarketingData($data, 'utmiPage');
    }

    private static function extractUtmiPart($data){
        return self::extractMarketingData($data, 'utmiPart');
    }

    private static function extractAddressData($data, $item){
        if(!($data->shippingData instanceof \stdClass)){
            return null;
        }
        if(!($data->shippingData->address instanceof \stdClass)){
            return null;
        }
        $address = $data->shippingData->address;
        if(property_exists($address, $item)){
            return $address->{$item};
        }
    }

    private static function extractShippingPostalCode($data){
        return self::extractAddressData($data, 'postalCode');
    }

    private static function extractShippingCity($data){
        return self::extractAddressData($data, 'city');
    }

    private static function extractShippingState($data){
        return self::extractAddressData($data, 'state');
    }

    private static function extractSeller($data, $item){
        if(!is_array($data->sellers)){
            return null;
        }
        $seller = $data->sellers[0];

        if(!($seller instanceof \stdClass)){
            return null;
        }
        if(property_exists($seller, $item)){
            return $seller->{$item};
        }
    }

    private static function extractSellerId($data){
        return self::extractSeller($data, 'id');
    }

    private static function extractSellerName($data){
        return self::extractSeller($data, 'name');
    }

    private static function extractItems($data){
        if(!is_array($data->items)){
            return null;
        }
        $items = $data->items;
        $itemsArray = [];
        foreach($items as $item){
            $itemsArray[] = ItemFactoryFromVtex::create($item);
        }
        return $itemsArray;
    }

    private static function extractOpenTextField($data){
        if($data->openTextField instanceof \stdClass){
            return $data->openTextField->value;
        }
        return null;
    }

    private static function extractCallCenterOperatorName($data){
        if($data->callCenterOperatorData instanceof \stdClass){
            return $data->callCenterOperatorData->userName;
        }
        return null;
    }
}