<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 30/11/15
 * Time: 10:33
 */

namespace PainelComercial\BusinessIntelligenceBundle\Util;


class VtexCurrencyConverter {

    public static function convert($value){
        return $value/100;
    }

}