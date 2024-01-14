<?php include "./AdditionalPHP/checkAccess.php"; ?>

<header class="main-header">
    <nav class="main-nav">

        <input type="checkbox" id="check">
        
        <label for="check" class="checkbtn">
            <i class="fas fa-bars animate__animated animate__backInDown"></i>
        </label>

        <h1 class="business-name"><a href="index.html" class="animate__animated animate__backInDown">VINYLMASTER</a></h1>

        <ul>
            <li><a href="index.php" class="<?php if($page == 'index'){echo 'active';}?>" href="index.php">KEZDŐOLDAL</a></li>
            <li><a href="products.php" class="<?php if($page == 'products'){echo 'active';}?>" href="products.php">TERMÉKEK</a></li>
            <li><a href="makeyourcake.php" class="<?php if($page == 'makeyourcake'){echo 'active';}?>" href="makeyourcake.php">KÉSZÍTS SAJÁT BAKELITET</a></li>
            <li><a href="about.php" class="<?php if($page == 'about'){echo 'active';}?>" href="about.php">RÓLUNK</a></li>
            <li><a href="contact.php" class="<?php if($page == 'contact'){echo 'active';}?>" href="contact.php">KAPCSOLATFELVÉTEL</a></li>
        </ul>
    </nav>
</header>