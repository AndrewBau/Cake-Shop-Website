<?php 
    define('Access', TRUE);

    //SESSION START
    include "./AdditionalPHP/startSession.php";

    //KAPCSOLÓDÁS AZ ADATBÁZISHOZ : VINYLMASTER
    include_once 'connection.php';

    $validated = false;

    // változók definiálása és beállitása üres értékre
    $fname = $lname = $email = $address = $country = $city = $zip = $paymentMethod = $ccname = $ccnum = $ccexp_m =$ccexp_y = $cccvv = "";
    $fnameErr = $lnameErr = $emailErr = $addressErr = $countryErr = $cityErr = $zipErr = $paymentMethodErr = $ccnameErr = $ccnumErr = $ccexpErr = $cccvvErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //KERESZTNÉV VALIDÁLÁSA
        $fname = test_input($_POST["fname"]);
        // leellenőrzi, hogy csak betűket és spacet tartalmaz-e
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
          $fnameErr = "Csak betű és szóköz engedélyezett";
        }

        //VEZETÉKNÉV VALIDÁLÁSA
        $lname = test_input($_POST["lname"]);
        // leellenőrzi, hogy csak betűket és spacet tartalmaz-e
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
          $lnameErr = "Csak betű és szóköz engedélyezett";
        }
      
        //EMAIL VALIDÁLÁSA
        $email = test_input($_POST["email"]);
        // ellenőrzi a formátumot
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Érvénytelen email cím formátum";
        }
        
        //CÍM VALIDÁLÁSA
        $address = test_input($_POST["address_checkout"]);
        // Ellenőrizze, hogy a cím számmal kezdődik-e, azt követik-e betűk, tartalmaz-e szóközt, kötőjelet és vesszőt.
        if (!preg_match("/^[0-9a-zA-Z\s,-]+$/",$address)) {
          $addressErr = "Érvénytelen cím";
        }

        //ORSZÁG VALIDÁLÁSA
        // $country = test_input($_POST["country"]);
        // check if country == mauritius
        // if ($country != "Mauritius" || $country != "mauritius" ) {
        //   $addressErr = "Elnézést, de csak Mauritiusba szállítunk.";
        // }

        //VÁROS VALIDÁLÁSA
        $city = test_input($_POST["city"]);
        // ellenőrzi, hogy city == options
        if ($city == "Port Louis" || $city == "Curepipe" || $city == "Vacoas" || $city == "Quatre Bornes" || $city == "Rose Hill" || $city == "Flic En Flac" || $city == "Phoenix") {
          //valid
        }
        else{
          $cityErr = "Érvénytelen város";
        }

        //IRÁNYÍTÓSZÁM VALIDÁLÁSA
        $zip = test_input($_POST["zip"]);
        // ellenőrzi, hogy az irányítószám pontosan 5 számjegyet tartalmaz.
        if (!preg_match("/^[0-9]{5}/",$zip)) {
          $zipErr = "Érvénytelen irányítószám";
        }
      
        //FIZETÉSI METÓDUS VALIDÁLÁSA
        $paymentMethod = test_input($_POST["paymentMethod"]);

        //REGEX KÁRTYATÍPUS ALAPJÁN
        $cardtype = array(
          "visa"       => "/^4[0-9]{15}$/",
          // "mastercard" => "/^5[1-5][0-9]{14}$/"
         
        );


        //HITELKÁRTYA NÉV ÉRVÉNYESSÉGELLENŐRZÉS
        $ccname = test_input($_POST["ccname"]);
        // Ellenőrzi, hogy a hitelkártya név csak betűket és szóközöket tartalmaz-e.
        if (!preg_match("/^[a-zA-Z-' ]*$/",$ccname)) {
          $ccnameErr = "Csak betű és szóköz engedélyezett";
        }

        //HITELKÁRTYASZÁM VALIDÁLÁSA
        $ccnum = test_input($_POST["ccnum"]);
        // ellenprzi, hogy a hitelkártyaszám illeszkedik-e a kártyatípusnak megfelelő regexbe
        if (!preg_match($cardtype['visa'],$ccnum)) {
          $ccnumErr = "Érvénytelen kártyaszám
          <br>
          Elnézést! Jelenleg a rendszerünk a VISA és MasterCard kártyákat támogatja.";
        }


        //HITELKÁRTYA LEJÁRATI DÁTUM VALIDÁLÁSA
        if (empty($_POST["ccexp_m"]) || empty($_POST["ccexp_y"])) {
          $ccexpErr = "Kérlek add meg a lejárati dátumot";
        } 
        else {
            $ccexp_m = test_input($_POST["ccexp_m"]);
            $ccexp_y = test_input($_POST["ccexp_y"]);

            //VALIDÁLJA A HÓNAPOT
            if((int)$ccexp_m > 0 && (int)$ccexp_m < 13){
              //VALIDÁLJA AZ ÉVET
              if((int)$ccexp_y > 1900 && (int)$ccexp_y < 4000){
                $expired_check = \DateTime::createFromFormat('my', $ccexp_m.$ccexp_y);
                $month_now = date('m');
                $year_now = date('y');
                $now = new \DateTime();
                //ELLENŐRZI, HOGY LEJÁRT-E

                if($year_now < (int)$ccexp_y){
                  //valid year
                  
                }
                else if($year_now == (int)$ccexp_y){
                  if($month_now < (int)$ccexp_m){
                    //valid exp num
                  }
                  //exp
                  else{
                    $ccexpErr = "A kártya már lejárt";
                  }
                }
                //exp
                else {
                  $ccexpErr = "A kártya már lejárt.";
                }




                // if ($expired_check > $now) {
                //   $ccexpErr = "A kártya már lejárt.";
                // }
              }
              else {
                $ccexpErr = "Érvénytelen év";
              }
            }
            else {
              $ccexpErr = "Érvénytelen lejárati dátum";
            }
         }


          //HITELKÁRTYA CVV VALIDÁLÁSA
          $cccvv = test_input($_POST["cccvv"]);
          //Ellenőrzi, hogy a CVV tartalmaz-e 3 vagy 4 számjegyet.
          //Ellenőrzi, hogy a CVV 0 és 9 közötti számjegyet tartalmaz, és nem tartalmaz betűket vagy speciális karaktereket.
          if (preg_match("/^[0-9]{3,4}$/",$cccvv)) {
            //valid
          }
          else{
            $cccvvErr = "Érvénytelen CVV";
          }

          if($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $addressErr == "" && $countryErr == "" && $cityErr == "" && $zipErr == "" && $paymentMethodErr == "" && $ccnameErr == "" && $ccnumErr == "" && $ccexpErr == "" && $cccvvErr == ""){
            $validated = true;
          }
  
      
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
      

    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>VINYLMASTER | Pénztár</title>

    

    <!-- BOOTSTRAP CORE CSS -->

    <link href="checkout/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="checkout/form-validation.css" rel="stylesheet">

  </head>


