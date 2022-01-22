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
                        <a href="login.php">
                            Deconnexion
                            <?php
                                session_destroy();
                            ?>
                        </a>
                        <a href="account.php">Compte</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="title">
                    <a>Créer un nouvel article</a>
                </div>
                <div class="margcont">
                    <textarea style="resize: none;"></textarea>
                    <div class="pub-opt">
                        <a href="">Ajouter une photo</a>
                        <button>Publier</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<?php



?>