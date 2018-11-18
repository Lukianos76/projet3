<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= ASSETS?>img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading text-center">
                    <h1><?= $post->getTitle() ?></h1>
                    <span class="meta">Posté le <?= $post->getCreationDate() ?></span>
                </div>

            </div>
        </div>
    </div>
</header>

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?= $post->getContent() ?>
            </div>

        </div>
        <?php if (isset($_SESSION['id']) && $_SESSION['administrator'] == 1) :?>
        <ul class="col nav edit-nav justify-content-end">
            <li class="nav-item">
                 <a class="nav-link" href="<?= HOST?>supprimer-chapitre/id/<?= $post->getId()?>"><i class="fas fa-trash-alt"></i></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= HOST?>modifier-chapitre/id/<?= $post->getId()?>"><i class="fas fa-pencil-alt"></i></a>
            </li>
        </ul>
        <?php endif ?>
    </div>
</article>

<hr>

<div class="container" id="commentsBlock">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h3>Poster un commentaire :</h3>
            <?php if (isset($_SESSION['id'])) :?>
                <form action="<?= HOST;?>ajouter-commentaire/id/<?= $post->getId()?>" method="post">
                    <div class="form-group">
                        <textarea class="form-control" id="commentTextarea" name="values[comment]" rows="8"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Poster le commentaire</button>
            </form>
            <?php else :?>
                <form action="<?= HOST;?>connexion/id/<?= $post->getId()?>" method="post">
                    <div class="form-group">
                        <label for="pseudoInput">Pseudo :</label>
                        <input class="form-control" id="pseudoInput" placeholder="Votre pseudo" type="text" name="values[pseudo]" value="">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Mot de passe :</label>
                        <input class="form-control" id="passwordInput" placeholder="Mot de passe" type="password" name="values[password]" value="">
                    <?= isset($errorMessage) ? "<p class=\"alert alert-danger\" role=\"alert\">".$errorMessage."</p>" : "" ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </form>
            <?php endif ?>
            <hr>

            <h2>Commentaires :</h2>
            <hr>
            <?php if (isset($comments)) :?>
                <?php foreach ($comments as $comment):?>
                <div class="comment">
                    <p><?= htmlspecialchars($comment->getComment()) ?></p>
                    <div class="row post-preview">
                        <p class="col-9 post-meta">Posté par <?= htmlspecialchars($comment->getAuthor()) ?> le <?= $comment->getCommentDate() ?></p>
                        <ul class="col-3 nav edit-nav justify-content-end">
                        <?php if (((isset($_SESSION['id'])) && $_SESSION['pseudo'] === $comment->getAuthor()) || (isset($_SESSION['id']) && $_SESSION['administrator'] == 1)) :?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= HOST?>supprimer-commentaire/id/<?= $post->getId()?>/commentid/<?= $comment->getId()?>"><i class="fas fa-trash-alt"></i></span></a>
                            </li>
                        <?php endif ?>
                        <?php if (isset($_SESSION['id'])) :?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= HOST?>report-commentaire/id/<?= $post->getId()?>/commentid/<?= $comment->getId()?>"><i class="fas fa-exclamation-triangle"></i></span></a>
                            </li>
                        <?php endif ?>
                        </ul>
                    </div>
                    <hr>
                </div>
                <?php endforeach;?>
            <?php else : ?>
                <p>Aucun commentaire</p>
            <?php endif ?>
        </div>
    </div>
</div>
