<?php 
    define('Access', TRUE);

    //START SESSION
    include "./AdditionalPHP/startSession.php";

    //KAPCSOLÓDÁS AZ ADATBÁZISHOZ : VINYLMASTER
    include_once 'connection.php';
    

    //FELHASZNÁLÓ TELJESÍTETT FIZETÉS
    //ID LÉTREHOZÁSA A USER RENDELÉSÉNEK

    //ELSŐ -- TELEFONSZÁM KERESÉSE
    $Q_select_user_phone = 'SELECT phone FROM user WHERE userID = '.$_SESSION['userID'];
    $run_select_user_phone = mysqli_query($conn,  $Q_select_user_phone);

    //HA NINCS TELEFONSZÁMA A USERNAK --> SESSION NULLA LESZ
    if(mysqli_num_rows($run_select_user_phone)==0){
        $_SESSION['phone'] = null;
    }
    //KÜLÖNBEN A SESSION BE LESZ ÁLLÍTVA A JELENLEGI TELEFONSZÁMRA
    else{
        $result_phone = mysqli_fetch_array($run_select_user_phone);
        $_SESSION['phone'] = $result_phone[0];
    }


    //ADAT HOZZÁADÁSA A USER RENDELÉSÉHEZ
    $Q_insert_userorder ='INSERT INTO userorder (userID, total, address, phone, status) 
    VALUES ('.$_SESSION['userID'].','.$_SESSION['total_price'].',"'.$_POST['address_checkout'].'","'.$_SESSION['phone'].'", "successful")';
    $run_insert_userorder = mysqli_query($conn, $Q_insert_userorder);

    //BEILLESZT AZ ORDERITEMBE

    //ELŐSZÖR KIVÁLASZTJUK A SZÜKSÉGES ADATOKAT
    $Q_select_all_cartitem = 'SELECT * FROM cartitem WHERE cartID ='.$_SESSION['cartID'];
    $run_select_all_cartitem = mysqli_query($conn, $Q_select_all_cartitem);

    $Q_select_orderID = 'SELECT orderID FROM userorder WHERE userID ='. $_SESSION['userID'];
    $run_select_orderID = mysqli_query($conn, $Q_select_orderID);
    $result3 = mysqli_fetch_array($run_select_orderID, MYSQLI_NUM);

    $_SESSION['orderID'] = $result3[0];

    //VÉGIGLOOPOL A KOSÁR ELEMEIN
    while($row = mysqli_fetch_assoc($run_select_all_cartitem)){

        //BELETESZI AZ ÖSSZES ELEMET A MEGRENDELT TÁBLÁBA
        $Q_insert_orderitem = 'INSERT INTO orderitem (productID, orderID, price, quantity) 
        VALUES ('.$row['productID'].', '.$_SESSION['orderID'].','.$row['price'].','.$row['quantity'].')';
        $run_insert_orderitem = mysqli_query($conn,  $Q_insert_orderitem);
    }
    

    //TRANZAKCIÓBA INSERTEL
    $Q_insert_into_transaction = 'INSERT INTO transaction (userID, orderID, paymentMethod, status)
    VALUES ( '.$_SESSION['userID'].', '.$_SESSION['orderID'].',"'.$_POST['paymentMethod'] .'","successful" )';
    $run_insert_into_transaction = mysqli_query($conn, $Q_insert_into_transaction);
    

    //AZ ADATOK INSERTELÉSE UTÁN TÖRÖLJÜK A BEVÁSÁRLÓKOSÁR TARTALMÁT
    foreach($_SESSION['shopping_cart'] as $key => $product){
        unset($_SESSION['shopping_cart'][$key]);
        // unset($product_ids[$key]);

    }//end foreach


    //FIZETÉS UTÁN TÖRÖLNI KELL AZ ÉRTÉKEKET A KOSÁRBAN
    $Q_delete_cartitem = 'DELETE FROM cartitem WHERE cartID ='.$_SESSION['cartID'];
    $run_delete_cartitem = mysqli_query($conn, $Q_delete_cartitem);


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <title>VINYLMASTER | Köszönjük!</title>


        <!-- BOOTSTRAP CORE CSS -->

        <link href="checkout/bootstrap.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="checkout/form-validation.css" rel="stylesheet">

        <!-- ANIMÁLT.CSS  -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

      

    </head>


    <body >

        <!-- CÍM -->
        <div class="py-5 text-center">
            <h1 class="business-name">VINYLMASTER</h1>
            
            <img class="thankYouImageHead my-5" src="Assets/images/cart/circleHead.png" />
            <img class="thankYouImage  my-5 rotate" src="Assets/images/cart/sun.png" />
        
            <h1 style="font-size:3vw;">Köszönjük, hogy nálunk vásároltál!</h1>
            <a href="index.php" class=" btn btn-primary btn-lg button" style="font-size:1.5vw;">Kezdőoldal</a>
        </div>
    
         <!-- FOOTER  -->
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2024 VINYLMASTER</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Adatkezelési szabályzat</a></li>
                <li class="list-inline-item"><a href="#">ÁSZF</a></li>
                <li class="list-inline-item"><a href="#">Támogatás</a></li>
            </ul>
        </footer>
      
    </body>
</html>
