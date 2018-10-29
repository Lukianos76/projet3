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
            <form name="sentMessage" id="contactForm" class="text-center">
                <div class="control-group">
                    <div class="form-group controls">
                        <label>Nom</label>
                        <input type="text" class="form-control" placeholder="Nom" id="name">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group controls">
                        <label>Adresse Email</label>
                        <input type="email" class="form-control" placeholder="Adresse Email" id="email">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 controls">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" placeholder="Téléphone" id="phone" >
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group controls">
                        <label>Message</label>
                        <textarea rows="5" class="form-control" placeholder="Message" id="message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>