<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 18.08.2016
 * Time: 15:19
 */

namespace App;

use PolPav\DI\Service;
use PolPav\View\Render;

class IndexController
{
    /**
     * this method fills index view
     */
    
    public function indexAction()
    {
        Render::$hello = 'Hello Guest';
        $buffer = Render::view('index.template.php');
        $response = Service::getService('response');
        return $response->add($buffer);
    }
}