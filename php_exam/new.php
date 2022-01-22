<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/new.css">
        <title>New</title>
    </head>
    <body>
        <form action="" method="POST">
            <div class="navbar">
                <div class="nav-cont">
                    <a href="home.php">Forum</a>
                    <div class="nav-r">
                        <?php
                            session_start();
                            if(!isset($_SESSION["username"])){
                                header("Location: login.php");
                                exit(); 
                            }
                            elseif($_SESSION['username'] !== ""){
                                $user = $_SESSION['username'];
                                echo "<a>Bonjour ".$user.", vous êtes connectés</a>";
                            }
                            include("logoutDB.php");
                        ?>    
                        <a href="new.php">+</a>
                        <a href="login.php" onclick="logOut();">Déconnexion</a>
                        <a href="account.php">Compte</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="title">
                    <a>Créer un nouvel article</a>
                </div>
                <div class="margcont">
                    <div id="TitreduPost">
                        <a>Titre de l'Article : </a>
                        <input type="titre_post" id="titre_post" name="titre_post" required>
                    </div>
                    <div class="message">
                        <a> Description : </a>
                        <textarea id="description" name="description" style="resize: none;"></textarea>
                    </div>
                    <div class="date">
                        <br>
                        <a style="margin-top:1vh;"id="datepost" name="datepost">
                            <?php
                                $date = date("Y-m-d H:i:s");
                                echo "<p> $date </p>"; 
                            ?>  
                        </a>
                    </div>
                    <div class="pub-opt">
                        <button type=submit>Publier</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<?php
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'php_exam_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
        or die('could not connect to database');

    $title = mysqli_real_escape_string($db,$_POST['titre_post']);
    $description = mysqli_real_escape_string($db,$_POST['description']);

    if(!empty($_POST['titre_post']) AND !empty($_POST['description'])){
        $stmt = $db->prepare("INSERT INTO `articles` (`TITLE`, `DESCRIPTION`, `DATE_CREATION`, `ID_AUTHOR`) 
            VALUES ('$title', '$description', '$date', 
            (SELECT ID FROM `users` WHERE USERNAME = '$user'));");
        $stmt->execute();
    }
    mysqli_close($db); // fermer la connexion
?>