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

    public function showPost($params)
    {

        extract($params);

        $postManager = new PostManager();
        $post = $postManager->find($id);

        $postCheck = $post->getTitle();
        if(isset($postCheck))
        {
            $commentManager = new CommentManager();
            $comments = $commentManager->findAll($id);

            $myView = new View('post');
            $myView->render(array('post' => $post, 'comments' => $comments));
        }
        else
        {
            $myView = new View();
            $myView->redirect('404');
        }



    }

    public function showAbout($params)
    {
        $myView = new View('about');
        $myView->render();
    }

    public function showContact($params)
    {
        $myView = new View('contact');
        $myView->render();
    }

    public function show404($params)
    {
        $myView = new View('404');
        $myView->render();
    }

    public function showAdmin($params)
    {
        $myView = new View('backend');
        $myView->render();
    }

}

