<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:18
 */

namespace shop\app;


class Basket extends  AShop
{
    public function index(){
        parent::index();
        echo "<h3>You in Basket</h3>";
    }
}