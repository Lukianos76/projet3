<h1>Connexion</h1>
<form action="<?= HOST;?>login" method="post">
    Pseudo : <input type="text" name="values[pseudo]" value=""><br>
    Mot de passe : <input type="password" name="values[password]" value=""><br>
    <p><?= isset($errorMessage) ? $errorMessage : "" ?></p>
    <input type="submit" value="Connexion"/>
</form>
