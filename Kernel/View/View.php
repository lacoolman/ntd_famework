<?php
namespace Kernel\View;


class View
{
    public $params = [];

    protected static $__instance;

    public static function getInstance()
    {
        if(!isset(self::$__instance)) {
            self::$__instance = new View();
        }

        return self::$__instance;
    }

    public function render($path, $params)
    {
        $this->params = $params;

        include 'View/base/header.php';
        include $path;
        include 'View/base/footer.php';
    }

    public function includeScripts($scripts = [])
    {
        foreach($scripts as $script) {
            echo '<script language="javascript" type="text/javascript" src="' . $script . '" ></script>';
        }
    }

    public function getGenerator()
    {
        return ViewGenerator::getInstance();
    }

    public function getParam($name)
    {
        return $this->params[$name];
    }
}