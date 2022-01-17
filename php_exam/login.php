<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Forum</title>
    <!-- <link rel="icon" href="/static/img/icon/forum.png"> -->
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar">
            <div id="forum_tittle">
                <a href="/php_exam/home.php">Forum</a>  
            </div>
        </nav>
    </header>
    <div class="connexion">
        <div class="L-Title flex padding">
            <h1>Connexion</h1>
        </div>
        <div class="loginForm padding flex">
            <form action="" method="POST">
                <div id="mail"> 
                    <br>
                    <label for="mail"> E-mail : </label>
                    <br>
                    <input type="email" id="mail" name="user_mail" required>
                </div>
                <div id="mdp">
                    <label for="password"> Mot de passe : </label>
                    <br>
                    <input type="password" id="password" name="user_password" required>
                </div>
                <div class="btnLogin flex">
                    <button class="LOGIN" type="submit">Connexion</button>
                </div>
            </form>
        </div>

        <div class="otherLogin padding flex">
            <div class="O-inscription">
                <p>Vous n'avez pas de compte ?</p>
                <p>Incrivez-vous ici</p>
                <br>
                <div class="flex">
                    <a class="REGISTER" href="/php_exam/register.php">Inscription</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    include("assets/php/loginDB.php");
    loginDB();
    $result = $mysqli->query("SELECT USERNAME, MAIL FROM users"); // On utilise l'instance créée pour faire une requête bidon
    $nb_users = mysqli_num_rows($result);
    while ($data = mysqli_fetch_array($result)){
        echo htmlentities(trim($data['USERNAME']));
        echo htmlentities(trim($data['MAIL']));
    } 
    
    
  
?>