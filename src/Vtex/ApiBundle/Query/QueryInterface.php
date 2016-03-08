<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 05/11/15
 * Time: 17:24
 */

namespace Vtex\ApiBundle\Query;

interface QueryInterface {
    public function toString();
    public function setParam($param,$value);
}