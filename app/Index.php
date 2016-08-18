<?php
/**
 * Created by PhpStorm.
 * User: X-User
 * Date: 18.08.2016
 * Time: 15:19
 */

namespace shop\app;


class Index extends AShop
{
    function index(){
        parent::index();
        echo "<h3>You in Home Page</h3>";
    }
}