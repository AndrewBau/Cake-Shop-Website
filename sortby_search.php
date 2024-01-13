<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";




    // <!--========== PHP KAPCSOLÓDÁS AZ ADATBÁZISHOZ : VINYLMASTER ==========-->
    
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';


        // QUERIES:
        $Q_sortby_price_asc = "SELECT * FROM products ORDER BY ar ASC; "; //minden terméket növekvő sorrendbe tesz ár szerint
        $Q_sortby_price_desc = "SELECT * FROM products ORDER BY ar DESC; "; //minden terméket csökkenő sorrendbe tesz ár szerint
        

        //ÁR SZERINTI SORRENDBE IGAZÍTÁS TÍPUSA:
        if($_REQUEST['sortby']==1){ // 1 --> növekvő
            $result_sortby =mysqli_query($conn, $Q_sortby_price_asc);
        }
        elseif($_REQUEST['sortby']==2){// 2 --> csökkenő
            $result_sortby =mysqli_query($conn, $Q_sortby_price_desc);
        }



        //RENDEZETT EREDMÉNY MEGJELENÍTÉSE
        while($row_product = mysqli_fetch_assoc($result_sortby)){
            $product_id = $row_product['productID'];
           

        echo '   <div class="featured__products" id="product__card">
                   <div class="featured__box">
                       <div class="featured__new">ÚJ</div>
                       <div class=""><a href="product.php?product_id='.$product_id.' "><i class="bx bxs-cart-add bx-tada-hover featured__new_cart"></i></a></div>
                       <a href="product.php?product_id='.$product_id.'" >
                           <img src="'.$row_product['boritokep'].'" alt="" class="featured__img avoid__clicks"
                           style="
                               object-fit: cover;
                               width:  232px;
                               height: 232px;" />
                       </a>
                   </div>

                   <div class="featured__data">
                    
                       <a href="product.php?product_id='.$product_id.'" class="product__name" id="product__name"style="text-decoration: none;">'.$row_product['albumcim'].'</a></br>
                       <span class="featured__price">'.$row_product['ar'].' Ft</span>
                      
                   </div>
               </div> ';

           
       }


?>