<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 04/11/15
 * Time: 15:54
 */

namespace Vtex\ApiBundle\Service\Oms;


use Vtex\ApiBundle\Query\QueryInterface;
use Vtex\ApiBundle\Service\Exception\ErrorException;
use Psr\Http\Message\ResponseInterface;
use Vtex\ApiBundle\Service\ServiceAbstract;

class OrderService extends ServiceAbstract{

    public function orders($orderId = null, QueryInterface $query = null){
        try {
            $queryString = null;
            if($query instanceof QueryInterface){
                $queryString = $query->toString();
            }
            $client = $this->getClient();
            $response = $client->get("/api/oms/pvt/orders/{$orderId}{$queryString}");
            if($response instanceof ResponseInterface){
                return json_decode($response->getBody()->getContents());
            }
            return null;
        }
        catch (\Exception $e){
            throw new ErrorException($e->getMessage());
        }
    }
}