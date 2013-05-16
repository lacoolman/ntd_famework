<?php
namespace Kernel\Controller;


use Kernel\Core;

class Controller
{
    protected function render($path, $params = [])
    {
        Core::getView()->render($path, $params);
    }

    protected function generateUrl($name, $params = [])
    {
        return Core::getRouter()->generateUrl($name, $params);
    }
}