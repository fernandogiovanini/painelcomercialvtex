<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 19/11/15
 * Time: 12:34
 */

namespace PainelComercial\BusinessIntelligenceBundle\Entity;

use PainelComercial\BusinessIntelligenceBundle\Util\VtexCurrencyConverter;

class ItemFactoryFromVtex implements ItemFactoryInterface {

    public static function create($data){
        $item = new Item();
        $item->setSkuId($data->id);
        $item->setProductId($data->productId);
        $item->setQuantity($data->quantity);
        $item->setSeller($data->seller);
        $item->setName($data->name);
        $item->setRefId($data->refId);
        $item->setPrice(VtexCurrencyConverter::convert($data->price));
        $item->setListPrice(VtexCurrencyConverter::convert($data->listPrice));
        $item->setManualPrice(VtexCurrencyConverter::convert($data->manualPrice));
        $item->setBrandName(self::extractBrandName($data));
        $item->setCategoriesIds(self::extractCategoriesIds($data));
        return $item;
    }

    private static function extractAdditionalInfo($data, $item){
        if(!($data->additionalInfo instanceof \stdClass)){
            return null;
        }
        $additionalInfo = $data->additionalInfo;
        if(property_exists($additionalInfo, $item)){
            return $additionalInfo->{$item};
        }
        return null;
    }

    private static function extractBrandName($data){
        return self::extractAdditionalInfo($data, 'brandName');
    }

    private static function extractCategoriesIds($data){
        return self::extractAdditionalInfo($data, 'categoriesIds');
    }
}