<?php session_start(); ?>
<h3><?= $post->getTitle() ?></h3>
<p>Posté le <?= $post->getCreationDate() ?></p>
<p><?= $post->getContent() ?></p>
<?php if (isset($_SESSION['id']) && $_SESSION['administrator'] == 1) :?>
    <a href="<?= HOST?>delete-post/id/<?= $post->getId()?>">Effacer</a>
    <a href="<?= HOST?>edit-post/id/<?= $post->getId()?>">Modifier</a>
<?php endif ?>

<h2>Commentaires</h2>

<?php foreach ($comments as $comment):?>
    <p>Auteur : <?= $comment->getAuthor() ?></p>
    <p>Posté le <?= $comment->getCommentDate() ?></p>
    <p><?= $comment->getComment() ?></p>
<?php endforeach;?>