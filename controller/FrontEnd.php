<?php

class FrontEnd
{
    public function showHome($params)
    {
        $PostManager = new PostManager();
        $posts = $PostManager->findHome();


        $myView = new View('home');
        $myView->render(array('posts' => $posts));
    }

    public function showBook($params)
    {
        $PostManager = new PostManager();
        $posts = $PostManager->findAll();


        $myView = new View('book');
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

    public function showLegals($params)
    {
    $myView = new View('legals');
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

    public function showAdminEditDel(){
        $PostManager = new PostManager();
        $posts = $PostManager->findAll();


        $myView = new View('backend-edit-del');
        $myView->render(array('posts' => $posts));
    }

    public function showAdminComments(){
        $PostManager = new PostManager();
        $posts = $PostManager->findHome();

        $CommentManager = new CommentManager();
        $comments = $CommentManager->findAllComments();


        $myView = new View('backend-comments');
        $myView->render(array('posts' => $posts, 'comments' => $comments));
    }

}

