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
                                echo "<a>Bonjour $user, vous êtes connectés</a>";
                            }
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
                        <input type="titre" id="titre" name="titre" required>
                    </div>
                    <textarea id style="resize: none;"></textarea>
                    <div class="pub-opt">
                        <button type=submit>Publier</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<?php
    include("logoutDB.php");


?>