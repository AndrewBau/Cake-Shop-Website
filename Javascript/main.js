//bármikor újratöltjük ezt az oldalt, ez meg lesz hívva
onLoadCartNumbers();

let carts = document.querySelectorAll('.featured__new_cart');
//Eseményfigyelőt hoz létre az összes bevásárlókosár ikonhoz.
for(let i=0; i<carts.length; i++){
    carts[i].addEventListener('mousedown', () => {
        cartNumbers();
       
    });

}
//for id sharing
// let submit_button = document.getElementById('submit_btn');
// submit_button.addEventListener('mousedown', id_pass());

// let add-to-cart-button = document.getElementById('add-to-cart-btn');
// add-to-cart-button.addEventListener('mousedown', id_pass());

//Funkció, amely megakadályozza, hogy a kosár számjelző visszaálljon nullára az újratöltéskor
function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    console.log("entered on load function");
    if(productNumbers) {
        document.querySelector('.cart-number').textContent = productNumbers;
        document.querySelector('.cart-number-mob').textContent = productNumbers;
        console.log("entered on load function inside if");
    }
}
//Függvény a 'Kosár' ikonra teszi a 'Hozzáadás a kosárhoz' a navigáció-sávban.
function cartNumbers() {
    console.log("entered cartNumbers");
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);


    if(productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers+1);
        document.querySelector('.cart-number').textContent = productNumbers;
        document.querySelector('.cart-number-mob').textContent = productNumbers;
        console.log("entered if");
    }
    else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart-number').textContent = 1;
        document.querySelector('.cart-number-mob').textContent = 1;
        console.log("entered else");
    }
}

//bármikor újratöltjük ezt az oldalt, ez meg lesz hívva
onLoadCartNumbers();


// var product_id = document.getElementById('product_id_js').value;

//function to pass id
// function id_pass(){
//     let pass = localStorage.getItem('pass_id');
//     // pass = parseInt(pass);

    
//     if(pass) {
        
//         // document.querySelector('.show_id').value = pass;
//         document.getElementById('form-pd').action = "product.php?action=add&id=" + pass;
//         console.log("entered if");
//     }
//     else {
//         var product_id = document.getElementById('product_id_js').value;
//         localStorage.setItem('pass_id', product_id);
//         // document.querySelector('.show_id').value = product_id;
//         document.getElementById('form-pd').action = "product.php?action=add&id=" + product_id;
//         console.log("entered else");
//     }
// }

// id_pass();