<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 21.11.2016
 * Time: 14:11
 */

namespace App;

use PolPav\DI\Service;
use PolPav\View\Render;



class SearchController
{
    public $product, $response;

    /**
     * SearchController construct
     * this method initialize services
     */

    public function __construct()
    {
        $this->product = Service::getService('product');
        $this->response = Service::getService('response');
    }

    /**
     * this method get products for search
     */

    public function searchAction()
    {
        $service = $this->product;

        if(!empty($_POST)){
            $search = strip_tags($_POST['search']);
            $products = $service->getProductSearch($search);
            Render::bustArray($products);
            $buffer = Render::view('catalog.template.php');
            return $this->response->add($buffer);
        }
    }
}