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

    public function __construct(){
        parent::__construct();
        echo "<h2>You in Search</h2>";
    }

    public function searchMethod($param){
        echo "<h3>action: searchMethod,<br> param: $param<br></h3>";
    }
}