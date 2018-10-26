<?php if(!isset($_SESSION['id'])) :
    session_start();
endif ?>

<header class="masthead" style="background-image: url('<?= ASSETS?>img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Modifier un post</h1>
                </div>
            </div>
        </div>
    </div>
</header>



<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form class="text-center" action="<?= HOST;?>edit-post" method="post">
                <?php if($post->getId()):?>
                    <input type="hidden" name="values[id]" value="<?= $post->getId() ?>">
                <?php endif; ?>
                <div class="form-group">
                    <label for="titleInput">Titre</label>
                    <input class="form-control" id="titleInput" type="text" name="values[title]" value="<?= $post->getTitle() ?>">
                </div>
                <div class="form-group">
                    <label for="contentTextarea">Contenu</label>
                    <textarea  class="form-control" id="contentTextarea" name="values[content]" rows="25"><?= $post->getContent() ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#contentTextarea'
    });
</script>

