<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:18
 */

namespace App;


class BasketController extends  AShopController
{
    public function __construct(){
        parent::__construct();
        echo "<h2>You in Basket</h2>";
    }

    public function basketMethod($param){
        echo "<h3>action: basketMethod,<br> param: $param<br></h3>";
    }
}