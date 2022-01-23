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
<<<<<<< HEAD
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Forum</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar">
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
            <a href="deco.php">Deconnexion</a>
            
</body>
</html>


=======
<html>
    <head>
        <link rel="stylesheet" href="assets/css/account.css">
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
                        <a href="admin.php">ADMIN</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="margcont">
                    <div class="account">
                        <a>Username</a>
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
                                <a class="username">Username</a>
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
    include("logoutDB.php");
?>
>>>>>>> e604d5e7145e8634f386dfbdac51ba3f040881f2
