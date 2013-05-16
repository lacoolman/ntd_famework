<?php
namespace Kernel\View;


class ViewGenerator
{
    protected static $__instance;

    public static function getInstance()
    {
        if(!isset(self::$__instance)) {
            self::$__instance = new ViewGenerator();
        }

        return self::$__instance;
    }

    public function drawInput($params = [])
    {
        $name = isset($params['name']) ? : $params['type'];
        $html = '<input';
        foreach($params as $param=>$value) {
            if($this->isHtmlParam($param)) {
                $html = $html . ' ' . $param . ' = "' . $value . '"';
            }
        }

        $html = $html . '/>';

        echo $html;

    }

    /**
     * @return Form
     */
    public function getForm()
    {
        $form = new Form();

        return $form;
    }

    protected $htmlParams = [
      'type',
      'name',
      'class',
      'id',
    ];

    public function isHtmlParam($param)
    {
        return true;
    }

    public function startForm($params = [])
    {
        echo '<form action = "' . $params['action'] . '" method = "' . $params['method'] . '" >';
    }

    public function endForm()
    {
        echo '</form>';
    }


}