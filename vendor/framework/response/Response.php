<?php

/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 22.09.2016
 * Time: 9:32
 */

namespace polpav\framework\response;


class Response
{
    protected $headers = [];
    public $content = '';
    public $code;
    public $content_type = 'text/html';
    const STATUS_MSGS = [
        200 => 'Okay',
        201 => 'Ok a little:)',
        404 => 'Not Found',
        301 => 'Moved Permanently',
        302 => 'My redirect'
    ];
    public function __construct($data, $code = 200)
    {
        $this->code = $code;
        $this->setContent($data);
        $this->setHeader('Content-Type', $this->content_type);
        $request_header = apache_request_headers();
        if($request_header['Content-Type'] == 'application/json'){
             new ResponseJSON($data);
        }
    }
    /**
     * Send response
     */
    public function send(){
        $this->sendHeaders();
        $this->sendContent();
    }
    public function sendHeaders(){
        header("HTTP/1.1 ".$this->code." ".self::STATUS_MSGS[$this->code]);
        if(!empty($this->headers)){
            foreach($this->headers as $key=>$value){
                header(sprintf('%s: %s', $key, $value));
            }
        }
    }
    public function setHeader($header, $value){
        $this->headers[$header] = $value;
    }
    public function sendContent(){
        echo $this->content;
    }
    public function setContent($data){
        $this->content = $data;
    }

}