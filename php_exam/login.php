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
                        <a>Nom d'Utilisateur</a>
                        <input type="username" id="username" name="username" required>
                    </div>
                    <div id="mdp">
                        <a>Mot de passe</a>
                        <input type="password" id="password" name="user_password" required>
                    </div>
                    <div class="input-group">
                        <button class="login" type="submit">Connexion</button>
                        <?php
                            if(isset($_GET['erreur'])){
                                $err = $_GET['erreur'];
                                if($err==1 || $err==2){
                                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                                }
                            }
                        ?>
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
    session_start();

    if (isset($_POST['username']) && isset($_POST['user_password'])){
        // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'php_exam_db';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
            or die('could not connect to database');

        $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
        $password = mysqli_real_escape_string($db,htmlspecialchars(sha1($_POST['user_password'])));
        
        if($username !== "" && $userpwd !== ""){
            $requete = "SELECT count(*) FROM `users` WHERE USERNAME='".$username."' AND PASSWORD='".$password."';";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if($count!=0) {
                $_SESSION['username'] = $username;
                header('Location: home.php');
            } else {
                header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        } else {
            header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
        }
        mysqli_close($db); // fermer la connexion
    }
?>