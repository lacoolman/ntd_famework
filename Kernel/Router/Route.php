<?php
namespace Kernel\Router;


class Route
{
    protected $pattern;
    protected $controller;
    protected $action;
    protected $name;
    protected $params = [];

    public function getPatterns()
    {
        return $this->pattern;
    }

    public function addPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    public function setController($path)
    {
        $this->controller = $path;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParam($name)
    {

    }

    public function fillParams($pattern)
    {
        $arr = explode('/', $pattern);
        array_splice($arr, 0 , 1);

        for($i = 0; $i < count($arr); $i++) {
            if(array_key_exists($arr[$i], $this->params)) {
                $this->params[$arr[$i]] = $arr[$i+1];
            }
        }
    }

    public function getParams()
    {
        return $this->params;
    }

    public function checkPattern($pattern)
    {
        $patternize = preg_replace('/:val/', '.*', $this->pattern);
        $patternize = str_replace('/', '\/', $patternize);

        if(preg_match('/^' . $patternize . '$/', $pattern)) {
            return true;
        }

        return false;
    }

    public function setParams($params = [])
    {
        $this->params = $params;
    }

    public function addParam($param, $value)
    {

    }

    public function generateParams($pattern)
    {
        $patternize = preg_replace('/:val/', '.*', $this->pattern);

        $patternize = str_replace('/', '\/', $patternize);

        if(preg_match('/' . $patternize . '/', $pattern)) {
            $pieces = explode('/', $pattern);
            array_splice($pieces, 0, 1);
            if(count($pieces) > 1) {
                foreach($pieces as $piece) {
                    if($piece != ':val') {
                        $this->params[$piece] = '';
                    }
                }
            }
        }
    }
}