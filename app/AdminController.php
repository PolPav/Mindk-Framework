<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 18.11.2016
 * Time: 14:45
 */

namespace App;

use PolPav\DI\Service;
use PolPav\Security\Security;
use PolPav\Security\Session;
use PolPav\View\Render;
use PolPav\Upload;


class AdminController
{
    public $order, $name, $product, $response, $redirect;

    /**
     * AdminController constructor
     * this method initialize services
     */
    
    public function __construct()
    {
        $this->order = Service::getService('order');
        $this->product = Service::getService('product');
        $this->response = Service::getService('response');
        $this->redirect = Service::getService('redirect');
    }

    /**
     * this method fills the main view
     */

    public function loginAdmin()
    {
        $buffer = Render::view('admin.order.template.php');
        return $this->response->add($buffer);
    }

    /**
     * this method add products to catalog
     */

    public function addAction()
    {
        if(empty($_POST)){
            $buffer = Render::view('admin_add.template.php');
            return $this->response->add($buffer);
        }else{

            if(empty($_POST['product_name']) or empty($_FILES['image_name']['name']) or empty($_POST['price']) or empty($_POST['description'])
            or empty($_POST['category_name']) or empty($_POST['attr_name']) or empty($_POST['attr_value'])) {
                Render::$error = 'Fill in all the fields';
            } else {
                $product = Service::getService('product');
                $product->product_name = (string)$_POST['product_name'];
                $product->image_name = (string)$_FILES['image_name']['name'];
                if(!empty($_FILES['image_name'])) {
                    Upload::upload('image_name', 'img');
                }
                $product->price = (string)$_POST['price'];
                $product->description = (string)$_POST['description'];
                $category_name = (string)$_POST['category_name'];
                $result = $product->getCategoryId($category_name);
                $product->category_id = (int)$result['category_id'];
                $product->saveNewProduct();

                $product->attribute_name = (string)$_POST['attr_name'];
                $product->value_parameters = (string)$_POST['attr_value'];
                $last_id = $product->getId($product->product_name);
                $product->product_id = (int)$last_id['product_id'];
                $product->addProductAttr();
            }

            $buffer = Render::view('admin_add.template.php');
            return $this->response->add($buffer);
        }
    }

    /**
     * this method update products in catalog
     */

    public function updateAction()
    {
        if(empty($_POST)){
            $buffer = Render::view('admin_update.template.php');
            return $this->response->add($buffer);
        } else {
            if(empty($_POST['product_name']) or empty($_POST['image_name']) or empty($_POST['price']) or empty($_POST['description'])){
                Render::$error = 'Fill in all the fields';
            } else {
                $product = Service::getService('product');
                $product->product_name = (string)$_POST['product_name'];
                $product->image_name = (string)$_POST['image_name'];
                $product->price = (string)$_POST['price'];
                $product->description = (string)$_POST['description'];
                $result = $product->getId((string)$_POST['product_name']);
                $id = (int)$result['product_id'];
                $product->saveNewProduct($id);
            }
            
                $buffer = Render::view('admin_update.template.php');
                return $this->response->add($buffer);
        }
    }

    /**
     * this method delete products from catalog
     */

    public function deleteAction()
    {
        if(empty($_POST)){
            $buffer = Render::view('admin_delete.template.php');
            return $this->response->add($buffer);
        } else {
            $product = Service::getService('product');
            $product->product_name = (string)$_POST['product_name'];
            $result = $product->getId((string)$_POST['product_name']);
            $id = (int)$result['product_id'];
            $product->deleteProduct($id);

            $buffer = Render::view('admin_delete.template.php');
            return $this->response->add($buffer);
        }
    }

    /**
     * this method add attribute to products
     */

    public function attrAction()
    {
        if(!empty($_POST['attr_name'] and $_POST['attr_value'])){
            $product = Service::getService('product');
            $product->attribute_name = (string)$_POST['attr_name'];
            $product->value_parameters = (string)$_POST['attr_value'];
            $product->product_name = (string)$_POST['prod_name'];
            $last_id = $product->getId($product->product_name);
            $product->product_id = (int)$last_id['product_id'];
            $product->addProductAttr();
        }
            $buffer = Render::view('admin_attr.template.php');
            return $this->response->add($buffer);

    }

    /**
     * this method create list orders for managers
     */

    public function ordersAction()
    {
        if (!is_file(BasketController::ORDERS_FILE)) {
            $buffer = Render::view('admin.show_orders.template.php');
            return $this->response->add($buffer);
        } else {
            $orders = file(BasketController::ORDERS_FILE);
            $all_orders = [];
            foreach ($orders as $arr) {
                list($order_number, $user_name, $email, $phone, $address, $date) = explode('|', trim($arr));
                $this->order->order_number = $order_number;
                $concrete_order['order_number'] = $order_number;
                $concrete_order['user_name'] = $user_name;
                $concrete_order['email'] = $email;
                $concrete_order['phone'] = $phone;
                $concrete_order['address'] = $address;
                $concrete_order['date'] = $date;
                $concrete_order['order_data'] = $this->order->getOrder();
                $all_orders[] = $concrete_order;

            }
            Render::bustArray($all_orders);
            $buffer = Render::view('admin.show_orders.template.php');
            return $this->response->add($buffer);
        }

    }

    /**
     * this method create new user in admin panel
     */

    public function createAction()
    {
        $security = new Security();
        if(empty($_POST)){
            $buffer = Render::view('admin_create.template.php');
            return $this->response->add($buffer);
        } else {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $hash = $security->hashPassword($password);
            $security->saveUser($login, $hash);

            $buffer = Render::view('admin_create.template.php');
            return $this->response->add($buffer, 202);
        }

    }

    /**
     * this method check user session and if user entered skip without re-entry
     */

    public function adminPanel()
    {
        Session::sessionStart();
        $session = Session::getSession();
        if($session['admin'] === true){
            $buffer = Render::view('admin_panel.template.php');
            return $this->response->add($buffer);
        } else {
            return $this->redirect->redirect('/login');

        }
    }

    /**
     * this method upload files on server
     */
    
    public function uploadAction()
    {
        if(empty($_FILES['user_file'])){
            $buffer = Render::view('admin_file.template.php');
            return $this->response->add($buffer);
        } else {
            Upload::upload('user_file', 'img');
            $buffer = Render::view('admin_file.template.php');
            return $this->response->add($buffer);
        }

    }
}