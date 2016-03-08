<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 22/11/15
 * Time: 20:05
 */

namespace Vtex\ApiBundle\Service;


class ServiceConfig {

    private $baseUri;
    private $accept;
    private $contentType;
    private $auth;


    public function __construct($baseUri, $accept, $contentType){
        $this->baseUri = $baseUri;
        $this->accept = $accept;
        $this->contentType = $contentType;
        $this->auth = null;
    }

    public function setAuth($appKey, $appSecret){
        if($appKey){
            $this->auth['app_key'] = $appKey;
        }
        if($appSecret){
            $this->auth['app_token'] = $appSecret;
        }
    }

    public function getConfig(){
        $config = [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Accept' => $this->accept,
                'Content-Type' => $this->contentType
            ]
        ];

        if(is_array($this->auth)){
            $config['headers']['x-vtex-api-appKey'] = $this->auth['app_key'];
            $config['headers']['x-vtex-api-appToken'] = $this->auth['app_token'];
        }

        return $config;
    }
}