<!DOCTYPE html>
<html lang="'fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?= ASSETS ?>css/clean-blog.min.css" rel="stylesheet">

    <title>Billet simple pour l'Alaska</title>
    <link rel="stylesheet" href="<?= ASSETS ?>css/style.css">
</head>
<body>

    <div id="scrollUp">
        <a href="#top"><i class="fas fa-arrow-up"></i></a>
    </div>

    <div id="top"></div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="<?= HOST?>accueil">Jean Forteroche</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOST?>accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOST?>a-propos">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOST?>roman">Le Roman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOST?>contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <?= isset($_SESSION['id']) ? "" : '
                        <li class="nav-item">
                            <a class="nav-link" href="'.HOST.'inscription">S\'inscrire</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" href="'.HOST.'connexion">Se connecter</a>
                        </li>
                    ';?>
                    <?php if (isset($_SESSION['id'])) :?>
                         <li class="nav-item">
                             <a class="nav-link disabled"
                                 <?php if (isset($_SESSION['id']) && $_SESSION['administrator'] == 1) :?>
                                    href="<?= HOST ?>administration">
                                 <?php else : ?>
                                    href="#">
                                 <?php endif ?>
                                 <?= $_SESSION['pseudo'] ?>
                             </a>
                         </li> 
                    <?php endif; ?>
                    <?= isset($_SESSION['id']) ? '
                         <li class="nav-item">
                             <a class="nav-link" href="'.HOST.'deconnexion"><i class="fas fa-sign-out-alt"></i></a>
                         </li>
                     ' : "";?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <?= $contentPage ?>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted"><a href="<?= HOST?>mentions-legales">Mentions Légales</a> </p>
                    <p class="copyright text-muted">Ce site est un site fictif, le contenu a été tiré du livre "Le Paradise" de Georges-André Quiniou disponible gratuitement <a href="http://ga.quiniou.pagesperso-orange.fr/">ici</a>.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap, jQuery, and Popper scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="<?= ASSETS?>js/clean-blog.min.js"></script>
    <script  src="<?= ASSETS?>js/scripts.js"></script>



</body>
</html>