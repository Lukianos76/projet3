<h1>Home</h1>
<a href="<?= HOST ?>add-post">Ajouter un post</a>

<?php foreach ($posts as $post):?>
    <h3><?= $post->getTitle() ?></h3>
    <p>Posté le <?= $post->getCreationDate() ?></p>
    <p><?= $post->getContent() ?></p>
    <a href="<?= HOST?>delete-post/id/<?= $post->getId()?>">Effacer</a>
    <a href="<?= HOST?>edit-post/id/<?= $post->getId()?>">Modifier</a>

<?php endforeach; ?>


