<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 18.11.2016
 * Time: 10:56
 */

namespace App;

use PolPav\DI\Service;
use PolPav\View\Render;


class BasketController
{
    const ORDERS_FILE = '../app/admin/orders.log';
    public static $basket = [], $count;
    public $product, $response, $redirect;

    /**
     * BasketController constructor
     * this method initialize services
     */

    public function __construct()
    {
        $this->product = Service::getService('product');
        $this->response = Service::getService('response');
        $this->redirect = Service::getService('redirect');
    }

    /**
     * this method create list orders in basket file
     */

    public function getBasket()
    {
        $file = file_get_contents('basket.log');
        $split = explode('|', $file);
        $arr_id = [];
        foreach ($split as $id){
            if($id != null){
                 $arr_id[] = (int)$id;
            }
        }
            return $arr_id;
    }

    /**
     * this method get products to basket by id
     */

    public function basketAction()
    {
        if(is_file('basket.log')){
            $arr_id = $this->getBasket();
            $products = $this->product->getProductsToBasket($arr_id);
            Render::bustArray($products);
        }

        $buffer = Render::view('basket.template.php');
        $this->response->add($buffer);
    }

    /**
     * this method delete basket
     */
    
    public function deleteAction()
    {
        if(is_file('basket.log')) {
            unlink('basket.log');
            $this->redirect->redirect('/catalog');
        } else {
            $this->redirect->redirect('/basket');
        }
    }

    /**
     * this method fills main view for orders
     */

    public function orderAction()
    {
        if(!is_file('basket.log')){
            $this->redirect->redirect('/basket');
        } else {
            $buffer = Render::view('order.template.php');
            $this->response->add($buffer);
        }
    }

    /**
     * this method save orders in orders file and database
     */

    public function addOrder()
    {
        $order = Service::getService('order');
        if (empty($_POST['name']) or empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['address'])) {
            Render::$error = 'Fill in all the fields';
            $buffer = Render::view('order.template.php');
            $this->response->add($buffer);
        } else {
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $phone = strip_tags($_POST['phone']);
            $address = strip_tags($_POST['address']);
            $date = date('r');
            $order_number = uniqid();

            $orders = "$order_number|$name|$email|$phone|$address|$date\n";
            file_put_contents(self::ORDERS_FILE, $orders, FILE_APPEND);

            if (is_file('basket.log')) {
                $arr_id = $this->getBasket();
                $products = $this->product->getProductName($arr_id);

                if ($products != false) {
                    unlink('basket.log');
                }

                foreach ($products as $product) {
                    $order->product_name = $product['product_name'];
                    $order->price = $product['price'];
                    $order->order_number = $order_number;
                    $order->user_name = $name;
                    $order->delivery_address = $address;
                    $order->date_time = $date;
                    $order->saveOrder();
                }
            }

            $buffer = Render::view('order_accept.template.php');
            $this->response->add($buffer);
        }
    }
}