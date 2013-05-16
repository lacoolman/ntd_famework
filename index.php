<?php
ini_set('display_errors', 1);

require_once 'Helper/autoload.php';

$core = new \Kernel\Core();
$core->proceed();

$core->getRouter()->generateUrl('print', ['name' => 'Vasia']);

var_dump($core->getSettings()->getParam(\Helper\SettingsHelper::DB)[\Helper\SettingsHelper::DB_TYPE]);