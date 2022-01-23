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


