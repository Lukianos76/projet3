<?php

class FrontEnd
{
    public function showHome($params)
    {
        $PostManager = new PostManager();
        $posts = $PostManager->findAll();


        $myView = new View('home');
        $myView->render(array('posts' => $posts));
    }

    public function showContact($params){
        $myView = new View('contact');
        $myView->render();
    }

    public function showPost($params)
    {

        extract($params);

        $postManager = new PostManager();
        $post = $postManager->find($id);

        $commentManager = new CommentManager();
        $comments = $commentManager->findAll($id);

        $myView = new View('post');
        $myView->render(array('post' => $post, 'comments' => $comments));
    }

}

