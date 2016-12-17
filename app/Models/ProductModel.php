<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 08.10.2016
 * Time: 15:26
 */
namespace App\Models;

use App\BasketController;
use App\CatalogController;
use PolPav\Exception\ExceptionDB;
use PolPav\Models\AbstractModel;

class ProductModel extends AbstractModel
{
    /**
     * this property for pattern ActiveRecord
     */

    public $table_name = 'products';
    public $product_id;
    public $product_name;
    public $price;
    public $description;
    public $category_id;
    public $category_parent;
    public $level;
    public $image_id;
    public $image_name;
    public $product_attribute_id;
    public $attribute_name;
    public $attribute_id = NULL;
    public $attribute_value_id;
    public $value_text;
    public $value_parameters;

    /**
     * this method select data for orders
     * @param $id
     * @return array
     */

    public function getProductName($id){

        $id_order = implode(',', $id);
        $sql = "SELECT product_name, price
                FROM `products` WHERE product_id IN($id_order)";

        $this->dbo->query($sql);
        $result = $this->dbo->fetch('all');

        if (!$result) {
            echo $this->dbo->error();
        }

        return $result;
    }

    /**
     * this method select data for search
     * @param $name
     * @return array
     */

    public function getProductSearch($name)
    {
        $sql ="SELECT p.product_id, p.product_name, p.image_name, p.price, pa.attribute_name, av.value_parameters, p.description
                FROM `attribute_value` av, `products` p, `product_attribute` pa
                WHERE av.product_id = p.product_id
                AND av.product_attribute_id = pa.product_attribute_id
                AND p.product_name LIKE '%$name%'";
        $this->dbo->query($sql);
        $result = $this->dbo->fetch('all');

        if (!$result) {
            echo $this->dbo->error();
        }

        return $result;
    }

    /**
     * this method select data for catalog
     * @return array
     */

    public function getProducts()
    {
        $sql ="SELECT p.product_id, p.product_name, p.image_name, p.price, pa.attribute_name, av.value_parameters, p.description
                FROM `attribute_value` av, `products` p, `product_attribute` pa
                WHERE av.product_id = p.product_id
                AND av.product_attribute_id = pa.product_attribute_id";
        $this->dbo->query($sql);
        $result = $this->dbo->fetch('all');

        if (!$result) {
            echo $this->dbo->error();
        }
        return $result;
    }

    /**
     * this method select data for basket
     * @param $basket
     * @return array
     */

    public function getProductsToBasket($basket)
    {

        $id_basket = implode(',', $basket);
        
        $sql ="SELECT DISTINCT p.product_id, p.product_name, p.price, p.image_name, pa.attribute_name, av.value_parameters, p.description
                FROM `attribute_value` av, `products` p, `product_attribute` pa
                WHERE av.product_id = p.product_id
                AND av.product_attribute_id = pa.product_attribute_id
                AND p.product_id IN($id_basket)";
        
        $this->dbo->query($sql);
        $result = $this->dbo->fetch('all');

        if (!$result) {
            echo $this->dbo->error();
        }

        return $result;
    }

    /**
     * this method save data if no parameter came and update if parameter came
     * @param $id
     * @return bool
     */
    
    public function saveNewProduct($id = null)
    {

       $product_name = $this->dbo->escape($this->product_name);
       $description = $this->dbo->escape($this->description);
       $image_name = $this->dbo->escape($this->image_name);

        if($id == null){

            $sql = "INSERT INTO `products`(`product_id`, `product_name`,`category_id`, `description`,`image_name`, `price`) 
                    VALUES (NULL, '$product_name','$this->category_id','$description','$image_name','$this->price')";
            $result = $this->dbo->query($sql);

            if (!$result) {
                echo $this->dbo->error();
            }

        } else {
            $sql = "UPDATE `products` SET `product_name` = '$product_name', `price` = '$this->price', 
                                          `description` = '$description',
                                          `image_name` = '$image_name'
                                          WHERE `product_id` = $id";
            $result = $this->dbo->query($sql);

        if (!$result) {
                echo $this->dbo->error();
            }
        }
    }

    /**
     * this method save attribute name and attribute value
     * @return bool
     */

    public function addProductAttr()
    {
        $sql = "INSERT INTO `product_attribute`(`product_attribute_id`, `attribute_name`, `product_id`)
                    VALUES (NULL, '$this->attribute_name', '$this->product_id')";
        $result = $this->dbo->query($sql);

        if (!$result) {
            echo $this->dbo->error();
        }
        $sql = "INSERT INTO attribute_value(attribute_value_id, product_id, product_attribute_id, value_parameters)
                    VALUES (NULL, '$this->product_id', last_insert_id(), '$this->value_parameters')";
        $result = $this->dbo->query($sql);

        if (!$result) {
            echo $this->dbo->error();
        }
    }

    /**
     * this method select attribute concrete product
     * @param $id
     * @return array
     */

    public function getProductAttr($id)
    {
        $sql ="SELECT pa.attribute_name, av.value_parameters
                FROM `attribute_value` av, `product_attribute` pa 
                WHERE av.product_id = $id AND pa.product_id = $id AND pa.product_attribute_id = av.product_attribute_id";

        $this->dbo->query($sql);
        $result = $this->dbo->fetch('all');

        if (!$result) {
            echo $this->dbo->error();
        }

        return $result;
    }

    /**
     * this method select id by product name
     * @param $product_name
     * @return array
     */

    public function getId($product_name)
    {
        $sql = "SELECT product_id
                FROM `products` p
                WHERE p.product_name = '$product_name'";

        $this->dbo->query($sql);
        $result = $this->dbo->fetch('assoc');

        if (!$result) {
            echo $this->dbo->error();
        }

        return $result;
    }

    /**
     * this method select id by category name
     * @param $category_name
     * @return array
     */

    public function getCategoryId($category_name)
    {
        $sql = "SELECT category_id
                FROM `categories` c
                WHERE c.category_name = '$category_name'";

        $this->dbo->query($sql);
        $result = $this->dbo->fetch('assoc');

        if (!$result) {
            echo $this->dbo->error();
        }

        return $result;
    }

    /**
     * this method select product by category
     * @param $id
     * @return array
     */

    public function getProductToCategory($id)
    {
        $sql ="SELECT p.product_id, p.product_name, p.image_name, p.price, pa.attribute_name, av.value_parameters, p.description
                FROM `attribute_value` av, `products` p, `product_attribute` pa, `categories` c
                WHERE av.product_id = p.product_id
                AND av.product_attribute_id = pa.product_attribute_id
                AND c.category_id = p.category_id AND c.category_id = $id";
        $this->dbo->query($sql);
        $result = $this->dbo->fetch('all');

        if (!$result) {
            echo $this->dbo->error();
        }

        return $result;
    }

    /**
     * this method delete product
     * @param $id
     * @return bool
     */

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM `products` WHERE product_id = $id";
        $result = $this->dbo->query($sql);

        if (!$result) {
            return $this->dbo->error();
        }
        return $result;
    }
}

