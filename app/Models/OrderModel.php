<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 24.11.2016
 * Time: 11:14
 */

namespace App\Models;


use PolPav\Models\AbstractModel;

class OrderModel extends AbstractModel
{
    /**
     * this property for pattern ActiveRecord
     */
    
    public $order_id = NULL;
    public $order_number;
    public $manager_id = 1;
    public $user_name;
    public $product_name;
    public $price;
    public $quantity = 1;
    public $payment_option_id = 1;
    public $payment_status = 'Не оплачено';
    public $delivery_type = 'Новая Почта';
    public $delivery_address;
    public $date_time = '';
    public $delivery_status = 'Не доставлено';

    /**
     * this method select orders by unique order number  
     */

    public function getOrder()
    {
        $sql = "SELECT `order_number`, `product_name`, `price`, `quantity`
                FROM `orders`
                WHERE `order_number` = '$this->order_number'";

        $this->dbo->query($sql);
        $result = $this->dbo->fetch('all');

        if (!$result) {
            return $this->dbo->error();
        }
        return $result;
    }

    /**
     * this method save orders in table orders
     */

    public function saveOrder()
    {
        $sql = "INSERT INTO `orders`(`order_id`, `order_number`, `manager_id`, `user_name`,
                                    `product_name`, `price`, `quantity`, `paument_option_id`, `payment_status`, 
                                    `delivery_type`, `delivery_address`, `date_time`, `delivery_status`) 
                VALUES ('$this->order_id', '$this->order_number', '$this->manager_id',
                        '$this->user_name', '$this->product_name', '$this->price', '$this->quantity',
                         '$this->payment_option_id', '$this->payment_status', '$this->delivery_type',
                        '$this->delivery_address', '$this->date_time', '$this->delivery_status')";
      
        $result = $this->dbo->query($sql);

        if (!$result) {
            return $this->dbo->error();
        }
        return true;
    }
}