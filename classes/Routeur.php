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
                            "accueil"               => ["controller" => 'FrontEnd', 'method' => 'showHome'],
                            "chapitre"              => ["controller" => 'FrontEnd', 'method' => 'showPost'],
                            "a-propos"              => ["controller" => 'FrontEnd', 'method' => 'showAbout'],
                            "contact"               => ["controller" => 'FrontEnd', 'method' => 'showContact'],
                            "404"                   => ["controller" => 'FrontEnd', 'method' => 'show404'],
                            "administration"        => ["controller" => 'FrontEnd', 'method' => 'showAdmin'],
                            "edit-post"             => ["controller" => 'BackEnd', 'method'  => 'editPost'],
                            "ajouter-chapitre"      => ["controller" => 'BackEnd', 'method'  => 'addPost'],
                            "delete-post"           => ["controller" => 'BackEnd', 'method'  => 'delPost'],
                            "add-comment"           => ["controller" => 'BackEnd', 'method'  => 'addComment'],
                            "delete-comment"        => ["controller" => 'BackEnd', 'method'  => 'delComment'],
                            "report-comment"        => ["controller" => 'BackEnd', 'method'  => 'reportComment'],
                            "inscription"           => ["controller" => 'BackEnd', 'method'  => 'addUser'],
                            "connexion"             => ["controller" => 'BackEnd', 'method'  => 'login'],
                            "deconnexion"           => ["controller" => 'BackEnd', 'method'  => 'disconnect'],
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
            $myView = new View();
            $myView->redirect('404');;
        }

    }
}