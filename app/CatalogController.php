<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:15
 */

namespace App;

use PolPav\DI\Service;
use PolPav\View\Render;


class CatalogController
{

    public $product, $response, $redirect;

    /**
     * CatalogController constructor
     * this method initialize services
     */

    public function __construct()
    {
        $this->product = Service::getService('product');
        $this->response = Service::getService('response');
        $this->redirect = Service::getService('redirect');
    }

    /**
     * this method get products to catalog
     */

    public function catalogAction()
    {
        $obj = $this->product;
        $products = $obj->getProducts();
        Render::bustArray($products);
        
        $buffer = Render::view('catalog.template.php');
        return $this->response->add($buffer);

    }

    /**
     * this method add products to basket
     * @param $id
     */

    public function addAction($id){
        if($id){
            $file = "$id|";
           file_put_contents('basket.log', $file, FILE_APPEND);
        }

        return $this->redirect->redirect('/catalog');
    }
    
}