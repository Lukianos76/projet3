<?php if(!isset($_SESSION['id'])) :
    session_start();
endif ?>
<h2><?= $post->getTitle() ?></h2>
<p>Posté le <?= $post->getCreationDate() ?></p>
<p><?= $post->getContent() ?></p>
<?php if (isset($_SESSION['id']) && $_SESSION['administrator'] == 1) :?>
    <a href="<?= HOST?>delete-post/id/<?= $post->getId()?>">Effacer</a>
    <a href="<?= HOST?>edit-post/id/<?= $post->getId()?>">Modifier</a>
<?php endif ?>


<h4>Poster un commentaire :</h4>

<?php if (isset($_SESSION['id'])) :?>
<form action="<?= HOST;?>add-comment/id/<?= $post->getId()?>" method="post">
    Commentaire : <textarea name="values[comment]"></textarea>
    <input type="submit" value="Poster le commentaire">
</form>
<?php else :?>
    <form action="<?= HOST;?>login/id/<?= $post->getId()?>" method="post">
        Pseudo : <input type="text" name="values[pseudo]" value=""><br>
        Mot de passe : <input type="password" name="values[password]" value=""><br>
        <p><?= isset($errorMessage) ? $errorMessage : "" ?></p>
        <input type="submit" value="Connexion"/>
    </form>
<?php endif ?>
<h4>Commentaires :</h4>
<?php if (isset($comments)) :?>
    <?php foreach ($comments as $comment):?>
        <p>Auteur : <?= $comment->getAuthor() ?></p>
        <p>Posté le <?= $comment->getCommentDate() ?></p>
        <p><?= $comment->getComment() ?></p>
        <?php if (((isset($_SESSION['id'])) && $_SESSION['pseudo'] === $comment->getAuthor()) || (isset($_SESSION['id']) && $_SESSION['administrator'] == 1)) :?>
            <a href="<?= HOST?>delete-comment/id/<?= $post->getId()?>/comment/<?= $comment->getId()?>">Effacer</a>
        <?php endif ?>
        <?php if (isset($_SESSION['id'])) :?>
            <a href="<?= HOST?>report-comment/id/<?= $post->getId()?>/comment/<?= $comment->getId()?>">Signaler</a>
        <?php endif ?>
    <?php endforeach;?>
<?php else : ?>
    <p>Aucun commentaire</p>
<?php endif ?>
