<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 05/11/15
 * Time: 17:27
 */

namespace Vtex\ApiBundle\Query;


class Query implements QueryInterface{

    private $queryParams;

    public function __construct(array $queryParams){
        foreach($queryParams as $key => $value){
            $this->setParam($key, $value);
        }
    }

    public function setParam($param,$value){
        $this->queryParams[$param] = $value;
        return $this;
    }

    public function toString(){
        if(count($this->queryParams)){
            return '?'.http_build_query($this->queryParams);
        }
        return null;
    }
}