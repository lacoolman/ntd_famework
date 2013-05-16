<?php

function __autoload($class_name)
{
    $path = str_replace('\\', '/', $class_name);

    if(file_exists($path . '.php')) {
        require_once $path . '.php';
    } else {
        echo 'Error.';
    }
}