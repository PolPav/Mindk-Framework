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
    public function __construct(){
        parent::__construct();
        echo "<h2>You in Catalog!!!</h2>";
    }

    public function catalogMethodGet($param){
        echo "<h3>action: catalogMethodGet,<br> param: $param<br></h3>";
    }

    public function catalogMethodPost($param){
        echo "<h3>action: catalogMethodPost,<br> param: $param<br></h3>";
    }
}