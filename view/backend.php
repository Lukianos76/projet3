<?php if(!isset($_SESSION['id'])) :
    session_start();
endif ?>

<header class="masthead" style="background-image: url('<?= ASSETS?>img/login-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Panneau d'administration</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container back-end">
    <div class="row">
        <div class="col-4"></div>
        <a class="col-4 text-center btn btn-primary" href="<?= HOST?>ajouter-chapitre"></i>Ajouter un chapitre</a>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <a class="col-4 text-center btn btn-primary" href="#"></i>Modifier/Supprimer un chapitre</a>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <a class="col-4 text-center btn btn-primary" href="#"></i>Gérer les commentaire</a>
    </div>

    </div>
</div>
