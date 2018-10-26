<?php

class BackEnd
{

    public function editPost($params)
    {
        extract($params);

        $manager = new PostManager();

        if(!empty($_POST))
        {
            $manager->update($params['values']);
            $myView = new View();
            $myView->redirect('home');
        }
        else
        {
            $post = $manager->find($id);
        }

        $myView = new View('edit');
        $myView->render(array('post' => $post));


    }

    public function addPost($params)
    {
        if($params !== NULL)
        {
            $values = $_POST['values'];

            $manager = new PostManager();
            $manager->create($values);

            $myView = new View();
            $myView->redirect('home');

        }

        $myView = new View('add');
        $myView->render();
    }

    public function delPost($params)
    {
        extract($params);
        $manager = new PostManager();
        $manager->delete($id);

        $myView = new View();
        $myView->redirect('home');
    }

    public function addUser($params)
    {
        $errorMessage = NULL;

        if ($params !== NULL)
        {
            $values = $_POST['values'];

            $manager = new UserManager();

            $errorMessage = $manager->checkRegister($values);

            if($errorMessage !== NULL)
            {
                $myView = new View('register');
                $myView->render(array('errorMessage' => $errorMessage));
            }
            else
            {
                $manager->create($values);

                $myView = new View();
                $myView->redirect('home');
            }
        }

        $myView = new View('register');
        $myView->render();
    }

    public function addComment($params)
    {
        if(!isset($_SESSION['id'])) :
            session_start();
        endif;
        extract($params);

        if($params !== NULL)
        {
            $values = $_POST['values'];

            $manager = new CommentManager();
            $manager->create($values, $id);

            $myView = new View();
            $myView->redirect('post/id/'.$id);
        }
    }

    public function delComment($params)
    {
        extract($params);
        $manager = new CommentManager();
        $manager->delete($comment);

        $myView = new View();
        $myView->redirect('post/id/'.$id);;

    }

    public function reportComment($params)
    {
        extract($params);

        $manager = new CommentManager();
        $manager->report($comment);

        $myView = new View();
        $myView->redirect('post/id/'.$id);;
    }

    public function login($params)
    {
        $errorMessage = NULL;

        if ($params !== NULL)
        {
            $values = $_POST['values'];

            $manager = new UserManager();

            extract($params);

            $errorMessage = $manager->checkLogin($values);

            if($errorMessage !== NULL)
            {
                if(isset($id)){

                    $postManager = new PostManager();
                    $post = $postManager->find($id);

                    $commentManager = new CommentManager();
                    $comments = $commentManager->findAll($id);

                    $myView = new View('home');
                    $myView->render(array('post' => $post, 'comments' => $comments, 'errorMessage' => $errorMessage));
                }
                else
                {
                    $myView = new View('login');
                    $myView->render(array('errorMessage' => $errorMessage));
                }
            }
            else
            {
                $manager->login($values);

                if(isset($id)){
                    $myView = new View();
                    $myView->redirect('chapitre/id/'.$id);;
                }
                else
                {
                    $myView = new View();
                    $myView->redirect('accueil');
                }
            }
        }


        $myView = new View('login');
        $myView->render();
    }

    public function disconnect($params)
    {
        if(!isset($_SESSION['id'])) :
            session_start();
        endif;
        session_destroy();

        $myView = new View();
        $myView->redirect('accueil');
    }
}