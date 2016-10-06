<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 22.09.2016
 * Time: 9:39
 */

namespace PolPav\Response;


class ResponseRedirect extends Response
{
    /**
     * ResponseRedirect construct
     * sends header from redirect
     * @param $link,
     * @param $code
     */
    public function __construct($link, $code = 302)
    {
        $this->code = $code;
        $this->setHeader('Location',$link);
    }

}