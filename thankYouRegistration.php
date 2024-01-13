<?php
    include "./AdditionalPHP/startSession.php";
    
    if(isset($_COOKIE['thankYouCookie'])){
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
        <title>VINYLMASTER | KÖSZÖNJÜK</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS Fájlok-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONOK-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animált CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <?php $page = 'thankYouRegistration';?>

        <!--Start Navigációs Sáv-->
        <?php include './Includes/MobileNavBar.php';;?>
        <!--End Navigációs Sáv-->


        <!--Start Navigációs Sáv @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigációs Sáv @media 1200px-->


        <div class="mail-sent-group">
            <div class="mail-sent-container">
                <div class="mail-sent-image-container">
                    <div class="mail-sent-image"></div>
                </div>

                <div class="mail-sent-text">
                    <h1>Köszönjük, hogy csatlakoztál!</h1>
                    <span class="message">Egy megerősítő e-mail lett küldve a címedre. Nézd meg a bejövő elektronikus leveleidet és erősítsd meg a regisztrációd.</span>
                    <br><br>
                    <span class="tip">Tipp: Ha nem kaptad meg a levelet, akkor nézd meg, hogy nincs-e a Spam vagy Levélszemét mappában.</span>
                </div>
            </div>
        </div>
    </body>
</html>