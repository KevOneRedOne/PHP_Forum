<?php
    $mysqli = new mysqli("localhost", "root", "", "php_exam_db");
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/paneladmin.css">
        <title>PannelAdmin</title>
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
                                echo "<a>Bonjour ".$user.", vous êtes connectés</a>";
                            }
                            include("logoutDB.php");
                            ?>    
                        <a href="new.php">+</a>
                        <a href="login.php" onclick="logOut();">Déconnexion</a>
                        <a href="account.php"><?php echo $user; ?></a>
                    </div>
                </div>
            </div>
            

            <div class="container">

                <h1>Utilisateurs</h1>
                <div class="usertable">
                    <?php
                        $req_user = "SELECT ID,USERNAME, MAIL FROM users;";
                        $exec = mysqli_query($mysqli,$req_user);
                        $rep_user = mysqli_fetch_array($exec);

                        $user_id = $rep_user['ID'];
                    ?>                    
                        <?php while($reponse = mysqli_fetch_array($exec)){ ?>
                        <a><?php echo $reponse['USERNAME'];?>| </a>
                        <a><?php echo $reponse['MAIL'];?></a>
                        <button type="submit"  onClick="refresh" name="delete_user">Ban</button>
                        <br>
                    <?php } ?>
                </div>

                <div class="divider"></div>
                <h1>Articles</h1>
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
                                <a>Date : </a>
                                <a><?php echo $reponse['DATE_CREATION']?></a>
                            </div>
                        </div>
                        <div id="rigth">
                            <div class="info ">
                                <div id="username">
                                    <a>
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
                               <?php
                                    $idpost = $reponse['ID'];
                                    $href ="details.php?id=";
                                    $href.=$idpost;
                                    echo "<a href='".$href."'>Voir Plus</a>";
                                ?>
                            </div>
                            <div class="delete">

                                <button type="submit" onClick="refresh" name="delete">Supprimer</button>
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
    if(isset($_POST['delete'])) {
        $stmt = $mysqli->prepare("DELETE FROM Articles WHERE id = $idpost;");
        $stmt->execute();
    }

    if(isset($_POST['delete_user'])) {
        $stmt = $mysqli->prepare("DELETE FROM Users WHERE id = $user_id;");
        $stmt->execute();
    }
?>