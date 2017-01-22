<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 10.12.2016
 * Time: 12:13
 */

namespace App;

use PolPav\DI\Service;
use PolPav\View\Render;


class CategoryController
{
    public $product, $response;

    /**
     * CategoryController constructor
     * this method initialize services
     */
    
    public function __construct()
    {
        $this->product = Service::getService('product');
        $this->response = Service::getService('response');
    }

    /**
     * this method fills main view
     */

    public function categoryAction()
    {
        $buffer = Render::view('catalog.template.php');
        return $this->response->add($buffer);
    }

    /**
     * this method get products from concrete category
     */

    public function ukraineAction()
    {
        $result = $this->product->getCategoryId('Ukraine');
        $category_id = (int)$result['category_id'];
        $products = $this->product->getProductToCategory($category_id);
        Render::bustArray($products);

        $buffer = Render::view('catalog.template.php');
        return $this->response->add($buffer);
    }

    /**
     * this method get products from concrete category
     */

    public function switzerlandAction()
    {
        $result = $this->product->getCategoryId('Switzerland');
        $category_id = (int)$result['category_id'];
        $products = $this->product->getProductToCategory($category_id);
        Render::bustArray($products);

        $buffer = Render::view('catalog.template.php');
        return $this->response->add($buffer);
    }

    /**
     * this method get products from concrete category
     */

    public function smartAction()
    {
        $result = $this->product->getCategoryId('Smart');
        $category_id = (int)$result['category_id'];
        $products = $this->product->getProductToCategory($category_id);
        Render::bustArray($products);

        $buffer = Render::view('catalog.template.php');
        return $this->response->add($buffer);
    }
}