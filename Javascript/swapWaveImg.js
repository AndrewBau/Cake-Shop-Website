let waveImg = document.getElementsByClassName("wavy");

function myFunction(x) {
    if (x.matches) { // Ha van eredmény a lekérdezésnél
        waveImg.src = "Assets/images/1.index/NavBar_WavePink1000.png";
    } else {
        waveImg.src = "Assets/images/1.index/NavBar_WavePink.png";
    }
  }
  
  var x = window.matchMedia("(min-width: 1200px)")
  myFunction(x) // Meghívja a listener függvényt futásidőben
  x.addEventListener(myFunction) // Listener függvény csatolása az állapotváltozásokhoz