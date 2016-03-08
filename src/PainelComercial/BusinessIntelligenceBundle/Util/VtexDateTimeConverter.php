<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 20/11/15
 * Time: 20:17
 */

namespace PainelComercial\BusinessIntelligenceBundle\Util;

class VtexDateTimeConverter {

    public static function convert($datetime){
        $datetime = explode('.', $datetime);
        $millisecondsAndTimezone = explode('+',$datetime[1]);
        $datetime = $datetime[0] . '+' . $millisecondsAndTimezone[1];
        $datetime = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $datetime, new \DateTimeZone('Europe/London'));
        $datetime->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
        return $datetime;
    }
}