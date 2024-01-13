<?php

    include "connection.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $mail = $_POST['mail'];

        $sql = "SELECT isSubscribed FROM user WHERE email = '$mail'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);

            if($row['isSubscribed'] == 1)
            {
                echo "Már feliratkoztál!";
            }
            else
            {
                $sql = "UPDATE user SET isSubscribed = 1 WHERE email = '$mail'";

                if(mysqli_query($conn, $sql))
                {
                    echo "Köszönjük a feliratkozásod! Hamarosan keresni fogunk.";
                }
                else
                {
                    echo "Valami hiba történt. Kérlek próbáld meg újra később.";
                }
            }
        }
        else
        {
            echo "A Hírlevélre való feliratkozáshoz regisztrálnod kell.";
        }     
    }
         
?>