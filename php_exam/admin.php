<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/admin.css">
        <title>Admin</title>
    </head>
    <body>
        <div class="Forum">
            <a>Administration</a>
        </div>
        <form method="POST" action="">
            <div class="container">
                <div class="margcont">
                    <h1>Connexion ADMIN</h1>
                    <div id="mail">
                        <a>Adresse mail</a>
                        <input type="email" id="email" name="admin_mail" required>
                    </div>
                    <div id="mdp">
                        <a>Mot de passe</a>
                        <input type="password" id="password" name="admin_password" required>
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
                </div>
            </div>
        </form>
    </body>
</html>
<?php
    session_start();

    if (isset($_POST['admin_mail']) && isset($_POST['admin_password'])){
        // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'php_exam_db';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
            or die('could not connect to database');

        $admin_mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['admin_mail'])); 
        $password = mysqli_real_escape_string($db,htmlspecialchars(sha1($_POST['admin_password'])));
        
        if($admin_mail !== "" && $password !== ""){
            $requete = "SELECT count(*) FROM `admin` WHERE ADMIN_MAIL='".$admin_mail."' AND ADMIN_PWD='".$password."';";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if($count!=0) {
                $_SESSION['admin_mail'] = $admin_mail;
                header('Location: paneladmin.php');
            } else {
                header('Location: admin.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        } else {
            header('Location: admin.php?erreur=2'); // utilisateur ou mot de passe vide
        }
        mysqli_close($db); // fermer la connexion
    }
?>