<?php
namespace Kernel\Router;


interface RouterInterface
{
    public function generateUrl($name);

    public function getRoute($name);
}