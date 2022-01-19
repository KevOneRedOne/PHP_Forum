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

    <div class="registration">
        <div class="L-Title flex padding">
            <h1>Votre compte</h1>
        </div>
        <p class="obligation">votre compte</p>
        <br>
        <div class="RegisterForm flex padding">
            <form action="/php_exam/login.php" method="POST">
                <div class="username">
                    <label for="username"> Pseudo : </label>
                    <input type="text" placeholder="Entrez un Pseudo" name="user_name" required>
                </div>
                <div class="email">
                    <label for="email"> Email : </label>
                    <input type="email" placeholder="Entrez votre email" name="email" required>
                </div>
                <p class="obligation"></p>
                <br>
            </form>
        </div>
    </div> 
</body>
</html>


<!-- <?php 
$mysql_hostname = "localhost";
$mysql_user = "username";
$mysql_password = "password";
$mysql_database = "database";
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
?> -->
<?php
   include_once('DBconnect.php');

    $username = $_SSESSION['username'];
    $sql= "SELECT * FROM users WHERE username='".$username."'";
    $res = mysql_query($sql) or die(mysql_error());

  while ($row = mysql_fetch_assoc($res)){
      $username = $row['username'];
      $email = $row['email'];
      $topics .= "<tr><td>username:".$username." </td><td>First name:".$firstname."</td><td>Last name:".$lastname."</td><td>email: ".$email."</td><td>school: ".$school."</td></tr>";
  echo $topics;
  } ?>