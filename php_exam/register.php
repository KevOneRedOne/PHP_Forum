<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');


?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/register.css">
        <title>Register</title>
    </head>
    <body>
        <div class="Forum">
            <a>Forum</a>
        </div>
        <div class="container">
            <div class="margcont">
                <h1>Créer un compte</h1>
                <div class="input">
                    <a>Nom d'utilisateur</a>
                    <input type="text" placeholder="nom d'utilisateur">
                </div>
                <div class="input">
                    <a>Adresse e-mail</a>
                    <input type="text" placeholder="e-mail">
                </div>
                <div class="input">
                    <a>Mot de passe</a>
                    <input type="password" placeholder="mot de passe">
                    <a class="condition">Le mot de passe doit contenir au moins 6 caractères, une majuscule, une minuscule et un caractère spécial.</a>
                </div>
                <div class="input">
                    <a>Confirmer le mot de passe</a><br>
                    <input type="password" placeholder="Confirmer le mot de passe">
                </div>
                <button type="submit">Créer mon compte</button>
                <a>Vous possédez déjà un compte ? </a><a href="login.php" class="link">Connexion</a>
            </div>
        </div>
    </body>
</html>