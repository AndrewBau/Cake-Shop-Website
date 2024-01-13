<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html lang="en-MU">
<head>
    <meta charset="utf-8">
    <title>VINYLMASTER | Termékek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP KAPCSOLÓDÁS AZ ADATBÁZISHOZ : VINYLMASTER ==========-->
    <?php 
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FÁJL ==========-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel='stylesheet' type='text/css' href='Sanjana.css' />

    <!--========== BOOTSTRAP ==========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Bootstrap Core CSS -->
    <!-- <link rel="stylesheet" href="./bootstrap/css/bootstrap.css"> -->
 
    <!-- <link rel='stylesheet' type='text/css' href='style.php' /> -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
    <!-- Animált CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--========== BOXIKONOK ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<!--___________________________________________________________________________-->

<body>

    <!--========== PHP QUERIK ==========-->
    <?php 
        
        // $Q_fetch_featured = "SELECT * FROM products WHERE typeID = 2 ; ";//Kiemelt termékek kiválasztása 
        // $Q_fetch_new =  "SELECT * FROM products WHERE typeID = 1 ; ";//Új termékek kiválasztása
        // $Q_fetch_categories = "SELECT * FROM product_categories"; //Kiválasztja az összes kategóriát

          
        $Q_fetch_featured = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 2"; //Kiemelt termékek kiválasztása
        $Q_fetch_new = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 1"; //Új termékek kiválasztása
        $Q_fetch_categories = "SELECT * FROM categories"; //Kiválasztja az összes kategóriát
    
    
    ?>


    <!--========== HEADER ==========-->
    <?php $page = 'products'?>
    <!--Start Navigációs Sáv-->
    <?php include './Includes/MobileNavBar.php';?>
    <!--End Navigációs Sáv-->


    <!--Start Navigációs Sáv @media 1200px-->
    <?php include './Includes/PcNavBar.php';?>
    <!--End Navigációs Sáv @media 1200px-->

    <!--Start Wave Image-->
    <!-- <div class="wave-image-group hide-wave">
        <div class="wave-image footer-wave">
            <img src="Assets/images/1.index/NavBar_WavePink.png">
        </div>
    </div> -->
    <!--End Wave Image-->
    <!--___________________________________________________________________________-->

    
    
    <main class="1-main">

        <!--========== AJÁNLAT 1 ==========-->

        <!-- <section class="offer section offer__top mt-2">
            <div class="offer__bg2 offer__1bg">
                <div class="offer__data ">
                    <h2 class="offer__title">50% AKCIÓ MINDEN LEMEZRE!!!</h2>
                    <p class="offer__description">2023. DECEMBER 1. - 31. <br />SIESS, NE MARADJ LE!!!</p>

                    <a href="products.php" class="button button__round">SHOP NOW</a>
                </div>
            </div>
        </section> -->

        <!--Start Wave Flip Image-->
        <!-- <div class="">
            <div class="">
                <img src="Assets/images/1.index/NavBar_WavePinkFlip.png">
            </div>
        </div> -->
        <!--End Wave Flip Image-->

       

        

        <!--========== KIEMELT TERMÉKEK LEKÉRDEZÉSÉNEK KÍSÉRLETE ==========-->

        <section class="featured section" id="featured">
           
            <!--========== CÍM BANNER ==========-->
            <?php 
                //TERMÉK FETCHELÉS KATEGÓRIA SZERINT
                $result_cat = mysqli_query($conn, $Q_fetch_categories);

            ?>
            <div class="row category-title">
                <div class="col">
                    <h2 class="category" id="small_title"></h2>
                    <h2 class="category-name " id="big_title"></h2>
                </div>

                <!--========== RENDEZÉS GOMB SZERINT ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Rendezés &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <a href="#" onclick="sortby_products(1)">Ár alacsonytól magasig</a>
                        <a href="#" onclick="sortby_products(2)">Ár magastól alacsonyig</a>
                         
                    </div>
                </div>

                <!--========== KATEGÓRIÁK GOMB ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Kategóriák &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <?php
                        while($row_categories = mysqli_fetch_assoc($result_cat)){
                            $categoryID = $row_categories['categoryID'];
                            $p_cat_name = $row_categories['p_cat_name'];
                            ?>
                            <a href="#" onclick="display_products_by_cat_id(<?php echo $categoryID; ?>, '<?php echo $p_cat_name; ?>'); " ><?php echo $p_cat_name; ?></a>
                            <!-- <input type="submit" onclick="display_products_by_cat_id(<?php echo $categoryID; ?>)" value="<?php echo $row_categories['p_cat_name']; ?>"> -->
                            
                            <?php 
                        }
                        
                        ?>
                    </div>
                </div>
            </div>

            <div id="result" class="featured__container bd-grid mt-4">
                <!-- TERMÉKEK KATEGÓIRA SZERINT  -->
                <!-- TERMÉKEK RENDEZÉSE  -->
                
            </div>


        </section>

       
        <!--========== AJÁNLAT 2 ==========-->

        <section class="offer section">
            <div class="offer__bg">
                <div class="offer__data">
                    <h2 class="offer__title">Akció!</h2>
                    <p class="offer__description">Különleges ajánlat csak ebben a hónapban!</p>

                    <a href="#" class="button button__round">VÁSÁRLÁS</a>
                </div>
            </div>
        </section>


      

        <!--========== ÚJ TERMÉKEK LEKÉRDEZÉSÉNEK KÍSÉRLETE ==========-->
        <section class="new section" id="new">
        <div class="row category-title">
                <div class="col">
                    <h2 class="category" id="small_title2"></h2>
                    <h2 class="category-name " id="big_title2"></h2>
                </div>
        </div>

            <div class="new__container bd-grid" id="result2">
               
                
            </div>
        </section>

        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Alsó Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
        <!-- End Alsó Nav -->

    <!--___________________________________________________________________________-->


    <!--========== JAVASCRIPT ==========-->
  
            <!-- AJAX IMPLEMENTÁLÁSA JAVASCRIPTTEL -->
            <script>

                //KATEGÓRIA FUNKCIÓ - TÖLTÉS NÉLKÜL MEGJELENIK
                function display_products_by_cat_id(cat_id, cat_name){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "category_search.php?cat_id="+cat_id, true);
                    xhttp.send();   
                    console.log('sent');

                    //CÍM VÁLTOZTATÁSA
                    document.getElementById('small_title').innerHTML = 'CATEGORY';
                    document.getElementById('big_title').innerHTML = cat_name;
                    
                }

                //FUNKCIÓ SZERINTI RENDEZÉS - TÖLTÉS NÉLKÜL MEGJELNIK AHOL ID = RESULT
                function sortby_products(sort_num){
                    var xhttp;
                      //AJAX
                      console.log('entered ajax sortby');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready sortby');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "sortby_search.php?sortby="+sort_num, true);
                    xhttp.send();   
                    console.log('sent sortby');

                    //CÍM MEGVÁLTOZTATÁSA
                    document.getElementById('small_title').innerHTML = 'SORT BY PRICE';

                    if(sort_num == 1){
                        document.getElementById('big_title').innerHTML = 'low to high';
                    }
                    else if(sort_num ==2){
                        document.getElementById('big_title').innerHTML = 'high to low';
                    }
                    
                }


                //TERMÉKEK TÍPUSA FUNCTION - TÖLTÉS NÉLKÜL ELÉRHETŐ
                function display_products_by_type(p_type){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "products_by_type_search.php?p_type="+p_type, true);
                    xhttp.send();   
                    console.log('sent');

                    //CÍM VÁLTOZTATÁSA

                    if(p_type==1){
                        document.getElementById('small_title').innerHTML = 'new';
                    }
                    else  if(p_type==2){
                        document.getElementById('small_title').innerHTML = 'featured';
                    }
                    else  if(p_type==3){
                        document.getElementById('small_title').innerHTML = 'sales';
                    }
                    else  if(p_type==4){
                        document.getElementById('small_title').innerHTML = 'best-seller';
                    }

                    //NAGY CÍM
                    document.getElementById('big_title').innerHTML = 'PRODUCTS';
                    
                }

                  
                //TERMÉKEK TÍPUSA FUNCTION - TÖLTÉS NÉLKÜL MEGJELNIK AHOL ID = RESULT2
                function display_products_by_type_second(p_type){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result2").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "products_by_type_search.php?p_type="+p_type, true);
                    xhttp.send();   
                    console.log('sent');

                    //CÍM MEGVÁLTOZTATÁSA

                    if(p_type==1){
                        document.getElementById('small_title2').innerHTML = 'new';
                    }
                    else  if(p_type==2){
                        document.getElementById('small_title2').innerHTML = 'featured';
                    }
                    else  if(p_type==3){
                        document.getElementById('small_title2').innerHTML = 'sales';
                    }
                    else  if(p_type==4){
                        document.getElementById('small_title2').innerHTML = 'best-seller';
                    }

                    //NAGY CÍM
                    document.getElementById('big_title2').innerHTML = 'PRODUCTS';
                    
                }


                //KIVÁLASZTOTT TERMÉK FUNKCIÓ ELINDÍTÁSA
                display_products_by_type(2); // 2 --> kiválasztott

                //LAUNCHING NEW PRODUCTS FUNCTION
                display_products_by_type_second(1); // 1 --> új
            </script>






</body>
</html>