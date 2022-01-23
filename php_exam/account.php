<?php 
include("assets/php/loginDB.php");
loginDB();
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $userinfo = $requser->fetch();
}
?> 

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
                        <a href="account.php">Compte</a>
                        <a href="admin.php">ADMIN</a>
                        
                    </div>
                </div>
            </div>

            <div id="forum_tittle">
                <a href="/php_exam/home.php">Forum</a>  
            </div>
        </nav>
    </header>

    <div class="account">
        <div class="L-Title flex padding">
            <h2>Votre compte</h2>
        <div align="center">
            <h1>profil de <?php echo $userinfo['USERNAME']; ?></h1>
            <br />
            <h1>mail :<?php echo $userinfo['MAIL']; ?></h1>
            <br />
            <a href="modprofil.php">modifier mon profil</a>
            <br />
            <a href="login.php">Deconnexion</a>
 

<?php
    include("logoutDB.php");
?>
