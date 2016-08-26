<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:16
 */

namespace shop\app;


class Search extends AShop
{
    public function index(){
        parent::index();
        echo "<h3>You in Search</h3>";
    }
}