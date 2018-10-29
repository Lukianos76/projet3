<?php if(!isset($_SESSION['id'])) :
    session_start();
endif ?>

<header class="masthead" style="background-image: url('<?= ASSETS?>img/login-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Modifier/Supprimer un chapitre</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="text-center text-uppercase">Liste des chapitres</h2>
            <hr>
            <?php foreach ($posts as $post):?>
                <div class="post-preview">
                    <a href="<?= HOST?>chapitre/id/<?= $post->getId()?>">
                        <h2 class="post-title text-center">
                            <?= $post->getTitle() ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= $post->getContentResume(); ?>
                        </h3>
                    </a>
                    <div class="post-preview row">
                        <p class="col post-meta">Posté le <?= $post->getCreationDate() ?></p>
                        <?php if (isset($_SESSION['id']) && $_SESSION['administrator'] == 1) :?>
                            <ul class="col nav edit-nav justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= HOST?>delete-post/id/<?= $post->getId()?>"><i class="fas fa-trash-alt"></i></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= HOST?>edit-post/id/<?= $post->getId()?>"><i class="fas fa-pencil-alt"></i></a>
                                </li>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
        </div>
    </div>
</div>