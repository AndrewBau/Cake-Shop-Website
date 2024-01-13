<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>VINYLMASTER | KEZDŐOLDAL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Atish.css">
        
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
       
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="Javascript/swapWaveImg.js"></script>
        
        <script src = "Javascript/countdown_sales.js"></script>
    </head>

    <body>
        <?php $page = 'index'?>

        <!--Start Navigációs Sáv-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigációs Sáv-->


        <!--Start Navigációs Sáv @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigációs Sáv @media 1200px-->


        <!--Start Wave Image-->
        <div class="wave-image-group-media1200">
            <div class="wave-image-flip-media1200">
                <img src="Assets/images/1.index/NavBar_WaveWhiteThinFlip.png">
            </div>
        </div>
        <!--End Wave Image-->


        <!--Start Slideshow-->
        <div class="slideshow-container">

            <!-- Full-width képek számmal és felirat szöveggel -->
            <div class="mySlides fade">
            <img src="Assets/images/1.index/Cake_1.jpg" style="width:100%">
            <div class="text">"MERT ZENE NÉLKÜL MIT ÉREK ÉN?"</div>
            </div>
        
            <div class="mySlides fade">
            <img src="Assets/images/1.index/Cake_2.jpg" style="width:100%">
            <div class="text">"Ó, AZ ÖREG BAKELIT, MÉG MINDIG TUDTHAT VALAMIT!"</div>
            </div>
        
            <div class="mySlides fade">
            <img src="Assets/images/1.index/Cake_3.jpg" style="width:100%">
            <div class="text">"FURCSA ÉRZÉS A NOSZTALGIA, NÉHA ENGEM IS MEGTALÁL. EGY ÖRÖKZÖLD A FÜLEMBE KÚSZIK, SOHA NEM HATHAT RÁ A HALÁL."</div>
            </div>
            
        </div>

        <script src="Javascript/SlideshowAuto.js"></script>
        <!--End Slideshow -->

        
        <!--Start Wave Image-->
        <div class="wave-image-group">
            <div class="wave-image">
                <img src="Assets/images/1.index/NavBar_WaveWhite.png">
            </div>
        </div>
        <!--End Wave Image-->

        <!--Start Mit tudunk adni-->
        <div class="what-you-can-do">
            <div class="subtitle">
                <h2>AJÁNLATAINK</h2>
            </div>

            <div class="row">

                <div class="column">
                    <i class="fas fa-cookie"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle buy-our-cake">Eredeti lemezek</span>
                    <span class="what-you-can-do-text">Válogass eredeti bakelit relikviáinkból és rendeld meg online!</span>
                </div>

                <div class="column">
                    <i class="fas fa-mitten"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle customize-cake">Készíts saját lemezt</span>
                    <span class="what-you-can-do-text">Küldd el nekünk a digitális zenei listádad és a borítóterved, és mi elkészítjük a saját, egyedi bakelit lemezedet</span>
                </div>
                
                <div class="column">
                    <i class="fas fa-boxes"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle create-box">Új kiadású lemezek</span>
                    <span class="what-you-can-do-text">Találd meg korunk előadóinak limitált kiadású példányait</span>
                </div>

            </div>
         </div>

        </div>
        <!--End Mit tudunk adni-->
       
        
        <!--Különleges ajánlat-->
        <section class="offer-section">
            <div class="offer-bg">
                <div class="offer-data">
                    <div class="subtitle">
                        <h2>KÜLÖNLEGES AJÁNLAT</h2>
                    </div>
                    <p class="offer-description">Újévi Ajánlatunk véget ér: </p>
                    <p class="offer-description" id="countdown" style="font-family: Old Standard TT; font-size: 2rem;">AJÁNLAT VÉGE</p>

                    <div class="subscribe-button-container">
                        <a href="products.php"><button class="subscribe-button" name="subscribe">VÁSÁROLJ MOST</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!--Különleges ajánlat vége-->

        <!--Start Rendelés lépései-->
        <div class="how-to-order">
            <div class="subtitle">
                <h2 class="order-subtitle">MEGRENDELÉS MENETE</h2>
            </div>
            <div class="row" style="color: #FF7380FF;">
                <div class="column">
                  <i class="fas fa-birthday-cake"></i>
                  <p><b>Válaszd ki a lemezt</b></p>
                </div>
                <div class="column">
                  <i class="fas fa-cart-plus"></i>
                  <p><b>Add hozzá a kosaradhoz</b></p>
                </div>
                <div class="column">
                  <i class="fas fa-money-check-alt"></i>
                  <p><b>Megrendelés és fizetés</b></p>
                </div>
                 <div class="column">
                 <i class="fas fa-box-open"></i>
                 <p><b>Rendelésfeldolgozás</b></p>
                </div>
                  <div class="column">
                  <i class="fas fa-shipping-fast"></i>
                  <p><b>Kiszállítás</b></p>
                </div>
            </div>
         </div>
        <!--End Rendelés lépései-->


        <!--Start Wave Image Flip-->
        <div class="wave-image-group">
            <div class="wave-image-flip how-to-order-wave">
                <img src="Assets/images/1.index/NavBar_WaveWhiteFlip.png">
            </div>
        </div>
        <!--End Wave Image Flip-->


        <!-- Start Mesterünk-->
        <div class="our-baker">

            <div class="subtitle">
                <h2>Csapatunk</h2>
            </div>
            
            <div class="all-helper-info-index">
                <div class="helper-individual-index">
                    <div class="helper-group helper0">
                        <div class="helper-pic-group">
                            <div class="helper-pic"></div>
                        </div>

                        <div class = "helper-more-about">
                            <p class="name"><b>KONNER SÁRA</b></p>
                            <p class="hierarchy">CEO - VINYLMASTER</p>
                            <p class="description">A formátum nem számít, mindegyik jó dili</p>
                        </div>
        
                        <div class="helper-social-media">
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
                        </div> 
                    </div>
                </div>

                <div class="helper-individual-index">
                    <div class="helper-group helper1">
                        <div class="helper-pic-group">
                            <div class="helper-pic"></div>
                        </div>

                        <div class = "helper-more-about">
                            <p class="name"><b>LAKATOS ALAJOS</b></p>
                            <p class="hierarchy">TÁRSALAPÍTÓ</p>
                            <p class="description">Zene nélkül mit érek én?</p>
                        </div>
        
                        <div class="helper-social-media">
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
                        </div> 
                    </div>
                </div>

                <div class="helper-individual-index">
                    <div class="helper-group helper2">
                        <div class="helper-pic-group">
                            <div class="helper-pic"></div>
                        </div>

                        <div class = "helper-more-about">
                            <p class="name"><b>BANÁNOS ÁGNES</b></p>
                            <p class="hierarchy">ÍRÓ ÉS ARCHIVÁLÓ</p>
                            <p class="description">Last Christmas I gave you MAHART...</p>
                        </div>
        
                        <div class="helper-social-media">
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
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mesterünk-->


        <!-- Start Google Map-->
        <?php include './Includes/GoogleMap.php';?>
        <!-- End Google Map-->


        <!-- Start Kapcsolatfelvétel -->
        <?php include './Includes/ContactUsForm.php';?>
        <!-- End Kapcsolatfelvétel-->
        

        <!--Start Hírfolyam-->
        <?php include './Includes/NewsLetter.php';?>
        <!--End Hírfolyam-->


        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Alsó Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
        <!-- End Alsó Nav -->

    </body>
</html>