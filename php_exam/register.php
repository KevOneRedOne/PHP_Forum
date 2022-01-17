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
            <form action="/php_exam/login.php" method="POST">
                <div class="username">
                    <label for="username"> Pseudo : </label>
                    <input type="text" placeholder="Entrez un Pseudo" name="user_name" required>
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
                    <a href="/php_exam/login.php" class="cancelbtn">Annuler</a>
                </div>
            </form>
        </div>
    </div> 
</body>
</html>

<?php
    include ("assets/php/loginDB.php");
    loginDB();
    // error_reporting(0);

    if (!isset($_POST['user_name'], $_POST['psw'], $_POST['email'])) {
        // Could not get the data that should have been sent.
        exit('Please complete the registration form!');
    }
    if (empty($_POST['user_name']) || empty($_POST['psw']) || empty($_POST['email'])) {
        // One or more values are empty.
        exit('Please complete the registration form');
    }

    $checkuser = mysqli_query($mysqli, "SELECT * FROM `users` WHERE USERNAME= '".$_POST['user_name']."'");
    if (mysqli_num_rows($checkuser)){
        exit("Ce nom d'utilisateur existe déjà");
    } else {
        $NewUser = $mysqli->query("INSERT INTO `users`(ID, USERNAME, PASSWORD, MAIL) VALUES('','".$_POST['user_name']."','".$_POST['psw']."','".$_POST['email']."')");
    }

?>