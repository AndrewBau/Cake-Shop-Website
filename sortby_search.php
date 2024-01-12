<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";




    // <!--========== PHP CONNECTION TO DATABASE: MALAKO ==========-->
    
        include_once 'connection.php';
        include_once 'numOfItemsInCart.php';


        // QUERIES:
        $Q_sortby_price_asc = "SELECT * FROM products ORDER BY ar ASC; "; //sort all products by price low to high
        $Q_sortby_price_desc = "SELECT * FROM products ORDER BY ar DESC; "; //sort all products by price high to low
        

        //SORT BY PRICE TYPE:
        if($_REQUEST['sortby']==1){ // 1 --> low to high
            $result_sortby =mysqli_query($conn, $Q_sortby_price_asc);
        }
        elseif($_REQUEST['sortby']==2){// 2 --> high to low
            $result_sortby =mysqli_query($conn, $Q_sortby_price_desc);
        }



        //DISPLAY SORTED RESULTS
        while($row_product = mysqli_fetch_assoc($result_sortby)){
            $product_id = $row_product['productID'];
           

        echo '   <div class="featured__products" id="product__card">
                   <div class="featured__box">
                       <div class="featured__new">NEW</div>
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