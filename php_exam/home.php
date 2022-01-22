
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/home.css">
        <title>Home</title>
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
                <?php
                    
                    
                    echo 
                    '<div class="articles">
                        <a href="details.php"
                            <a class="username"></a>
                            <a class="date">t</a>
                            <a class="titre">t</a>
                            <a class="description">t</a>
                        </a>
                    </div>'
                ?>
                <div class="articles">
                    <a href="details.php">
                        <a class="username">
                            <?php
                            ?>
                        </a>
                        <a class="date">01/01/2022</a>
                        <div class="description">
                            <a>description</a>
                        </div>
                    </a>
                </div>
                <div class="divider"></div>
            </div>
        </form>
    </body>
</html>

<?php
    include("logoutDB.php");
    include("loginDB.php");
    loginDB();

?>