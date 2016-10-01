<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 22.09.2016
 * Time: 9:40
 */

namespace polpav\framework\response;


class ResponseJSON extends Response
{
    public $content_type = 'application/json';

    public function __construct($data, $code = 200)
    {
        $this->setContent($data);
        $this->setHeader('Content-Type', $this->content_type);
    }

    public function setContent($data)
    {
        $this->content = json_encode($data);
    }

}