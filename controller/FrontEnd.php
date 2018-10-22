<?php

class FrontEnd
{
    public function showHome($params)
    {
        $manager = new PostManager();
        $posts = $manager->findAll();

        $myView = new View('home');
        $myView->render(array('posts' => $posts));
    }

    public function showContact($params){
        $myView = new View('contact');
        $myView->render();
    }
}

