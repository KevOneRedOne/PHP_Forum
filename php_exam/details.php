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
                    <a href="home.php">Home</a>
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
                        <a href="account.php"><?php echo $user?></a>
                        <a href="admin.php">ADMIN</a>
                        
                    </div>
                </div>
            </div>
            <div class="container">
                <?php
                    include("loginDB.php");
                    loginDB();
                    $idPost = $_GET['id'];
                    //POST
                    $requete = "SELECT * FROM articles WHERE ID='".$idPost."'";
                    $exec = mysqli_query($mysqli,$requete);
                    $rep = mysqli_fetch_array($exec);
                    // Username
                    $requete2 = "SELECT users.USERNAME FROM articles INNER JOIN `users` ON users.ID = articles.ID_AUTHOR 
                    WHERE articles.ID='".$idPost."'";
                    $exec2 = mysqli_query($mysqli,$requete2);
                    $rep2 = mysqli_fetch_array($exec2);
                ?>
                <div class="articles">
                    <div id="username">
                        <p><?php echo $rep2['USERNAME'];?></p>
                    </div>
                    <div class="date">
                        <p>Date : </p>
                        <p><?php echo $rep['DATE_CREATION']?></p>
                    </div>
                    <div id="titre">
                        <p class="titre"><?php echo $rep['TITLE']?></p>
                    </div>
                    <div class="description">
                        <p class="description"><?php echo $rep['DESCRIPTION']?></a>
                    </div>
                    <div id="btn">
                        <?php
                            if($rep2['USERNAME'] == $user){
                                $href ="edit.php?id=";
                                $href.=$idPost;
                                $href .="&username=";
                                $href .=$rep2['USERNAME'];
                                echo "<a href='".$href."'>MODIFIER</a>";
                            }
                        ?>
                            <a href=""></a>
                    </div>
                </div>
                <div class="divider"></div>
            </div>
        </form>
    </body>
</html>

<?php
    include("logoutDB.php");
?>