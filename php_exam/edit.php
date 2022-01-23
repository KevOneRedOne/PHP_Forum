<?php
    $mysqli = new mysqli("localhost", "root", "", "php_exam_db");
    global $urlid;
    $urlid = $_GET['id'];
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
                <div class="articles">
                    <a class="username"><?php echo $username; ?></a>
                    <?php       
                        $requete2 = "SELECT TITLE, DATE_CREATION, DESCRIPTION FROM articles WHERE ID = '".$urlid."';";
                        $exec2 = mysqli_query($mysqli, $requete2);
                        while($rep = mysqli_fetch_array($exec2)){
                    ?>
                    <a class="date"><?php echo $rep['DATE_CREATION']?></a>
                    <input class="titre" id="titre" name='titre' placeholder="<?php echo $rep['TITLE']?>"></input>
                    <textarea style="resize: none;" placeholder="<?php echo $rep['DESCRIPTION']?>" name="description" id ="description"></textarea>
                    <?php }; //close while loop ?>
                    <div class="btn-cont">
                        <button class="save" type="submit" name="save" >Enregistrer</button>
                    </div>
                </div>
            </div>
            <?php
                
                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $urlid = $_GET['id'];

                $stmt = $mysqli->prepare("UPDATE Articles SET TITLE = '".$titre."', DESCRIPTION = '".$description."',  WHERE ID='".$urlid."';");
                echo $urlid;
                echo $titre;
                echo $description;
                $stmt->execute();
            ?>
        </form>
    </body>
</html>
