<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:17
 */

namespace App;


class DeliveryController extends AShopController
{
    public function __construct(){
        parent::__construct();
        echo "<h2>You in Delivery</h2>";
    }

    public function deliveryMethod(){
        echo "<h3>action: deliveryMethod,<br> param: not have param<br></h3>";
    }
}
