<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 04.11.2016
 * Time: 8:51
 */

namespace PolPav\Exception;
use PolPav\View\Render;
use PolPav\Response\Response;


class ExceptionLogin extends \Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message);
        Render::$error = $message;
        $buffer = Render::view('admin_error.template.php');
        $response = new Response();
        return $response->add($buffer);
    }
}