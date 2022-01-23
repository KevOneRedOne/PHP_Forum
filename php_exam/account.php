<?php
    include("loginDB.php");
    loginDB();
    error_reporting(0);
?>
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
                        <a href="account.php"><?php echo $user; ?></a>
                        <a href="admin.php">ADMIN</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="margcont">
                    <div class="account">
                        <a><?php echo $_SESSION['username']?></a>
                    </div>
                    <div class="inputgroup">
                        <a>Changer e-mail</a><br>
                        <?php 
                            $requeteMail = "SELECT MAIL, PASSWORD from users where USERNAME ='".$user."';";
                            $executerequete = mysqli_query($mysqli,$requeteMail);
                            $repExec = mysqli_fetch_array($executerequete);
                        ?>
                        <input type="email" placeholder="<?php echo $repExec['MAIL']?>" name="email" required>
                        <button type="submit">Changer</button>
                    </div>
                    <?php
                        $mail = mysqli_real_escape_string($mysqli, $_POST['email']);
                        $stmt = $mysqli ->prepare ("UPDATE `users` SET MAIL='".$mail."' WHERE USERNAME='".$user."';");
                        $stmt->execute();
                        
                    ?>  
                    <div class="inputgroup">
                        <a>Changer de mot de passe</a><br>
                        <input type="password" placeholder="Entrez un nouveau MDP" name="psw">
                        <button type="submit">Changer</button>
                        <p>(Entrer à nouveau votre mot de passe si vous ne souhaitez pas changer.)</p>
                    </div>
                    <div class="divider"></div>
                    <?php
                        $password = mysqli_real_escape_string($mysqli,$_POST['psw']);     
                        $stmt2 = $mysqli ->prepare ("UPDATE `users` SET PASSWORD=sha1('".$password."') WHERE USERNAME='".$user."';");
                        $stmt2->execute();
                    ?>
                    <div>
                        <div class="publication">
                            <a>Publications</a>
                        </div>
                        <?php
                            $requete = "SELECT ID from users WHERE USERNAME = '".$user."';";
                            $exec_req = mysqli_query($mysqli,$requete);
                            $rep = mysqli_fetch_array($exec_req);
                            global $userID;
                            $userID = $rep['ID'];

                            $requete2 = "SELECT * FROM articles INNER JOIN users on users.ID = articles.ID_AUTHOR 
                            WHERE articles.ID_AUTHOR= '".$userID."';";
                            $exec_req2 = mysqli_query($mysqli,$requete2);
                        ?>   
                        <?php while($reponse = mysqli_fetch_array($exec_req2)){?>
                            <div class="articles">
                                <div class="left flex">
                                    <div class="username">
                                        <a>
                                            <?php
                                                $id_author = $reponse['ID_AUTHOR'];
                                                $request = "SELECT users.USERNAME FROM `articles`INNER JOIN `users` ON users.ID = articles.ID_AUTHOR
                                                WHERE articles.ID_AUTHOR = '".$id_author."';"; 
                                                $exec = mysqli_query($mysqli,$request);
                                                $rep2 = mysqli_fetch_array($exec);
                                                echo $rep2['USERNAME'];
                                            ?>
                                        </a>
                                    </div>
                                    <div class="date">
                                        <p><?php echo $reponse['DATE_CREATION']?></p>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div id="rigth">
                                    <div class="info">
                                        <div id="titre">
                                            <p class="titre"><b>Sujet : </b><?php echo $reponse['TITLE']?></p>
                                        </div>
                                        <div class="divider"></div>
                                        <br>
                                        <div id="description">
                                            <p class="titre"><b>Description : </b><?php echo $reponse['DESCRIPTION']?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php 
                            } //close while loop
                        ?>
                        <div class="divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
