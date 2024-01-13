<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>VINYLMASTER | KÉSZÍTS SAJÁT BAKELITET</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Atish.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXIKONOK-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animált CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <?php $page = 'makeyourcake';?>

        <!--Start Navigációs Sáv-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigációs Sáv-->


        <!--Start Navigációs Sáv @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigációs Sáv @media 1200px-->

        
        <!--Start Wave Image-->
        <div class="wave-image-group">
            <div class="wave-image footer-wave">
                <img src="Assets/images/1.index/NavBar_WavePink.png">
            </div>
        </div>
        <!--End Wave Image-->


        <!--Start Footer-->
        <footer class="footer-group">

            <div class="footer">

                <div class="logo">
                    <span class="logo-name">VINYLMASTER</span>
                </div>
            
                <div class="social-media">
                    <span class="facebook">
                        <a href=#><i class="fab fa-facebook-square"></i></a>
                    </span>
                    <span class="twitter">
                        <a href=#><i class="fab fa-twitter-square"></i></a>
                    </span>
                    <span class="instagram">
                        <a href=#><i class="fab fa-instagram-square"></i></a>
                    </span>
                    <span class="pinterest">
                        <a href=#><i class="fab fa-pinterest-square"></i></a>
                    </span>
                </div>

                <hr size="2px" width="80%" color="white">
                <hr size="2px" width="80%" color="white">

                <div class="contact-links">
                    <span class="phone"><i class="fas fa-phone-square-alt"></i> +36 36 1234 XXXX</span>
                    <span class="address">Eger, Eszterházy tér 1, 3300 Magyarország</span>
                </div>

                <div class="legal-links">
                    <span class="privacy-policy"><b><a href=#>ADATKEZELÉSI TÁJÉKOZTATÓ</a></b></span>
                    <span class="term-of-use"><b><a href=#>FELHASZNÁLÓI FELTÉTELEK</a></b></span>
                </div>

                <div class="copyright">
                    <span class="copyright-text">&#169; 2024 Design by András & Erik & Levente & Tamás</span>
                </div>

            </div>  

        </footer>
        <!--End Footer-->

        
        <!-- Start Alsó Nav -->
        <div class="bottom-nav-group">
            <nav class="bottom-nav">
                <a href="login.html" class="bottom-nav-link">
                    <i class="fas fa-user bottom-nav-icon" ></i>
                    <span class="bottom-nav-text">Fiók</span>
                </a>
                <a href="#" class="bottom-nav-link">
                    <i class="fas fa-search"></i>
                    <span class="bottom-nav-text">Keresés</span>
                </a>
                <a href="#" class="bottom-nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="bottom-nav-text">Kosaram</span>
                </a> 
            </nav>
        </div>
        <!-- End Alsó Nav -->
    </body>
</html>