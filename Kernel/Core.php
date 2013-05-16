<?php
namespace Kernel;
use Helper\HttpHelper;
use Kernel\Http\Request;
use Kernel\Reader\JsonReader;
use Kernel\Router\Router;
use Kernel\Settings\Settings;
use Kernel\View\View;


class Core
{
    public function __construct()
    {
        self::getRouter()->generateRoutes();
    }

    public static function getRouter()
    {
        return Router::getInstance();
    }

    public static function getView()
    {
        return View::getInstance();
    }

    public static function getRequest()
    {
        return new Request();
    }

    public static function getSettingsReader($path = 'Settings/params.ai')
    {
        return new JsonReader($path);
    }

    public static function getSettings()
    {
        return new Settings(self::getSettingsReader());
    }

    public function proceed()
    {
        $uri = $_SERVER[HttpHelper::REQUEST_URI];
        $route = self::getRouter()->getRoute($uri);
        $route->fillParams($uri);

        $controller = $route->getController();
        $action = $route->getAction();

        $controller = new $controller();
        $params = $route->getParams();

        if(isset($params) AND count($params) > 0) {
            $controller->$action($params);
        } else {
            $controller->$action();
        }

    }
}