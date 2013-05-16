<?php
namespace Kernel\Http;


class Request
{
    protected $params = [];

    public function __construct()
    {
        $this->params['POST'] = $_POST;
        $this->params['GET'] = $_GET;
        $this->params['SERVER'] = $_SERVER;
        $this->params['SESSION'] = isset($_SESSION) ?: null;
        $this->params['COOKIE'] = $_COOKIE;
    }

    protected $tmpParams = [];
    public function getParam($name)
    {
        if(count($this->tmpParams) > 0) {
            if(isset($this->tmpParams[$name])) {
                return $this->tmpParams[$name];
            }
        }

        $this->tmpParams = [];
        foreach($this->params as $param=>$value)
        {
            if(is_array($value)) {
               $this->tmpParams = array_merge($this->tmpParams, $value);
            }
        }

        return isset($this->tmpParams[$name]) ? $this->tmpParams[$name] : null;
    }
}