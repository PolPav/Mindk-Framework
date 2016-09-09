<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 18.08.2016
 * Time: 15:19
 */

namespace shop\app;


class Index extends AShop
{
    public function __construct(){
        parent::__construct();
        echo "<h2>You in Home Page</h2>";
    }

    public function indexMethod($param){
        echo "<h3>action: indexAction<br>param: $param</h3>";
    }

}