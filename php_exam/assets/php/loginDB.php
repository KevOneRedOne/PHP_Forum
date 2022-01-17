<?php
function loginDB(){
        global $database, $mysqli;
        $database = "php_exam_db";
        $mysqli = new mysqli("localhost", "root", "", $database); // Connexion à la db "php_exam"

        if ($mysqli -> connect_errno){
            echo "Failed to connect to MySQL : ".$mysqli -> connect_errno;
            exit();
        }
    }
?>