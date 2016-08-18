<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:17
 */

namespace shop\app;


class Contacts extends AShop
{
    public function index(){
        parent::index();
        echo "<h3>You in Contacts</h3>";
    }
}