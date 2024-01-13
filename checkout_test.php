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
        if (!preg_match("^[0-9a-zA-Z\s,-]+$",$address)) {
        $addressErr = "Érvénytelen cím";
        }

        //ORSZÁG VALIDÁLÁSA
        $country = test_input($_POST["country"]);
        // ellenőrzi, hogy country == mauritius
        if ($country != "Mauritius" || $country != "mauritius" ) {
        $addressErr = "Elnézést, de csak Mauritiusba szállítunk.";
        }

        //VÁROS VALIDÁLÁSA
        $city = test_input($_POST["city"]);
        // ellenőrzi, hogy city == options
        if ($city != "PortLouis" || $city != "Curepipe" || $city != "Vacoas" || $city != "QuatreBornes" || $city != "RoseHill" || $city != "FlicEnFlac" || $city != "Phoenix") {
        $cityErr = "Érvénytelen város";
        }

        //ZIP VALIDÁLÁSA
        $zip = test_input($_POST["zip"]);
        // ellenőrzi, hogy az irányítószám pontosan 5 számjegyet tartalmaz.
        if (!preg_match("^[0-9]{5}",$zip)) {
        $zipErr = "Érvénytelen irányítószám";
        }
    
        //FIZETÉSI METÓDUS VALIDÁLÁSA
        $paymentMethod = test_input($_POST["paymentMethod"]);

        //REGEX KÁRTYATÍPUS ALAPJÁN
        $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/"
        
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
        if (!preg_match($cardtype['visa'],$ccnum) || !preg_match($cardtype['mastercard'],$ccnum)) {
        $ccnumErr = "Érvénytelen kártyaszám
        <br>
       Elnézést! Jelenleg a rendszerünk a VISA és MasterCard kártyákat támogatja.";
        }


        //HITELKÁRTYA LEJÁRATI DÁTUM VALIDÁLÁSA
        if (empty($_POST["ccexp_m"]) || empty($_POST["ccexp_y"])) {
        $ccexpErr = "Kérlek add meg a lejárati dátumot.";
        } 
        else {
            $ccexp_m = test_input($_POST["ccexp_m"]);
            $ccexp_y = test_input($_POST["ccexp_y"]);

            //VALIDÁLJA A HÓNAPOT
            if((int)$ccexp_m > 0 && (int)$ccexp_m < 13){
                //VALIDÁLJA AZ ÉVET
                if((int)$ccexp_y > 1900 && (int)$ccexp_y < 4000){
                $expires = \DateTime::createFromFormat('my', $ccexp_m.$ccexp_y);
                $now = new \DateTime();
                //ELLENŐRZI, HOGY LEJÁRT-E
                if ($expired < $now) {
                    $ccexpErr = "A kártya már lejárt";
                }
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
        if (!preg_match("^[0-9]{3, 4}$",$cccvv)) {
            $cccvvErr = "Érvénytelen CVV";
        }

        if($fnameErr = $lnameErr = $emailErr = $addressErr = $countryErr = $cityErr = $zipErr = $paymentMethodErr = $ccnameErr = $ccnumErr = $ccexpErr = $cccvvErr = ""){
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

