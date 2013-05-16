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

$generator->startForm(['method' => 'POST', 'action' => \Kernel\Core::getRouter()->generateUrl('index')]);
$generator->drawInput(['type' => 'text']);
$generator->drawInput(['type' => 'password']);
$generator->drawInput(['type' => 'submit']);
$generator->endForm();

$form = $generator->getForm();
$form->setFormMethod('POST');
$form->setFormAction(\Kernel\Core::getRouter()->generateUrl('login'));

$form->drawBegin();
$generator->drawInput(['type' => 'text', 'name' => 'hello']);
$generator->drawInput(['type' => 'submit']);
$form->drawEnd();
?>
