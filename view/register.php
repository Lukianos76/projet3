<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= ASSETS?>img/login-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Inscription</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form class="text-center" action="<?= HOST;?>inscription" method="post">
                <div class="form-group">
                    <label for="pseudoInput">Pseudo</label>
                    <input class="form-control" id="pseudoInput" type="text" name="values[pseudo]" value="">
                </div>
                <div class="form-group">
                    <label for="passwordInput">Mot de passe</label>
                    <input class="form-control" id="passwordInput" type="password" name="values[password]" value="">
                </div>
                <div class="form-group">
                    <label for="passwordCheckInput">Retapez votre mot de passe</label>
                    <input class="form-control" id="passwordCheckInput" type="password" name="values[password_check]" value="">
                </div>
                <div class="form-group">
                    <label for="emailInput">Adresse email</label>
                    <input class="form-control" id="emailInput" type="text" name="values[email]" value="">
                </div>
                <p><?= isset($errorMessage) ? "<p class=\"alert alert-danger\" role=\"alert\">".$errorMessage."</p>" : "" ?></p>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>


