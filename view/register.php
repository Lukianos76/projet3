<h1>Inscription</h1>
<form action="<?= HOST;?>register" method="post">
    Pseudo : <input type="text" name="values[pseudo]" value=""><br>
    Mot de passe : <input type="password" name="values[password]" value=""><br>
    Retapez votre mot de passe : <input type="password" name="values[password_check]" value=""><br>
    Adresse email : <input type="email" name="values[email]" value=""><br>
    <p><?= isset($errorMessage) ? $errorMessage : "" ?></p>
    <input type="submit" value="Valider"/>
</form>
