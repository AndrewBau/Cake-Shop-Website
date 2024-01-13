<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>VINYLMASTER | Sorbarendezés</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP KAPCSOLÓDÁS AZ ADATBÁZISHOZ : VINYLMASTER ==========-->
    <?php 
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FÁJLOK ==========-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel="stylesheet" type="text/css" href="Sanjana.css">

    <!--========== BOOTSTRAP ==========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- <link rel='stylesheet' type='text/css' href='style.php' /> -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
    <!-- Animált CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--========== BOXIKONOK ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
          <!--========== PHP QUERIK ==========-->
        <?php 
            
            $Q_fetch_featured = "SELECT * FROM products WHERE typeID = 2 ; ";//Kiemelt termékek kiválasztása
            $Q_fetch_new =  "SELECT * FROM products WHERE typeID = 1 ; ";//Kiválasztja az új termékeket
            $Q_fetch_product_details =  "SELECT * FROM products WHERE productID = 1 ; ";//Kiválasztja a terméket, melynél id=1
            $Q_fetch_categories = "SELECT * FROM product_categories;"; //Kiválasztja az összes kategóriát
            $Q_sortby_price_asc = "SELECT * FROM products ORDER BY p_price ASC; "; //Termékeket növekvő sorrendbe teszi
            $Q_sortby_price_desc = "SELECT * FROM products ORDER BY p_price DESC; "; //Termékeket csökkenő sorrendbe tesziTermékeket csökkenő sorrendbe teszi
            
            
        
        ?>


        <!--========== HEADER ==========-->
        <?php $page = 'products_category'?>
        <!--Start Navigációs Sáv-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigációs Sáv-->


        <!--Start Navigációs Sáv @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigációs Sáv @media 1200px-->

        <!--========== CATEGORIES BUTTON ==========-->
        <?php 
        
        //$result_cat = mysqli_query($conn, $Q_fetch_categories);

        ?>
        <!-- <div class="row category-title">
            <h2 class="category">CATEGORY</h2>
            <h2 class="category-name "><?php echo $row_cat['p_cat_name']; ?></h2>
            <div class="dropdown col-auto mx-auto pt-5 pb-1">
                <button class="dropbtn button" id="cat-but" style="outline: none;">Categories &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                <div class="dropdown-content">
                    <?php
                    while($row_categories = mysqli_fetch_assoc($result_cat)){
                        $categoryID = $row_categories['categoryID'];
                        ?>
                        <a href="products_category.php?categoryID=<?php echo $categoryID; ?>"><?php echo $row_categories['p_cat_name']; ?></a>
                        <?php
                    }
                    
                    ?>
                </div>
            </div>
        </div> -->


        <!--========== PHP FETCH PRODUCT DETAILS ==========-->

        <?php
            if(isset($_GET['categoryID'])){
                $cat_id = $_GET['categoryID'];
                $Q_fetch_product_by_cat_id = "SELECT * FROM products WHERE categoryID = '$cat_id' ; ";
                $Q_fetch_cat_name_by_cat_id = "SELECT * FROM product_categories WHERE categoryID = '$cat_id' ; ";

                $run_cat = mysqli_query($conn, $Q_fetch_cat_name_by_cat_id );
                $row_cat = mysqli_fetch_array($run_cat);

            }
        ?>

        
        <section class="featured section" id="featured">

               <!--========== TITLE BANNER ==========-->
            <?php 
            
                $result_cat = mysqli_query($conn, $Q_fetch_categories);

                if($_GET['sortby']==1){ //1 = low to high
                    $result_sortby =mysqli_query($conn, $Q_sortby_price_asc);
                }
                elseif($_GET['sortby']==2){ //2 = high to low
                    $result_sortby =mysqli_query($conn, $Q_sortby_price_desc);
                }
                

            ?>
            <div class="row category-title">
                <div class="col">
                    <h2 class="category">Rendezés ár szerint</h2>
                    <?php
                    if($_GET['sortby']==1){
                        echo '<h2 class="category-name ">low to high</h2>';
                    }
                    elseif($_GET['sortby']==2){
                        echo '<h2 class="category-name ">high to low</h2>';
                    }
                    ?>
                   
                </div>

                <!--========== SORT BY BUTTON ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Rendezés &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <a href="products_sortby.php?sortby=1">Ár alacsonytól magasig</a>
                        <a href="products_sortby.php?sortby=2">Ár magastól alacsonyig</a>
                         
                    </div>
                </div>

                <!--========== CATEGORIES BUTTON ==========-->
                <div class="dropdown col-auto">
                    <button class="dropbtn button" id="cat-but">Kategóriák &nbsp<i class='bx bxs-down-arrow drop-arrow'></i></button>
                    <div class="dropdown-content">
                        <?php
                        while($row_categories = mysqli_fetch_assoc($result_cat)){
                            $categoryID = $row_categories['categoryID'];
                            ?>
                            <a href="products_category.php?categoryID=<?php echo $categoryID; ?>"><?php echo $row_categories['p_cat_name']; ?></a>
                            <?php
                        }
                        
                        ?>
                    </div>
                </div>
            </div>

             


            <div class="featured__container bd-grid mt-4">

                <?php
                         
                        while($row_product = mysqli_fetch_assoc($result_sortby)){
                             $product_id = $row_product['productID'];
                            ?>

                                <div class="featured__products" id="product__card">
                                    <div class="featured__box">
                                        <div class="featured__new">ÚJ</div>
                                        <div class=""><a href="product.php?product_id=<?php echo $product_id; ?>"><i class='bx bxs-cart-add bx-tada-hover featured__new_cart'></i></a></div>
                                        <a href="product.php?product_id=<?php echo $product_id; ?>" >
                                            <img src="<?php echo $row_product['p_img']; ?>" alt="" class="featured__img avoid__clicks"
                                            style="
                                                object-fit: cover;
                                                width:  232px;
                                                height: 232px;" />
                                        </a>
                                    </div>

                                    <div class="featured__data">
                                        <?php $product_id = $row_product['productID']; ?>
                                        <a href="product.php?product_id=<?php echo $product_id; ?>" class="product__name" id="product__name"style="text-decoration: none;"><?php echo $row_product['p_name']; ?></a></br>
                                        <span class="featured__price">Rs <?php echo $row_product['p_price']; ?></span>
                                       
                                    </div>
                                </div>

                            <?php
                        }
                
                ?>

            </div>

            
           
            

        </section>

       
        <!-- Javascript -->
        <!-- <script src="Javascript\main.js?<?php //echo filemtime('Javascript\main.js'); ?>" ></script> -->
    </body>
</html>