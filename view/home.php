<?php session_start();?>
<h1>Home</h1>

<?= isset($_SESSION['id']) ? "Bonjour ". $_SESSION['pseudo']  : "";?><br>


<?php if (isset($_SESSION['id']) && $_SESSION['administrator'] == 1) :?>
    <a href="<?= HOST ?>add-post">Ajouter un post</a>
<?php endif ?>
<?= isset($_SESSION['id']) ? "" : '<a href="'.HOST.'register">S\'inscrire</a>';?>
<?= isset($_SESSION['id']) ? "" : '<a href="'.HOST.'login">Se connecter</a>';?>
<?= isset($_SESSION['id']) ? '<a href="'.HOST.'disconnect">Se deconnecter</a>' : "";?>

<?php foreach ($posts as $post):?>
    <h3><?= $post->getTitle() ?></h3>
    <p>Posté le <?= $post->getCreationDate() ?></p>
    <p><?= substr($post->getContent(), 0, 300) ?></p>
    <a href="<?= HOST?>post/id/<?= $post->getId()?>">Lire la suite</a>
    <?php if (isset($_SESSION['id']) && $_SESSION['administrator'] == 1) :?>
        <a href="<?= HOST?>delete-post/id/<?= $post->getId()?>">Effacer</a>
        <a href="<?= HOST?>edit-post/id/<?= $post->getId()?>">Modifier</a>
    <?php endif ?>
<?php endforeach; ?>


