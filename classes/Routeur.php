<?php

/**
 *  Class Routeur
 *
 * create routes and find controller
 */

class Routeur
{
    private $request;

    private $routes =   [
                            ""                      => ["controller" => 'FrontEnd', 'method' => 'showHome'],
                            "home"                  => ["controller" => 'FrontEnd', 'method' => 'showHome'],
                            "contact"               => ["controller" => 'FrontEnd', 'method' => 'showContact'],
                            "post"                  => ["controller" => 'FrontEnd', 'method' => 'showPost'],
                            "edit-post"             => ["controller" => 'BackEnd', 'method'  => 'editPost'],
                            "add-post"              => ["controller" => 'BackEnd', 'method'  => 'addPost'],
                            "delete-post"           => ["controller" => 'BackEnd', 'method'  => 'delPost'],
                            "register"              => ["controller" => 'BackEnd', 'method'  => 'addUser'],
                            "login"                 => ["controller" => 'BackEnd', 'method'  => 'login'],
                            "disconnect"            => ["controller" => 'BackEnd', 'method'  => 'disconnect'],
                        ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRoute()
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams()
    {
        $params = null;

        //EXTRACT GET PARAMS
        $elements = explode('/', $this->request);
        unset($elements[0]);

        for($i = 1; $i<count($elements); $i++)
        {
            $params[$elements[$i]] = $elements[$i+1];
            $i++;
        }

        //EXTRACT POST PARAMS
        if($_POST)
        {
            foreach ($_POST as $key => $val)
            {
                $params[$key] = $val;
            }
        }

        return $params;
    }

    public function renderController()
    {
        $route  = $this->getRoute();
        $params = $this->getParams();

        if(key_exists($route, $this->routes))
        {
            $controller = $this->routes[$route]['controller'];
            $method     = $this->routes[$route]['method'];


            $currentController = new $controller;
            $currentController->$method($params);
        } else {
            echo '404';
        }

    }
}