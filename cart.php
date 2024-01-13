<?php 
    define('Access', TRUE);

    //SESSION START
    include "./AdditionalPHP/startSession.php";

    //KAPCSOLÓDÁS AZ ADATBÁZISHOZ : VINYLMASTER
    include_once 'connection.php';
?>

<?php
//Törlés gomb
//A törlés gomb ugyanazt az oldalt tölti be, de további információt ad az URL-ben
//cart.php?action=delete&product_id=<?php echo ...
//leellenőrzi, hogy az URL tartalmaz-e action=delete
if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop az összes termék a bevásárló kosárban session-tömbben amíg az id nem egyezik a url-vel
    foreach($_SESSION['shopping_cart'] as $key => $product){

        //Ellenőrzi, hogy az URL-ben található termék azonosítója (amikor a törlés gombra kattintanak) egyezik-e eggyel a bevásárló kosár session tömbjéből
        if($product['id'] == filter_input(INPUT_GET, 'product_id')){
            //törli az elemet a session tömbből
            unset($_SESSION['shopping_cart'][$key]);
        }// if vége
    }// foreach vége

    //session tömb kulcsainak visszaállítása, hogy egyezzenek a $product_ids számokat tartalmazó tömb kulcsaival
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);

    //SOR TÖRLÉSE A CARTITEM TÁBLÁBÓL
    $Q_delete_cartitem = 'DELETE FROM cartitem WHERE productID = '.filter_input(INPUT_GET, 'product_id');
    $run_delete_cartitem = mysqli_query($conn, $Q_delete_cartitem);

}//end if
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>VINYLMASTER | Részletek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP KAPCSOLAT LÉTREHOZÁSA AZ ADATBÁZIOSSAL: VINYLMASTER ==========-->
    <?php 
        
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FILES ==========-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel="stylesheet" type="text/css" href="Sanjana.css">

    <link href="jquery.nice-number.css" rel="stylesheet">
    <!--========== JQUERY CDN ==========-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="jquery.nice-number.js"> </script>
    <script type="text/javascript"> 
    $(function(){
        $('input[type="number"]').niceNumber();
    });
    </script>


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

    <!--========== BOXICONOK ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
          <!--========== PHP QUERIK ==========-->
        <?php 
            
            $Q_fetch_featured = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 2"; //selects featured products
            $Q_fetch_new = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 1"; //selects new products
            $Q_fetch_product_details = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 2"; //selects product with id =1
            $Q_fetch__all_products = "SELECT * FROM products";
        
        ?>


        <!--========== HEADER ==========-->
        <?php $page = 'cart'?>
        
        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->
          

        <!--========== KOSÁR STRUKTÚRÁJA ==========-->
        <div class="row mx-auto">
            <!-- Kosárban az elemek -->
            <div class="col-lg">

                <!-- cím -->
                <div class="row-md  title-cart">
                    <!-- <h1>M Y &nbsp K O S Á R</h1> -->
                    <h1 text-center>KOSARAM &nbsp</h1>
                    <i class='bx bxs-cart-download bx-tada-hover'></i>
                </div>
                <!-- megrendelési adatok header -->
                <div class="cart_title_bar mx-1 ">
                    <div class="cart-title-1">
                        <h2 class="section-title hide-wave"> </h2>
                    </div>
                    <div class="cart-title-2">
                        <h4 class="section-all my-0 py-0 hide-wave">Termék adatai</h4>
                    </div>
                    <div class="cart-title-3">
                        <h4 class="section-all my-0 py-0 hide-wave">Mennyiség</h4>
                    </div>
                   
                    <div class="cart-title-4">
                        <h4 class="section-all my-0 py-0 hide-wave">Végösszeg (HUF)</h4>
                    </div>
                    <div class="cart-title-5">
                        <h4 class="section-all my-0 py-0 hide-wave">Törlés</h4>
                    </div>
                    
                </div>
                <!-- Loop a bevásárló kosáron keresztül -->
                <?php
                //ha a bevásárló kosár nem üres
                if(!empty($_SESSION['shopping_cart'])){
                    //összeg változó létrehozása
                    $total = 0;
                    $_SESSION['total_quantity'] = 0;
                    //loop az összes elemen keresztül ami a bevásárló kosárban található
                    foreach($_SESSION['shopping_cart'] as $key => $product){ 
                
                ?>

                <!-- nyugtára vonatkozó tételkártya -->
                <div class="receipt-card mt-2 mb-3 mx-1 py-3">

                    <!-- termék image -->
                    <?php
                    
                    $result_product = mysqli_query($conn, $Q_fetch__all_products);
                    $check = mysqli_num_rows($result_product);

                    if($check>0){ //ellenőrzi, hogy a $result üres-e az adatbázisban
                          //loop az összes elemen a termék táblában
                        while($product_row = mysqli_fetch_assoc($result_product)){

                              //Összehasonlítás, hogy az adatbázisban az aktuális loopban lévő azonosító (id) egyenlő-e az aktuális seesionbe
                              //tartozó bevásárlókosár azonosítójával a foreach loopban
                            if($product_row['productID'] == $product['id']){
                                ?>
                                <!-- Megjelenít egy képet az adatbázisból azonosító alapján -->
                                <div class="cart_img">
                                    <img src="<?php  echo $product_row['boritokep']; ?>" class="img-fluid">
                                </div>

                                <?php
                            }//end if
                        }//end while
                    }//end if ellenőzés
                    ?>

                    <!-- <div class="cart_img">
                        <img src="Assets\images\products\Cake_2.jpg" class="img-fluid">
                    </div> -->

                    <!-- termék adatai -->
                    <div class="">
                        <!-- product name -->
                        <div class="product-name">
                            <div class="product-name-det">
                                <h6><?php echo $product['name'];?></h6>
                                <h6>Ft <?php echo number_format($product['price'], 2);?> / unit</h6>
                            </div>
                        </div>
                    </div>

                        <!-- mennyiség -->
                        <div class="quantity-value">
                             <h6><?php echo $product['quantity'];?></h6>
                        </div>


                    <!-- termék összár -->
                    <div class="tot-price-per-item ">
                        <h6>HUF <?php echo number_format($product['quantity'] * $product['price'], 2); ?></h6>
                    </div>

                      <!-- Törlés -->
                    <div class="remove-button">
                        <!-- termék['id'] fetchelés, id a bevásárló kosár sessionből -->
                        <a href="cart.php?action=delete&product_id=<?php echo $product['id'];?>"> 
                        <button type="button" class="btn btn-primary btn-lg my-4 button rem-but"><i class='bx bx-x rem-but-x' style='color:#ffffff; font-size: 1.3rem ;'></i></button>
                        </a>
                    </div>
                </div>

                <?php

                    //VÉGÖSSZEG SZÁMOLÁSA
                    $total = $total + ($product['quantity'] * $product['price']);

                    //SESSION LÉTREHOZÁSA A VÉGÖSSZEGNEK
                    $_SESSION['total_price'] = $total;

                }//end foreach
                ?>
            </div>

            <!-- Nyugta -->
            <div class="col-md container receipt-area mx-auto">
                <!-- Összefoglalás -->
                <div class="row summary-area">
                    <h1 class="subtitle">ÖSSZEFOGLALÁS</h1>
                </div>
                <div class="row container receipt-data mx-auto pt-3">
                    <!-- részösszeg -->
                    <div class="row container subtotal-area my-1">
                        <div class="col">
                            <h4 class="subtitle title-checkout">RÉSZÖSSZEG: </h4>
                        </div>
                        
                        <div class="col">
                            <h4 class="subtitle">HUF <?php echo number_format($total, 2); ?></h4>
                        </div>
                    </div>
                    <!-- delivery -->
                    <div class="row container delivery-area my-1">
                        <div class="col">
                            <h4 class="subtitle title-checkout">KISZÁLLÍTÁS: </h4>
                        </div>
                        
                        <div class="col">
                            <h4 class="subtitle">HUF 0.00</h4>
                        </div>
                    </div>
                    <!-- total -->
                    <div class="row container total-area my-1 pt-2">
                        <div class="col">
                            <h4 class="subtitle title-checkout">VÉGÖSSZEG: </h4>
                        </div>
                        
                        <div class="col">
                           <h4 class="subtitle">HUF <?php echo number_format($total, 2); ?></h4>
                        </div>
                    </div>
                    
                    
                    <!-- pénztár -->
                    <!-- mutassa a pénztárat, ha a bevásárlókosár tömb nem üres -->
                    <?php
                    //ellenőrzi, hogy a bevásárlókosár nem üres
                    if(isset($_SESSION['shopping_cart']));{
                        //ellenőrizze, hogy a bevásárlókosárban több, mint 0 termék található
                        if(count($_SESSION['shopping_cart'])>0){
                    
                    ?>
                    <div class="row checkout-area">
                        <a href="checkout.php">
                            <button type="button" class="btn btn-primary btn-lg my-4 button">Pénztár</button>
                        </a>
                    </div>
                    <?php
                     }//end count if
                     if(count($_SESSION['shopping_cart']) == 0) {
                        echo('<h1 class="subtitle">Üres a kosár!</h1>');
                     }
                    }//end isset if
                    if(!isset($_SESSION['shopping_cart'])) {
                        echo('<h1 class="subtitle">Üres a kosár!</h1>');
                     }
                    
                    ?>
                </div>
            </div>
            <?php  
                }//end if at start
                //Üzenetet jelenít meg, ha a kosár üres
                if(isset($_SESSION['shopping_cart'])) {
                    if(count($_SESSION['shopping_cart']) == 0) {
                        
                        echo('<h1 class="text-center my-3">Üres a kosár!</h1>');
                        echo('<div class="text-center py-3"><img src="Assets\images\cart\sad.png" class="img-fluid" style="max-width:17%;"></div>');
                        echo('<div class="text-center py-3"><a href="products.php" class="button button__round">VÁSÁRLÁS MOST</a></div>');
                     }//end ha a bevásárló kosár == 0
                 }//end if isset
                 else { //ha a kosár üres
                    echo('<h1 class="text-center my-3">A kosár üres!</h1>');
                    echo('<div class="text-center py-3"><img src="Assets\images\cart\sad.png" class="img-fluid" style="max-width:17%;"></div>');
                    echo('<div class="text-center py-3"><a href="products.php" class="button button__round">VÁSÁRLÁS MOST</a></div>');
                 }
                
            ?>
        </div>

           
        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Bottom Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
        <!-- End Bottom Nav -->

        <!-- <script src="Javascript\main.js?<?php //echo filemtime('Javascript\main.js'); ?>" ></script> -->
    </body>
</html>