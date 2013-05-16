<?php
namespace Kernel\View;


use Helper\HttpHelper;

class Form
{
    protected $self;

    protected $action;
    protected $method;

    public function __construct()
    {
        $this->self = '<form';
        $this->action = '*';
        $this->method = HttpHelper::REQUEST_GET;
    }

    public function drawBegin()
    {
        echo '<form action = "' . $this->action . '" method = "' . $this->method . '">';
    }

    public function drawEnd()
    {
        echo '<form/>';
    }

    public function setFormAction($action = "*")
    {
        $this->action = $action;
    }

    public function setFormMethod($method = HttpHelper::REQUEST_GET)
    {
        $this->method = $method;
    }

}