<?php
use Kernel\View\View;
use Kernel\View\ViewGenerator;

/**
 * @var $generator ViewGenerator
 */
$generator = $this->getGenerator();
/**
 * @var $view View
 */
$view = $this;
?>

<html>
    <head>
        <?php $view->includeScripts(['public/js/jquery.js', 'public/js/main.js']) ?>
    </head>
<body>
