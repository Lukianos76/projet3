<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= ASSETS?>img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Contactez Moi</h1>
                    <span class="subheading">Vous avez des questions ? J'ai les reponses !</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form id="contactForm" action="<?= HOST;?>contact" method="post" class="text-center">
                <div class="control-group">
                    <div class="form-group controls">
                        <label for="contactNom">Nom</label>
                        <input type="text" class="form-control" name="values[name]"  id="contactNom">
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group controls">
                        <label for="contactEmail">Adresse Email</label>
                        <input type="email" class="form-control" name="values[email]" id="contactEmail">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group controls">
                        <label for="contactMessage">Message</label>
                        <textarea class="form-control" id="contactMessage" name="values[message]" rows="10" ></textarea>
                    </div>
                </div>
                <?= isset($errorMessage) ? "<p class=\"alert alert-danger\" role=\"alert\">".$errorMessage."</p>" : "" ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                <?= isset($confirmMessage) ? "<p class=\"alert alert-success\" role=\"alert\">".$confirmMessage."</p>" : "" ?>
            </form>
        </div>
    </div>
</div>
