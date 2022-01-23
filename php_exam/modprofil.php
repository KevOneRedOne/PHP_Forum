<?php 
include("assets/php/loginDB.php");
loginDB();
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
   $requser = SELECT;
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
            <h2>Modifier mon compte</h2>
            <form method="POST" action="">
                <input type="text" name="newusername" placeholder="username"> <br />
                <input type="text" name="newusemail" placeholder="email"> <br />
                <input type="text" name="newmdp" placeholder="mot de passe"> <br />
                <input type="text" name="newmdp0" placeholder="Confirmer le mot de passe"> <br />
                <input type="submit" value="confirmer les changements"
            </form>

?> 
