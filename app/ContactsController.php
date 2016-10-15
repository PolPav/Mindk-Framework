<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 12:17
 */

namespace App;


class ContactsController extends AShopController
{
    public function __construct(){
        parent::__construct();
        echo "<h2>You in Contacts</h2>";
    }

    public function contactsMethod($param){
        echo "<h3>action: contactsMethod,<br> param: $param<br></h3>";
    }
}