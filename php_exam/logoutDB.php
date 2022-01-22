<?php
    function logOut(){
        $database = "php_exam_db";
        $host="localhost"; $login ="root"; $password ="";

        $connexion = new mysqli($host, $login, $password, $database);

        $connexion->close();
        header("Location : login.php");
    }
    // session_destroy();
?>
