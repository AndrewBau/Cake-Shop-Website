// Beállítjuk a dátumot a visszaszámoláshoz
var countDownDate = new Date("Jan 1, 2021 00:00:00").getTime();

// Minden másodperben frissíti a visszaszámolást
var x = setInterval(function() {

  // Mai dátum és idő
  var now = new Date().getTime();
    
  // Maradék időt adja vissza
  var distance = countDownDate - now;
    
  // Kalkulált idő nap, óra, perc, másodpercben
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Visszaadja az eredményt itt id="demo"
  document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // Ha lejárt az idő kiír valamit
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "END OF SALES";
  }
}, 1000);