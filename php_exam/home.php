
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
                    include("loginDB.php");
                    loginDB();

                    $requete = "SELECT * FROM articles";
                    $exec_req = mysqli_query($mysqli,$requete);
                ?>   
                <?php while($reponse = mysqli_fetch_array($exec_req)){?>
                    <div class="articles ">
                        <div class="left">
                            <div class="date">
                                <p>Date : </p>
                                <p><?php echo $reponse['DATE_CREATION']?></p>
                            </div>
                        </div>
                        <div id="rigth">
                            <div class="info ">
                                <div id="username">
                                    <a href="details.php">
                                        <?php
                                            $id_author = $reponse['ID_AUTHOR'];
                                            $request = "SELECT users.USERNAME FROM `articles`INNER JOIN `users` ON users.ID = articles.ID_AUTHOR
                                            WHERE articles.ID_AUTHOR = '".$id_author."';"; 
                                            $exec = mysqli_query($mysqli,$request);
                                            $rep = mysqli_fetch_array($exec);
                                            echo $rep['USERNAME'];
                                        ?>
                                    </a>
                                </div>
                                <div id="titre">
                                    <p class="titre"><?php echo $reponse['TITLE']?></p>
                                </div>
                            </div>
                            <div class="btn">
                                <button>Voir l'Article</button>
                            </div>
                        </div>
                    </div>
                <?php }
                // mysqli_close();
                ?>
                <div class="divider"></div>
            </div>
        </form>
    </body>
</html>

<?php
    include("logoutDB.php");
    
?>