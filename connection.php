<?php
//<!--========== PHP KAPCSOLAT AZ ADATBÁZISHOZ ==========-->
    $host = "localhost";
    $username = "root";
    // $pass = "malako123";
    $pass = "";

    $dbname = "cakeshop";
    //kapcsolat létrehozása
    $conn = mysqli_connect($host, $username, $pass, $dbname);
    //kapcsolat ellenőrzése
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>