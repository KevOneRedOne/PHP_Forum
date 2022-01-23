<?php
    error_reporting(0);
    include("loginDB.php");
    loginDB();
    global $urlid;
    $urlid = $_GET['id'];
    $user_post = $_GET['username'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/edit.css">
        <title>Edit</title>
    </head>
    <body>
        <form method="POST" action="">
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
                <div class="articles">
                    <div class="top flex">
                        <div id="user">
                            <a class="username"><?php echo $user_post; ?></a>
                        </div>
                        <div id="date">
                            <?php       
                                $requete2 = "SELECT * FROM articles WHERE articles.ID = '".$urlid."';";
                                $exec2 = mysqli_query($mysqli, $requete2);
                                while($rep = mysqli_fetch_array($exec2)){
                            ?>
                            <a class="date"><?php echo $rep['DATE_CREATION']?></a>
                        </div>
                    </div>
                    <br>
                    <a class="titre">Modifier le titre :</a>
                    <br>
                    <input class="titre" name='title' placeholder="<?php echo $rep['TITLE']?>" required></input>
                    <br>
                    <a class="titre">Modifier le texte :</a>
                    <br>
                    <textarea style="resize: none;" placeholder="<?php echo $rep['DESCRIPTION']?>" name="descrip"  required></textarea>
                    <div class="btn-cont">
                        <button class="save" type="submit" name="save" >Enregistrer</button>
                    </div>
                    <?php 
                        $titre = mysqli_real_escape_string($mysqli, $_POST['title']);
                        $description = mysqli_real_escape_string($mysqli, $_POST['descrip']);
                        $urlid = $_GET['id'];
                        $rq = "UPDATE articles SET TITLE = '".$titre."', DESCRIPTION = '".$description."' WHERE articles.ID= '".$urlid."';";
                        $stmt = $mysqli->prepare($rq);
                        $stmt->execute();
                        } ; //close while loop 
                    ?>
                </div>
            </div>
        </form>
    </body>
</html>
