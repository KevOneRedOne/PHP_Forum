<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/login.css">
        <title>Login</title>
    </head>
    <body>
        <div class="Forum">
            <a>Forum</a>
        </div>
        <form method="POST" action="">
            <div class="container">
                <div class="margcont">
                    <h1>S'identifier</h1>
                    <div id="mail">
                        <a>Adresse e-mail</a>
                        <input type="email" id="mail" name="user_mail" required>
                    </div>
                    <div id="mdp">
                        <a>Mot de passe</a>
                        <input type="password" id="password" name="user_password" required>
                    </div>
                    <div class="input-group">
                        <button class="login" type="submit">Connexion</button>
                    </div>
                    <div class="text">
                        <a>Pas encore membre ?</a>
                        <a class="register" href="register.php">Créer un compte</a>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

<?php
    include("assets/php/loginDB.php");
    loginDB();
?>