<?php
namespace Controller;

use Kernel\Controller\Controller as BaseController;
use Kernel\Core;

class IndexController extends BaseController
{
    public function indexAction()
    {
        echo 'Index page';

        var_dump($_REQUEST);

        $this->render('View/index.php', ['name' => 'andrew']);
    }

    public function printAction($params)
    {
        $name = $params['name'];

        $uri = $this->generateUrl('print', ['name' => 'Oleg']);
    }

    public function loginAction()
    {
        $params = Core::getRequest();

        echo $params->getParam('hello');


    }

}