<body>
      
  <div class="container">
    
    <main>

      <!-- CÍM -->
      <div class="py-5 text-center">
        <h1 class="business-name">VINYLMASTER</h1>
        <h2>Pénztár form</h2>
      </div>


        <!-- KOSARAM  -->
      <div class="row g-3">
        <div class="col-md-5 col-lg-4 order-md-last">

          <!-- KOSARAD / KOSÁR ÉRTÉK -->
          <h4 class="d-flex justify-content-between align-items-center my-cart mb-3">
            <span class="text-muted">Kosarad</span>
            <!-- //KÁRTYA SZÁM -->
            <span class="badge cart-number bg-pink rounded-pill"><?php if(isset($_SESSION['item_quantity'])) {echo $_SESSION['item_quantity'];} else {echo "0";} ?></span>
          </h4>

          <!-- KOSÁRBAN LÉVŐ ELEMEK + VÉGÖSSZEG -->
          <ul class="list-group mb-3">
            <?php
            foreach($_SESSION['shopping_cart'] as $key => $product){
              $Q_fetch__all_products = "SELECT * FROM products";
              $result_product = mysqli_query($conn, $Q_fetch__all_products);

              while($product_row = mysqli_fetch_assoc($result_product)){
                if($product_row['productID'] == $product['id']){
                  ?>

              
              
                  <!-- TERMÉK 1  -->
              <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
                <div >
                  <h6 class="my-0"><?php echo $product_row['albumcim']; ?></h6>
                  <small class="text-muted">x <?php echo $product['quantity']; ?> db</small>
                </div>
                <span class="text-muted price-tag">HUF <?php echo number_format(($product['quantity']  * $product_row['p_price']),2); ?></span>
              </li>
            
            <?php
                }
              }
            
          }//end foreach
            
            ?>

                <!-- VÉGÖSSZEG -->
            <li class="list-group-item d-flex justify-content-between total-row">
              <span>Végösszeg (HUF)</span>
              <strong class="price-tag">HUF <?php echo number_format($_SESSION['total_price'], 2); ?></strong>
            </li>
          </ul>

        </div>

        <!-- ================================================================================= -->

        <!-- SZÁMLÁZÁSI CÍM  -->
        <div class="col-md-7 col-lg-8">

          <h4 class="mb-3 border-bottom-pink">Számlázási cím</h4>
         
         
         
        <form action=
            "
            <?php
              if($validated){
                echo 'ThankYouCheckout.php';
                $validated = false;
              }
              else {
                echo htmlspecialchars($_SERVER["PHP_SELF"]);
              }
            
            ?>"
          class="needs-validation" method="POST">
          <div class="row g-3">


              <!--  KERESZTNÉN MEGADÁSA  -->
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Keresztnév</label>
                <input type="text" class="form-control" name="fname" id="firstName" placeholder="" value="<?php echo $fname; ?>" required>
                <div class="invalid-feedback">
                  Érvényes keresztnév szükséges.
                </div>
                <span class="error"><?php echo $fnameErr;?></span>
              </div>


              <!-- VEZETÉKNÉV MEGADÁSA -->
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Vezetéknév</label>
                <input type="text" class="form-control" name="lname" id="lastName" placeholder="" value="<?php echo $lname; ?>" required>
                <div class="invalid-feedback">
                   Érvényes vezetéknév szükséges.
                </div>
                <span class="error"><?php echo $lnameErr;?></span>
              </div>


              <!-- EMAIL MEGADÁSA  -->
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Opcionális)</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="név@cím.com" value="<?php echo $email; ?>">
                <div class="invalid-feedback">
                  Érvényes emai cím szükséges, hogy naprakész adatokat kapj a szállítással kapcsolatban.
                </div>
                <span class="error"><?php echo $emailErr;?></span>
              </div>


              <!-- CÍM MEGADÁSA -->
              <div class="col-12">
                <label for="address" class="form-label">Cím</label>
                <input type="text" class="form-control" id="address" name="address_checkout" placeholder="Utcanév 1234" value="<?php echo $address; ?>" required>
                <div class="invalid-feedback">
                  Szállítási cím szükséges.
                </div>
                <span class="error"><?php echo $addressErr;?></span>
              </div>


              <!-- ORSZÁG VÁLASZTÁSA  -->
              <div class="col-md-5">
                <label for="country" class="form-label">Ország</label>
                <select class="form-select" name="country" id="country" required>
                  <option value="Mauritius">Mauritius</option>
                </select>
                <!-- <div class="invalid-feedback">
                  Érvényes ország szükséges.
                </div>
                <span class="error"><?php //echo $countryErr;?></span> -->
              </div>


              <!-- VÁROS VÁLASZTÁSA  -->
              <div class="col-md-4">
                <label for="state" class="form-label">Város</label>
                <select class="form-select" name="city" id="state" required>
                  <option value="Port Louis">Port Louis</option>
                  <option value="Curepipe">Curepipe</option>
                  <option value="Quatre Bornes">Quatre Bornes</option>
                  <option value="Vacoas">Vacoas</option>
                  <option value="Rose Hill">Rose Hill</option>
                  <option value="Flic En Flac">Flic En Flac</option>
                  <option value="Phoenix">Phoenix</option>

                </select>
                <div class="invalid-feedback">
                  Érvényes város szükséges.
                </div>
                <span class="error"><?php echo $cityErr;?></span>
              </div>


              <!-- IRÁNYÍTÓSZÁM MEGADÁSA -->
              <div class="col-md-3">
                <label for="zip" class="form-label">Irányítószám</label>
                <input type="text" class="form-control" name="zip" value="<?php echo $zip; ?>" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Irányítószám szükséges.
                </div>
                <span class="error"><?php echo $zipErr;?></span>
              </div>
            </div>

            <hr class="my-4 pinkLine">


            <!-- CÍM CHECKBOX -->
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="address_check" id="same-address">
              <label class="form-check-label" for="same-address">A szállítási cím ugyanaz, mint a számlázási cím</label>
            </div>


            <hr class="my-4 pinkLine">


            <!-- FIZETÉSI MÓD -->
            <h4 class="mb-3">Fizetés módja</h4>


            <!-- KREDIT KÁRTYA  -->
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" value="creditCard" <?php if ($paymentMethod == "creditCard"){ echo "checked";} ?> >
                <label class="form-check-label" for="credit">Kredit kártya</label>
              </div>

              <!-- MCB JUICE  -->
              <div class="form-check">
                <input id="mcbjuice" name="paymentMethod" type="radio" class="form-check-input" value="JuiceByMCB" <?php if ($paymentMethod == "JuiceByMCB"){ echo "checked";} ?> >
                <label class="form-check-label" for="mcbjuice">Juice by MCB</label>
              </div>

              <!-- PAYPAL  -->
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" value="paypal" <?php if ($paymentMethod == "paypal"){ echo "checked";} ?> >
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>

              <span class="error"><?php echo $paymentMethodErr;?></span>
            </div>

            

            <!-- KREDIT KÁRTYA ADATOK  -->
            <div class="row gy-3">

              <!-- NÉV A KÁRTYÁN  -->
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Kártyán szereplő név</label>
                <input type="text" class="form-control" name="ccname" id="cc-name" placeholder="" value="<?php echo $ccname; ?>" required>
                <small class="text-muted">Teljes név, ahogyan a kártyán látható</small>
                <div class="invalid-feedback">
                A kártyán szereplő név szükséges
                </div>
                <span class="error"><?php echo $ccnameErr;?></span>
              </div>


              <!-- KREDIT KÁRTYA SZÁM  -->
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Kredit kártya szám</label>
                <input type="text" class="form-control" name="ccnum" id="cc-number" placeholder="" value="<?php echo $ccnum; ?>" required>
                <div class="invalid-feedback">
                Hitelkártyaszám szükséges
                </div>
                <span class="error"><?php echo $ccnumErr;?></span>
              </div>


              <!-- LEJÁRATI DÁTUM  -->
              <div class="col-md-6">
                <label for="cc-expiration" class="form-label">Lejár</label>
                <div class="" style="display: flex;">
                  <input type="text" class="form-control" name="ccexp_m" id="cc-expiration-mm" placeholder="mm" value="<?php echo $ccexp_m; ?>" required>
                  <input type="text" class="form-control" style="margin-left: 1rem;" name="ccexp_y" id="cc-expiration-yy" placeholder="yyyy" value="<?php echo $ccexp_y; ?>" required>
                </div>
                <div class="invalid-feedback">
                  Lejárati dátum szükséges
                </div>
                <span class="error"><?php echo $ccexpErr;?></span>
              </div>


              <!-- CVV BIZTONSÁGI KÓD  -->
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" name="cccvv"id="cc-cvv" placeholder="" value="<?php echo $cccvv; ?>" required>
                <div class="invalid-feedback">
                  Biztonsági kód szükséges
                </div>
                <span class="error"><?php echo $cccvvErr;?></span>
              </div>
            </div>


            <!-- TOVÁBB A PÉNZTÁRHOZ GOMB  -->
            <hr class="my-4 pinkLine" >
            
            <button class="w-100 btn btn-primary btn-lg button" type="submit">Tovább a pénztárhoz</button>
            
            <a href="index.php" class="w-30 btn btn-primary btn-lg button mt-3 cancel">Mégse</a>

            <!-- <button class="w-30 btn btn-primary btn-lg button mt-3 cancel">Mégse</button> -->
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2024 VINYLMASTER</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Adatkezelési tájékoztató</a></li>
        <li class="list-inline-item"><a href="#">Felhasználói feltételek</a></li>
        <li class="list-inline-item"><a href="#">Támogatás</a></li>
      </ul>
    </footer>
  </div>


      <script src="checkout/bootstrap.bundle.min.js"></script>
      <script src="checkout/form-validation.js"></script>

  </body>
</html>
