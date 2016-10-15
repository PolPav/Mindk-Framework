<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 22.09.2016
 * Time: 9:40
 */

namespace PolPav\Response;


class ResponseJSON extends Response
{
    public $content_type = 'application/json';

    /**
     * ResponseJSON construct
     * @param $data,
     * @param $code
     * sets the value of the header and content if content-type application/json
     */
    public function __construct($data, $code = 200)
    {
        $this->setContent($data);
        $this->setHeader('Content-Type', $this->content_type);
    }

    /**
     * packs content in a format json
     * @param $data
     */
    public function setContent($data)
    {
        $this->content = json_encode($data);
    }

}