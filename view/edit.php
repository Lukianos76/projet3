<h1>Modifier un post</h1>
<form action="<?= HOST;?>edit-post" method="post">
    <?php if($post->getId()):?>
        <input type="hidden" name="values[id]" value="<?= $post->getId() ?>">
    <?php endif; ?>

    Titre : <input type="text" name="values[title]" value="<?= $post->getTitle() ?>"><br>
    Contenu : <textarea name="values[content]"><?= $post->getContent() ?></textarea><br>
    <input type="submit" value="Modifier"/>
</form>
