<?php
/**
 * Created by PhpStorm.
 * User: X-User
 * Date: 29.09.2016
 * Time: 10:02
 */

namespace shop\app;


class Category extends AShop {
    public function __construct(){
        parent::__construct();
        ob_start();
        echo "<h2>You in Category!!!</h2>";
    }

    public function categoryAction($id){
        echo "<h3>action: categoryAction,<br> param: $id<br></h3>";
    }
}


