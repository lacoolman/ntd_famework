<?php
namespace Kernel\Reader;


class JsonReader implements ReaderInterface
{
    protected $path;

    public function __construct($path = "Settings/routing.ai")
    {
        $this->path = $path;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getSettingsArray()
    {
        $content = file_get_contents($this->path);

        $content = json_decode($content, true);

        return $content;
    }
}