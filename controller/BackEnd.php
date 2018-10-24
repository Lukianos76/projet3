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

        $post = new Post();
        $myView = new View('add');
        $myView->render(array('post' => $post));
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

        $user = new User();
        $myView = new View('register');
        $myView->render(array('user' => $user));
    }

    public function login($params)
    {
        $errorMessage = NULL;

        if ($params !== NULL)
        {
            $values = $_POST['values'];

            $manager = new UserManager();


            $errorMessage = $manager->checkLogin($values);

            if($errorMessage !== NULL)
            {
                $myView = new View('login');
                $myView->render(array('errorMessage' => $errorMessage));
            }
            else
            {
                $manager->login($values);

                $myView = new View();
                $myView->redirect('home');
            }
        }

        $user = new User();
        $myView = new View('login');
        $myView->render(array('user' => $user));
    }

    public function disconnect($params)
    {
        session_start();
        session_destroy();

        $myView = new View();
        $myView->redirect('home');
    }
}