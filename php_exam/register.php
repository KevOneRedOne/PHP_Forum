<?php
    include("assets/php/loginDB.php");
    loginDB();

    if(isset($_POST['submit']))
    {
        // Récuperation des input
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']); // sha1 hache le mdp
        $password2 = sha1($_POST['password2']);

        if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if($password == $password2) {
                    $stmt = $mysqli->prepare("INSERT INTO users(USERNAME, MAIL, PASSWORD) VALUES ('$username', '$email', '$password')");
                    $stmt->execute();
                    header('Location: home.php');

                } else {
                    $error = "Les mots de passe ne correspondent pas.";
                }
            } else {
                $error = "Adresse e-mail non valide.";
            }
        } else {
            $error = "Tous les champs doivent être complétés.";
        }
    }

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
        <form method="POST" action="">
            <div class="container">
                <div class="margcont">
                    <h1>Créer un compte</h1>
                    <div class="input">
                        <a>Nom d'utilisateur</a>
                        <input type="text" placeholder="nom d'utilisateur" name="username" value="<?php if(isset($username)){ echo $username;} ?>">
                    </div>
                    <div class="input">
                        <a>Adresse e-mail</a>
                        <input type="text" placeholder="e-mail" name="email" value="<?php if(isset($email)){ echo $email;} ?>">
                    </div>
                    <div class="input">
                        <a>Mot de passe</a>
                        <input type="password" placeholder="mot de passe" name="password">
                        <a class="condition">Le mot de passe doit contenir au moins 6 caractères, une majuscule, une minuscule et un caractère spécial.</a>
                    </div>
                    <div class="input">
                        <a>Confirmer le mot de passe</a><br>
                        <input type="password" placeholder="Confirmer le mot de passe" name="password2">
                        <?php if(isset($error)) { echo $error; } ?>
                    </div>
                    <button type="submit" name="submit">Créer mon compte</button>
                    <a>Vous possédez déjà un compte ? </a><a href="login.php" class="link">Connexion</a>
                </div>
            </div>
        </form>
    </body>
</html>