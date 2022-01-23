<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/account.css">
        <title>Account</title>
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
                                global $user;
                                $user = $_SESSION['username'];
                                echo "<a>Bonjour $user, vous êtes connectés</a>";
                            }
                            include("logoutDB.php");
                        ?>  
                        <a href="new.php">+</a>
                        <a href="login.php" onclick="logOut();">Déconnexion</a>
                        <a href="account.php">$user</a>
                        <a href="admin.php">ADMIN</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="margcont">
                    <div class="account">
                        <a>$_SESSION['username']</a>
                    </div>
                    <div class="inputgroup">
                        <a>Changer d'addresse e-mail</a><br>
                            

                        <input type="email" placeholder="email" name="email">
                        <button type="submit" name="email">Changer</button>
                    </div>
                    <div class="inputgroup">
                        <a>Changer de mot de passe</a><br>
                        <input type="password" placeholder="mot de passe" name="psw">
                        <button type="submit" name="email">Changer</button>
                    </div>
                    <div>
                        <div class="publication">
                            <a>Publications</a>
                        </div>
                        <div class="articles">
                            <a href="details.php">

                        <?php
                        // include("loginDB.php");
                        // loginDB();
                        // $idPost = $_GET['id'];
                        // $requete = "SELECT * FROM users.USERNAME WHERE ='".$user."'";
                        // $exec = mysqli_query($mysqli,$requete);
                        // $rep = mysqli_fetch_array($exec);


                        
                        // $stmt = $mysqli->prepare("UPDATE INTO users(MAIL) VALUES ('$email')");
                        ?>

                            <p><?php echo $rep1['USERNAME'];?></p>
                            <a class="date">01/01/2022</a>
                            <div class="description">
                                <a>description</a>
                            </div>
                            <img src="" alt="">
                            </a>
                            <div class="divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

<?php

?>