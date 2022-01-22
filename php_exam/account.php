<!DOCTYPE html>
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
                        <a href="login.php">
                            Deconnexion
                            <?php
                                session_destroy();
                            ?>
                        </a>
                        <a href="account.php">Nom</a>
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