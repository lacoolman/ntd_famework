<?php
namespace Kernel\Settings;


use Kernel\Core;
use Kernel\Reader\ReaderInterface;

class Settings
{
    protected $settings= [];
    protected $reader;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function getSettings()
    {
        $this->settings = $this->reader->getSettingsArray();

        var_dump($this->settings);
    }

    public function getParam($name)
    {
        if(count($this->settings) > 0) {
            if(isset($this->settings[$name])) {
                return $this->settings[$name];
            }
        }

        $this->settings = $this->reader->getSettingsArray();

        return isset($this->settings[$name]) ? $this->settings[$name] : null;
    }

}