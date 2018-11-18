<?php

class BackEnd
{

    public function editPost($params)
    {
        extract($params);

        $manager = new PostManager();

        if (!empty($_POST)) {
            $manager->update($params['values']);
            $myView = new View();
            $myView->redirect('accueil');
        } else {
            $post = $manager->find($id);
        }

        $myView = new View('edit');
        $myView->render(array('post' => $post));


    }


    public function addPost($params)
    {
        if ($params !== NULL) {
            $values = $_POST['values'];

            $manager = new PostManager();
            $manager->create($values);

            $myView = new View();
            $myView->redirect('accueil');

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
        $myView->redirect('accueil');
    }

    public function addUser($params)
    {
        $errorMessage = NULL;

        if ($params !== NULL) {
            $values = $_POST['values'];

            $manager = new UserManager();

            $errorMessage = $manager->checkRegister($values);
            //VERIFICATION VALID EMAIL
            if (!preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $values['email'])) {
                $errorMessage = $errorMessage . "L'email n'est pas valide<br>";
            }

            //VERIFICATION VALID PSEUDO
            if (!preg_match(" /^[a-zA-Z0-9_]{3,16}$/ ", $values['pseudo'])) {
                $errorMessage = $errorMessage . "Le pseudo n'est pas valide<br>";
            }

            //VERIFICATION VALID PASSWORD
            if (!$values['password']) {
                $errorMessage = $errorMessage . "Le mot de passe n'est pas valide<br>";
            }

            //VERIFICATION IDENTIC PASSWORD
            if ($values['password'] !== $values['password_check']) {
                $errorMessage = $errorMessage . "Les deux mot de passe sont différents<br>";

            }

            if ($errorMessage !== NULL) {
                $myView = new View('register');
                $myView->render(array('errorMessage' => $errorMessage));
            } else {
                $manager->create($values);
                $manager->login($values);

                $myView = new View();
                $myView->redirect('accueil');
            }
        }

        $myView = new View('register');
        $myView->render();
    }

    public function addComment($params)
    {
        extract($params);

        if ($params !== NULL) {
            $values = $_POST['values'];

            $manager = new CommentManager();
            $manager->create($values, $id);

            $myView = new View();
            $myView->redirect('chapitre/id/' . $id . '#commentsBlock');
        }
    }

    public function delComment($params)
    {
        extract($params);

        $manager = new CommentManager();
        $comment = $manager->find($commentid);
        $author = $comment->getAuthor();

        if ((isset($_SESSION['id']) && $_SESSION['pseudo'] === $author) || (isset($_SESSION['id']) && $_SESSION['administrator'] === '1')) {
            $manager->delete($commentid);
        } else {
            $myView = new View();
            $myView->redirect('404');
        }

        if (isset($id)) {
            $myView = new View();
            $myView->redirect('chapitre/id/' . $id . '#commentsBlock');
        } elseif ($_SESSION['administrator'] === '1') {
            $myView = new View();
            $myView->redirect('gerer-commentaires');
        }


    }

    public function reportComment($params)
    {
        extract($params);
        $manager = new CommentManager();
        $isReport = $manager->checkReport($commentid);

        if ((isset($_SESSION['id'])) && (!$isReport)) {
            $manager->report($commentid);

            $myView = new View();
            $myView->redirect('chapitre/id/' . $id . '#commentsBlock');;
        } else {
            $myView = new View();
            $myView->redirect('404');
        }
    }

    public function login($params)
    {
        $errorMessage = NULL;

        if ($params !== NULL) {
            $values = $_POST['values'];

            $manager = new UserManager();

            extract($params);

            $errorMessage = $manager->checkLogin($values);

            if ($errorMessage !== NULL) {
                if (isset($id)) {

                    $postManager = new PostManager();
                    $post = $postManager->find($id);

                    $commentManager = new CommentManager();
                    $comments = $commentManager->findAll($id);

                    $myView = new View('post');
                    $myView->render(array('post' => $post, 'comments' => $comments, 'errorMessage' => $errorMessage));
                } else {
                    $myView = new View('login');
                    $myView->render(array('errorMessage' => $errorMessage));
                }
            } else {
                $manager->login($values);

                if (isset($id)) {
                    $myView = new View();
                    $myView->redirect('chapitre/id/' . $id . '#commentsBlock');
                } else {
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
        session_destroy();

        $myView = new View();
        $myView->redirect('accueil');
    }

    public function contact($params)
    {
        $errorMessage = NULL;
        $confirmMessage = NULL;

        if ($params !== NULL) {
            $values = $_POST['values'];
            if (!preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $values['email']) || empty($values['email'])) {
                $errorMessage = $errorMessage . "L'email n'est pas valide<br>";
            }
            if (empty($values['name'])) {
                $errorMessage = $errorMessage . "Le nom n'est pas valide<br>";
            }
            if (empty($values['message'])) {
                $errorMessage = $errorMessage . "Il faut un message<br>";
            }

            if ($errorMessage !== NULL) {
                $myView = new View('contact');
                $myView->render(array('errorMessage' => $errorMessage));
            } else {
                $emailTo = "lukianos76@gmail.com";
                $name = htmlspecialchars($values['name']);
                $message = htmlspecialchars($values['message']);
                $email = htmlspecialchars($values['email']);
                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
                {
                    $passage_ligne = "\r\n";
                }
                else
                {
                    $passage_ligne = "\n";
                }

                $header  = "From: \"Luke Maury\"<contact@luke-maury.com>".$passage_ligne;
                $header .= "Reply-to: \"Luke Maury\"<contact@luke-maury.com>".$passage_ligne;
                $header.= "MIME-Version: 1.0".$passage_ligne;
                mail($emailTo, "Un message de votre site", $message, $header);

                $confirmMessage = "Le message a bien été envoyé";
                $myView = new View('contact');
                $myView->render(array('errorMessage' => $errorMessage, 'confirmMessage' => $confirmMessage));
            }
        }

        $myView = new View('contact');
        $myView->render();
    }
}