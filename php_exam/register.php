<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Forum</title>
    <link rel="stylesheet" href="assets/css/register.css">
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

    <div class="registration">
        <div class="L-Title flex padding">
            <h1>Inscription</h1>
        </div>
        <p class="obligation">Remplissez ce formulaire d'adhésion</p>
        <br>
        <div class="RegisterForm flex padding">
            <form  method="POST">
                <div class="username">
                    <label for="username"> Pseudo : </label>
                    <input type="text" placeholder="Entrez un Pseudo" name="username" required>
                </div>
                <div class="email">
                    <label for="email"> Email : </label>
                    <input type="email" placeholder="Entrez votre email" name="email" required>
                </div>
                <div class="password">
                    <label for="password"> Mot de Passe : </label>
                    <input type="password" placeholder="Entrez un mot de passe" name="psw" required>
                </div>
                <div class="psw-repeat">
                    <label for="psw-repeat"> Confirmez le Mot de Passe : </label>
                    <input type="password" placeholder="Réecrivez le mot de passe" name="psw_repeat" required>
                </div>
                <p class="obligation"></p>
                <br>
                <div class="clear flex">
                    <button type="submit" name="submit" class="signupbtn">Inscription</button>
                    <a href="" class="cancelbtn">Annuler</a>
                </div>
            </form>
        </div>
    </div> 
</body>
</html>

<?php
    include ("assets/php/loginDB.php");
    loginDB();

    if ($_POST['username'] != '' AND $_POST['psw'] != '' AND $_POST['email'] != '') {
        $NewUser = $mysqli->query("INSERT INTO USERS(ID,USERNAME,PASSWORD,MAIL)");
        $NewUser .= $mysqli->query("VALUES('','".$_POST['username']."','".$_POST['psw']."','".$_POST['email']."')");
    } else {
        echo "Erreur ! Veuillez remplir tous les champs !";
    }


?>