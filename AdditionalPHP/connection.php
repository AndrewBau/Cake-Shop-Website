<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "vinylmasterdb";
    $conn = mysqli_connect($host, $username, $pass, $dbname);
    if(!$conn){
        die("Probléma a kapcsolat kiépítésével: " . mysqli_connect_error());
    }
?>