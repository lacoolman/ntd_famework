<?php
namespace Kernel\Logger;


interface LoggerInterface
{
    public function logError();

    public function logAction();
}