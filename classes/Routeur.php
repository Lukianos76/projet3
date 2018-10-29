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
                            ""                              => ["controller" => 'FrontEnd', 'method' => 'showHome' ,            'user' => '0'],
                            "accueil"                       => ["controller" => 'FrontEnd', 'method' => 'showHome',             'user' => '0'],
                            "chapitre"                      => ["controller" => 'FrontEnd', 'method' => 'showPost',             'user' => '0'],
                            "a-propos"                      => ["controller" => 'FrontEnd', 'method' => 'showAbout',            'user' => '0'],
                            "contact"                       => ["controller" => 'FrontEnd', 'method' => 'showContact',          'user' => '0'],
                            "404"                           => ["controller" => 'FrontEnd', 'method' => 'show404',              'user' => '0'],
                            "modifier-supprimer-chapitres"  => ["controller" => 'FrontEnd', 'method' => 'showAdminEditDel',     'user' => '0'],
                            "gerer-commentaires"            => ["controller" => 'FrontEnd', 'method' => 'showAdminComments',    'user' => '0'],
                            "administration"                => ["controller" => 'FrontEnd', 'method' => 'showAdmin',            'user' => '0'],
                            "roman"                         => ["controller" => 'FrontEnd', 'method' => 'showBook',             'user' => '0'],
                            "edit-post"                     => ["controller" => 'BackEnd', 'method'  => 'editPost',             'user' => '0'],
                            "ajouter-chapitre"              => ["controller" => 'BackEnd', 'method'  => 'addPost',              'user' => '0'],
                            "delete-post"                   => ["controller" => 'BackEnd', 'method'  => 'delPost',              'user' => '0'],
                            "add-comment"                   => ["controller" => 'BackEnd', 'method'  => 'addComment',           'user' => '0'],
                            "delete-comment"                => ["controller" => 'BackEnd', 'method'  => 'delComment',           'user' => '0'],
                            "report-comment"                => ["controller" => 'BackEnd', 'method'  => 'reportComment',        'user' => '0'],
                            "inscription"                   => ["controller" => 'BackEnd', 'method'  => 'addUser',              'user' => '0'],
                            "connexion"                     => ["controller" => 'BackEnd', 'method'  => 'login',                'user' => '0'],
                            "deconnexion"                   => ["controller" => 'BackEnd', 'method'  => 'disconnect',           'user' => '0'],
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