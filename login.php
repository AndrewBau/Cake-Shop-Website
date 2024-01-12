<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<?php
    include "connection.php";

    $uname = $password= "";
    $errCriteria = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ((empty($_POST['uname'])) || (empty($_POST['password']))){
            $errCriteria = "Incorrect Username or Password!";
        } else {
            $uname = test_input($_POST['uname']);
            $password = test_input($_POST['password']);

            // select row
            $sql = "SELECT * FROM user WHERE uname='$uname'";
            $result= mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);

                // csekkoljuk, hogy validált emailcíme van-e
                if($row['verified'] == 1)
                {
                    setcookie("thankYouCookie", "verificationEmailSent", time() - 3600);
                    setcookie("verifiedEmailCookie", "emailInvalid", time() - 3600);
                    setcookie("resetPassword","resetMailSent", time() - 3600);
                    // hashelt passok egyeznek-e
                    if(password_verify($password, $row['pass']))
                    {
                        include "./AdditionalPHP/startSession.php";

                        // sessionebn tároljuk a user adatot
                        $_SESSION['uname'] = $row['uname'];
                        $_SESSION['isAdmin'] = $row['isAdmin'];

                        header('location: checkAccount.php');
                    } else {
                        $errCriteria = "Incorrect Username or Password!";
                    }
                }
                else if(isset($_COOKIE['verifiedEmailCookie']))
                {
                    if(password_verify($password, $row['pass'])){

                        include "./AdditionalPHP/startSession.php";

                        $vkey = md5(time().$uname);

                        $sql = "UPDATE user SET vkey = '$vkey' WHERE uname = '$uname'";

                        if(mysqli_query($conn, $sql)){

                            $to = $row['email'];
                            $subject = "Email Verification";
                            $message = "<a href='http://localhost/MyFiles/CakeShop/verifyEmail.php?vkey=$vkey'>Register Account</a>";
                            $headers = "From: malako.cakeshop@gmail.com \r\n";
                            $headers .= "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
                            mail($to, $subject, $message, $headers);

                            setcookie("thankYouCookie", "verificationEmailSent");
                            setcookie("verifiedEmailCookie", "emailInvalid", time() - 3600);
                            header('location: thankYouRegistration.php');

                        }
                    } 
                    else {
                        $errCriteria = "Helytelen felhasználónév vagy jelszó!";
                    }
                }
                else
                {
                    $errCriteria = "Kérjük, erősítse meg az e-mail címét, mielőtt bejelentkezik!.";
                }
            } else {
                $errCriteria = "Helytelen felhasználónév vagy jelszó!";
            }
        }
        
      }
      
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>


<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>VINYLMASTER | BEJELENTKEZÉS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <title>VINYLMASTER | Bejelentkezés</title>
    </head>

    <body>
        <?php $page = 'login';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <!--Start Background Image-->
        <div class="bg-image-container">
            <div class="bg-image"></div>
        </div>
        <!--End Background Image-->

        
        <!--Start Login Panel-->
        <div class="login-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>BEJELENTKEZÉS</h3>
                        <p>Kérjük, adja meg az azonosítóit a bejelentkezéshez.</p>
                    </div>
                </div>

                <form class="login-form" method="post" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="text" name="uname" placeholder="Felhasználónév" value="<?php echo $uname;?>"/>
                    <input type="password" name="password" placeholder="Jelszó"/>
                    <span class="Password-Error"><?php if($errCriteria != ""){echo "$errCriteria <br><br>";}?></span>
                    
                    <button>bejelentkezés</button>
                    <p class="message">Nem regisztrált? <a href="registration.php">Fiók létrehozása</a></p>
                    <br><span class="forget-text"><a href="forgetPassword.php">Elfelejtette jelszvaát?</a></span>
                    <!-- <p class="or-message"><b>OR</b></p> -->
                </form>

                <!-- <div class="social-login">
                    <span class="login-text">Login with: </span>
                    <span><a><i class="fab fa-facebook-f"></i></a></span>
                    <span><a><i class="fab fa-twitter"></i></a></span>
                    <span><a><i class="fab fa-google-plus-g"></i></a></span>
                </div> -->
            </div>
        </div>
        <!--End Login Panel-->

    </body>
</html>