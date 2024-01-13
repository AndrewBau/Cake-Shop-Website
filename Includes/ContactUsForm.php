<?php include "./AdditionalPHP/checkAccess.php"; ?>

<head>
    <script defer src="validateContactInput.js"></script>
</head>

<div id="contact-submission" class="contact-section">
    <div class="contact-us">
        <div class="subtitle">
            <h2>KAPCSOLATFELVÉTEL</h2>
            <p>Cégünk a legjobb, ismerd meg a kreatív csapatunkat, amely sosem alszik. Mondj valamit nekünk, mi válaszolunk Neked.</p>
            <span class="send-input-message"></span>
            <span id="sendError" class="input-error"></span>
        </div>

        <form id="contactForm" method="POST" >
            <label for="customerName">NÉV <em>&#x2a;</em></label>
            <span id="nameError"class="input-error"></span>
            <input id="customerName" name="customerName" required type="text" />

            <label for="customerEmail">EMAIL <em>&#x2a;</em></label>
            <span id="emailError" class="input-error"></span>
            <input id="customerEmail" name="customerEmail" required type="email" />

            <label for="customerPhone">TELEFON</label>
            <span id="phoneError" class="input-error"></span>
            <input id="customerPhone" name="customerPhone" type="tel"/>
            
            <label for="orderNumber">MEGRENDELŐ SZÁM</label>
            <input id="orderNumber" name="orderNumber" type="text" />
            
            <label for="customerNote">ÜZENETED <em>&#x2a;</em></label>
            <span class="input-error"></span>
            <textarea id="customerNote" name="customerMessage" required rows="4"></textarea>
            <br>

            <div class="push-button">
                <span><button id="submit" name="submit">KÜLDÉS</button></span>
            </div>
        </form>
    </div>
</div>