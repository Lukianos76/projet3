<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= ASSETS?>img/login-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Connexion</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form class="text-center" action="<?= HOST;?>connexion" method="post">
                <div class="form-group">
                    <label for="pseudoInput">Pseudo</label>
                    <input class="form-control" id="pseudoInput" type="text" name="values[pseudo]" value="">
                </div>
                <div class="form-group">
                    <label for="passwordInput">Mot de passe</label>
                    <input class="form-control" id="passwordInput" type="password" name="values[password]" value="">
                    <?= isset($errorMessage) ? "<p class=\"alert alert-danger\" role=\"alert\">".$errorMessage."</p>" : "" ?>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>