<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>VINYLMASTER | Fizetés</title>

    

    <!-- BOOTSTRAP CORE CSS -->
<!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
  <link href="form-validation.css" rel="stylesheet">

</head>


<body>
      
  <div class="container">
    
    <main>

      <!-- CÍM -->
      <div class="py-5 text-center">
        <h1 class="business-name">VINYLMASTER</h1>
        <h2>Megrendelés</h2>
      </div>


        <!-- KOSÁR  -->
      <div class="row g-3">
        <div class="col-md-5 col-lg-4 order-md-last">

          <!-- KOSÁR / KOSÁR TARTALMA  -->
          <h4 class="d-flex justify-content-between align-items-center my-cart mb-3">
            <span class="text-muted">Kosár</span>
            <span class="badge cart-number bg-pink rounded-pill">3</span>
          </h4>

          <!-- KOSÁR TARTALMA LISTÁZVA + TOTAL -->
          <ul class="list-group mb-3">

                <!-- TERMÉK 1  -->
            <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
              <div >
                <h6 class="my-0">Termék neve</h6>
                <small class="text-muted">Termék rövid leírása</small>
              </div>
              <span class="text-muted price-tag">2500 Ft</span>
            </li>

                <!-- TERMÉK 2 -->
            <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
              <div>
                <h6 class="my-0">Második termék</h6>
                <small class="text-muted">Termék rövid leírása</small>
              </div>
              <span class="text-muted price-tag">2500 Ft</span>
            </li>

                <!-- TERMÉK 3 -->
            <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
              <div>
                <h6 class="my-0">Harmadik termék</h6>
                <small class="text-muted">Termék rövid leírása</small>
              </div>
              <span class="text-muted price-tag">4000 Ft</span>
            </li>
          

                <!-- TOTAL -->
            <li class="list-group-item d-flex justify-content-between total-row">
              <span>Total (Ft)</span>
              <strong class="price-tag">9000 Ft</strong>
            </li>
          </ul>

        </div>

        <!-- ================================================================================= -->

        <!-- SZÁMLÁZÁSI CÍM  -->
        <div class="col-md-7 col-lg-8">

          <h4 class="mb-3 border-bottom-pink">Számlázási cím</h4>
         
         
         
          <form class="needs-validation" novalidate>
            <div class="row g-3">


              <!-- KERESZTNÉV  -->
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Keresztnév</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Kötelező kitölteni.
                </div>
              </div>


              <!-- VEZETÉKNÉV -->
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Vezetéknév</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Kötelező kitölteni.
                </div>
              </div>


              <!-- USERNAME  -->
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                  <span class="input-group-text bg-pink">@</span>
                  <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback">
                    Kötelező kitölteni.
                  </div>
                </div>
              </div>


              <!-- EMAIL  -->
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Nem kötelező)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  A kézebsítési üzenetek kézbesítéséhez érvényes emailcím szükséges.
                </div>
              </div>


              <!-- CÍM -->
              <div class="col-12">
                <label for="address" class="form-label">Cím</label>
                <input type="text" class="form-control" id="address" placeholder="Utca házszám" required>
                <div class="invalid-feedback">
                  Kötelező kitölteni.
                </div>
              </div>


              <!-- ORSZÁG  -->
              <div class="col-md-5">
                <label for="country" class="form-label">Ország</label>
                <select class="form-select" id="country" required>
                  <option value="">Válasszon...</option>
                  <option>Magyarország</option>
                </select>
                <div class="invalid-feedback">
                  Kötelező kitölteni.
                </div>
              </div>


              <!-- VÁROS  -->
              <div class="col-md-4">
                <label for="state" class="form-label">Város</label>
                <select class="form-select" id="state" required>
                  <option value="">Válasszon...</option>
                  <option>Budapest</option>
                </select>
                <div class="invalid-feedback">
                  Kötelező kitölteni.
                </div>
              </div>


              <!-- IRÁNYÍTÓSZÁM -->
              <div class="col-md-3">
                <label for="zip" class="form-label">Irányítószám</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Kötelező kitölteni.
                </div>
              </div>
            </div>

            <hr class="my-4 pinkLine">


            <!-- CÍM CHECKBOX -->
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="same-address">
              <label class="form-check-label" for="same-address">A szállítási cím megegyezik a számlázási címmel</label>
            </div>


            <hr class="my-4 pinkLine">


            <!-- Fizetési mód -->
            <h4 class="mb-3">Fizetési mód</h4>


            <!-- BANKKÁRTYA  -->
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Bankkártya</label>
              </div>

              <!-- MCB JUICE  -->
              <div class="form-check">
                <input id="mcbjuice" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="mcbjuice">Juice by MCB</label>
              </div>

              <!-- PAYPAL  -->
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
            </div>

            <!-- CREDIT CARD DETAILS  -->
            <div class="row gy-3">

              <!-- NAME ON CARD  -->
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Kártyán szereplő név</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Teljes kártyán szereplő név</small>
                <div class="invalid-feedback">
                  Kötelező kitölteni.
                </div>
              </div>


              <!-- KÁRTYASZÁM  -->
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Kártyaszám</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Kötelező kitölteni.
                </div>
              </div>


              <!-- LEJÁRATI DÁTUM  -->
              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Lejárati dátum</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                    Kötelező kitölteni.
                </div>
              </div>


              <!-- CVC2 SECURITY CODE  -->
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVC</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                    Kötelező kitölteni.
                </div>
              </div>
            </div>


            <!-- FOLYTATATÁS A CHECKOUT GOMBHOZ  -->
            <hr class="my-4 pinkLine" >

            <button class="w-100 btn btn-primary btn-lg button" type="submit">Megrendelés véglegesítése</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2024 Vinylmasters</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Adatkezelési tájékoztató</a></li>
        <li class="list-inline-item"><a href="#">Felhasználási feltételek</a></li>
        <li class="list-inline-item"><a href="#">Támogatás</a></li>
      </ul>
    </footer>
  </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
