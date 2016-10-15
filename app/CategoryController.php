<?php
/**
 * Created by PhpStorm.
 * User: X-User
 * Date: 29.09.2016
 * Time: 10:02
 */

namespace App;


class CategoryController extends AShopController {
    public function __construct(){
        parent::__construct();
        echo "<h2>You in Category!!!</h2>";
    }

    public function categoryAction($id){
        echo "<h3>action: categoryAction,<br> param: $id<br></h3>";
    }
}


