<?php if(!isset($_SESSION['id'])) :
    session_start();
endif ?>

    <header class="masthead" style="background-image: url('<?= ASSETS?>img/login-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Gérer les commentaires</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="text-center text-uppercase">Liste des commentaires</h2>
            <hr>
            <?php foreach ($comments as $comment):?>
                <div class="comment">
                    <p><?= htmlspecialchars($comment->getComment()) ?></p>
                    <div class="row post-preview">
                        <p class="col-9 post-meta">Posté par <?= htmlspecialchars($comment->getAuthor()) ?> le <?= $comment->getCommentDate() ?></p>
                        <ul class="col-3 nav edit-nav justify-content-end">
                            <?php if (((isset($_SESSION['id'])) && $_SESSION['pseudo'] === $comment->getAuthor()) || (isset($_SESSION['id']) && $_SESSION['administrator'] == 1)) :?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= HOST?>delete-comment/comment/<?= $comment->getId()?>"><i class="fas fa-trash-alt"></i></span></a>
                                </li>
                            <?php endif ?>
                            <li class="nav-item">
                                <a class="nav-link"><span class="badge badge-danger"><?=$comment->getReport();?></span></a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
