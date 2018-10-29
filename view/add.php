<?php if(!isset($_SESSION['id'])) :
    session_start();
endif ?>

<header class="masthead" style="background-image: url('<?= ASSETS?>img/login-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Ajouter un chapitre</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form class="text-center" action="<?= HOST;?>ajouter-chapitre" method="post">
                <div class="form-group">
                    <label for="titleInput">Titre</label>
                    <input class="form-control" id="titleInput" type="text" name="values[title]" value="">
                </div>
                <div class="form-group">
                    <label for="contentTextarea">Contenu</label>
                    <textarea  class="form-control" id="contentTextarea" name="values[content]" rows="25"></textarea>
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
