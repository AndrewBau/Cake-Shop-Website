<?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fnameCriteria = "";
    $lnameCriteria = "";
    $addressCriteria = "";
    $phoneCriteria = "";
    $currentPasswordCriteria = "";
    $newPasswordCriteria = "";
    $confirmPasswordCriteria = "";
    $delPasswordCriteria = "";

    $updateMessage = "";
    $passwordMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['updateProfile'])){
            $fnameOK = false;
            $lnameOK = false;
            $addressOK = false;
            $phoneOK = false;

            if (empty($_POST["fname"])) {
                $fnameCriteria = "Add meg a keresztneved!";
            } else {
                $fname = test_input($_POST["fname"]);
                // leellenőrzi, hogy csak betűket és space-t tartalmaz
                if (!preg_match("/^[a-z A-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ]*$/", $fname)) {
                    $fnameCriteria = "Csak betű és szóköz használata megengedett!";
                }
                else
                {
                    $fnameOK = true;
                }
            }

            if (empty($_POST["lname"])) {
                $lnameCriteria = "Add meg a vezetékneved!";
            } else {
                $lname = test_input($_POST["lname"]);
                // leellenőrzi, hogy csak betűket és space-t tartalmaz
                if (!preg_match("/^[a-z A-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ]*$/", $lname)) {
                    $lnameCriteria = "Csak betű és szóköz használata megengedett!";
                }
                else
                {
                    $lnameOK = true;
                }
            }

            if (empty($_POST["address"])) {
                $addressCriteria = "Add meg a címed!";
            } else {
                $address = test_input($_POST["address"]);
                $addressOK = true;
            }

            if (empty($_POST["phone"])) {
                $phoneCriteria = "Add meg a telefonszámod szóközök nélkül, például: 06201234567!";
            } else {
                $phone = test_input($_POST["phone"]);

                if (!preg_match("/^06(20|30|70|1[0-7])\d{7}$/", $phone)) {
                    $phoneCriteria = "Kérem, adjon meg egy érvényes telefonszámot szóközök nélkül, például: 06201234567!";
                }
                else
                {
                    $phoneOK = true;
                }   
            }

            if (!empty($_POST["description"])) {
                $description = test_input($_POST["description"]);
            }

            if($fnameOK == true && $lnameOK == true && $addressOK == true && $phoneOK == true)
            {
                $sql = "UPDATE user SET fname='$fname', lname='$lname', address='$address', phone='$phone', description='$description' WHERE uname='$uname'";

                if(mysqli_query($conn, $sql))
                {
                    $updateMessage = '<i class="fas fa-check-square"></i>&nbsp&nbspElem frissítve!';
                }
                else {
                    $updateMessage = "Hiba az elem frissítésekor. Kérem próbálja újra később.";
                }
            }
        } else if(isset($_POST['revertProfile'])){
            Header('Location: '.$_SERVER['PHP_SELF']);

        } else if(isset($_POST['updatePassword'])){
            if (empty($_POST["currentPassword"])) {
                $currentPasswordCriteria = "Üres a jelszó-mező!";
            } else {
                $currentPassword = test_input($_POST["currentPassword"]);

                if(password_verify($currentPassword, $password)){

                    $newPassword = $_POST['newPassword'];
                    $confirmPassword = $_POST['confirmPassword'];

                    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $newPassword)) {
                        $newPasswordCriteria = 'A jelszó nem megfelelő';
                    } else if (!($newPassword == $confirmPassword))
                    {
                        $confirmPasswordCriteria = 'A jelszavak nem egyeznek';
                    } else {
                        $passHash = password_hash($newPassword, PASSWORD_BCRYPT);

                        $sql = "UPDATE user SET pass='$passHash' WHERE uname='$uname'";
                        if(mysqli_query($conn, $sql)){
                            $passwordMessage = "Password Updated!";
                            include "logout.php";
                            header("Location: login.php");
                        }
                    }
                }
                else
                {
                    $currentPasswordCriteria = "A jelenlegi jelszó nem megfelelő!";
                }
            }
        } else if(isset($_POST['clearPassword'])){
            $_POST['currentPassword'] = "";
            $_POST['newPassword'] = "";
            $_POST['confirmPassword'] = "";

        } else if(isset($_POST['deleteAccount'])){
            if (empty($_POST["delPassword"])) {
                $delPasswordCriteria = "Üres a jelszó-mező!";
            } else {
                $delPassword = test_input($_POST["delPassword"]);

                if(password_verify($delPassword, $password)){
                    $sql = "DELETE FROM user WHERE uname='$uname'";

                    if(mysqli_query($conn, $sql)){
                        include "logout.php";
                        header("Location: index.php");
                    }
                }
                else
                {
                    $delPasswordCriteria = "Helytelen jelszó";
                }
            }
        }
    }
?>