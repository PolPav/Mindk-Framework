<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 22.09.2016
 * Time: 9:39
 */

namespace polpav\framework\response;


class ResponseRedirect extends Response
{
    public function __construct($link, $code = 302)
    {
        $this->code = $code;
        $this->setHeader('Location',$link);
    }

}