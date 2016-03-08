<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 22/11/15
 * Time: 20:03
 */

namespace Vtex\ApiBundle\Service;


abstract class ServiceAbstract {

    private $client;

    public function __construct(ServiceConfig $config){
        $this->client = new \GuzzleHttp\Client($config->getConfig());
    }

    protected function getClient(){
        return $this->client;
    }
}