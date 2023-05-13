<?php

namespace Engine;

use Engine\Core\Router\DispatchedRouter;
use Engine\Helper\Common;

class Cms
{
    private $di;

    public $router;

    /**
     * cms constructor
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * Run cms
     */
    public function run()
    {
        try {

            require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/Route.php';

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());

            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRouter('ErrorController:page404');
            }

            [$class, $action] = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\' . ENV . '\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);

//        print_r($routerDispatch);
        } catch (\Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

}