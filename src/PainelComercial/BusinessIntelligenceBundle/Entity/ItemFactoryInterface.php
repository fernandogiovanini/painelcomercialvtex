<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 19/11/15
 * Time: 12:33
 */

namespace PainelComercial\BusinessIntelligenceBundle\Entity;


interface ItemFactoryInterface {
    public static function create($data);
}