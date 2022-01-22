<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/details.css">
        <title>Details</title>
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
                        <a href="account.php">Nom</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="articles">
                    <a class="username">Username</a>
                    <a class="date">01/01/2022</a>
                    <div class="description">
                        <a>description</a>
                    </div>
                    <img src="" alt="">
                </div>
                <div class="divider"></div>
                <div class="comment">
                    <a class="username">Username</a>
                    <a class="date">01/01/2022</a>
                    <div>
                        <a>Commentaire</a>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
        </form>
    </body>
</html>

<?php
    include("logoutDB.php");
?>