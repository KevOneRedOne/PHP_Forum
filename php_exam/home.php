
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
                            if($_SESSION['username'] !== ""){
                                $user = $_SESSION['username'];
                                echo "<a>Bonjour $user, vous êtes connecté</a>";
                            }
                        ?>    
                        
                        <a href="new.php">+</a>
                        <a href="login.php">Deconnexion</a>
                        <a href="account.php">Compte</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="articles">
                    <a href="details.php">
                        <a class="username">Username</a>
                        <a class="date">01/01/2022</a>
                        <div class="description">
                            <a>description</a>
                        </div>
                        <img src="" alt="">
                    </a>
                </div>
                <div class="divider"></div>
            </div>
        </form>
    </body>
</html>