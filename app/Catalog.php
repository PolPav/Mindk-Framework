<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:15
 */

namespace shop\app;


class Catalog extends AShop
{
    public function index(){
        parent::index();
        echo "<h3>You in Catalog</h3>";
    }
}