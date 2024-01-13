<?php
//<!--========== PHP KAPCSOLAT AZ ADATBÁZISHOZ ==========-->
    $host = "localhost";
    $username = "root";
    // $pass = "vinylmaster123";
    $pass = "";

    $dbname = "vinylmasterdb";
    //kapcsolat létrehozása
    $conn = mysqli_connect($host, $username, $pass, $dbname);
    //kapcsolat ellenőrzése
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>