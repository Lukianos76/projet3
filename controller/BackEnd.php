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
}