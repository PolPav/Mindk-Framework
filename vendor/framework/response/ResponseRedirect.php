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
     * sends header from redirect as a service
     * @param $link,
     * @param $code
     * @return object
     */

    public function redirect($link, $code = 302)
    {
        $this->code = $code;
        $this->setHeader('Location', $link);
        return $this;
    }

}