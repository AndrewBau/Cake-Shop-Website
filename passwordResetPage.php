<?php
    include "./AdditionalPHP/startSession.php";
    
    if(isset($_COOKIE['resetPassword'])){
        define('Access', TRUE);
    }
    else {
        echo 'Access Denied!';
    }
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>VINYLMASTER | ELLENŐRIZZE EMAILJEIT!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <?php $page = 'thankyouregistration';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';;?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <div class="mail-sent-group">
            <div class="mail-sent-container">
                <div class="mail-sent-image-container">
                    <div class="mail-forget-image"></div>
                </div>

                <div class="mail-sent-text">
                    <h1>Ellenőrizze email fiókját!</h1>
                    <span class="message">Hurrá! Elküldtünk neked egy e-mailt az új jelszavaddal. Kérjük, változtasd meg a jelszavadat azonnal, amikor bejelentkezel."</span>
                    <br><br>
                    <span class="tip">Ha nem kaptad meg az e-mailt, kérjük, ellenőrizd a spam mappádat.</span>
                </div>
            </div>
        </div>
    </body>
</html>