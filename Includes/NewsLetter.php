<?php include "./AdditionalPHP/checkAccess.php"; ?>

<head>
    <script defer src="validateNewsletterInput.js"></script>
</head>

<section class="newsletter newsletter-section" id="subscribed">
    <div id="subscribe-section" class="newsletter__container bd-grid">
        <div class="newsletter__subscribe subtitle">
            <h2 class="section-title">HÍRLEVÉL</h2>
            <p class="newsletter__description">Légy az első, aki értesül a legjobb ajánlatainkról!</p>
            
            <form id="newsletterForm" class="newsletter__form" method="POST" action="validateNewsletterInput.php">
                <input id="mail" class="newsletter__input" name="mail" required type="mail" placeholder="Add meg az Email címedet"/>
                
                <div class="subscribe-button-container">
                    <span><button id="subscribe" class="subscribe-button" name="subscribe" type="submit">FELIRATKOZOM</button></span>
                </div>
            </form>
            
            <br>
            <span id="errorMessage" class="send-input-message"></span>
        </div>
    </div>
</section>