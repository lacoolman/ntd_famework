<?php
namespace Kernel\Router;


use Kernel\Reader\JsonReader;
use Kernel\Reader\ReaderInterface;
use Kernel\Router\Route;

class Router implements RouterInterface
{

    protected $routes;
    /**
     * @var $reader ReaderInterface
     */
    protected $reader;

    private function __construct()
    {
        $this->setReader(new JsonReader());
    }

    public function setReader(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    protected static $__instance;

    public static function getInstance()
    {
        if(!isset(self::$__instance)) {
            self::$__instance = new Router();
        }

        return self::$__instance;
    }

    public function generateUrl($name, $params = [])
    {
        $route = $this->routes[$name];

        $pattern = $route->getPatterns();

        $oldParams = explode('/', $pattern);

        if(isset($params) AND count($params) > 0) {
            for($i = 0; $i < count($oldParams); $i++) {
                foreach($params as $new=>$value) {
                    if($oldParams[$i] == $new) {
                        $oldParams[$i + 1] = $value;
                    }
                }
            }
        } else {
            return $pattern;
        }

        $pattern = implode('/', $oldParams);

        return $pattern;
    }

    /**
     * @param $name
     * @return $route Route
     * @throws \Exception
     */
    public function getRoute($name)
    {
        $route = null;
        if(count($this->routes) == 0 OR !isset($this->routes)) $this->generateRoutes();
        if(!array_key_exists($name, $this->routes)) {
            foreach($this->routes as $r) {
                if($r->checkPattern($name)) {
                    $route = $r;
                    break;
                }
            }
        } else {
            $route = $this->routes[$name];
        }

        return $route;
    }

    public function getRoutes()
    {
        $this->generateRoutes();
    }

    public function generateRoutes()
    {
        $tmpRoutes = $this->reader->getSettingsArray();

        foreach($tmpRoutes as $key=>$value) {
            $route = new Route();
            $route->addPattern($value['pattern']);
            $route->setAction($value['action']);
            $route->setController($value['controller']);
            $route->setName($key);
            $route->generateParams($value['pattern']);

            $this->routes[$key] = $route;
        }

        return $this->routes;
    }
}