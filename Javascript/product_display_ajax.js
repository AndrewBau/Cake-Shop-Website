
                //KATEGÓRIÁK FÜGGVÉNY - MEGJELENÍTÉS BETÖLTÉS NÉLKÜL
                function display_products_by_cat_id(cat_id, cat_name){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "category_search.php?cat_id="+cat_id, true);
                    xhttp.send();   
                    console.log('sent');

                    //CIM VÁLTOZTATÁSA
                    document.getElementById('small_title').innerHTML = 'KATEGÓRIA';
                    document.getElementById('big_title').innerHTML = cat_name;
                    
                }

                //SORBATESZI A FÜGGVÉNY - MEGJELENÍTÉS BETÖLTÉS NÉLKÜL, AMIKOR AZ AZONOSÍTÓ EGYEZIK AZ EREDMÉNNYEL
                function sortby_products(sort_num){
                    var xhttp;
                      //AJAX
                      console.log('entered ajax sortby');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready sortby');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "sortby_search.php?sortby="+sort_num, true);
                    xhttp.send();   
                    console.log('sent sortby');

                    //MEGVÁLTOZTATJA A CÍMET
                    document.getElementById('small_title').innerHTML = 'SORT BY PRICE';

                    if(sort_num == 1){
                        document.getElementById('big_title').innerHTML = 'low to high';
                    }
                    else if(sort_num ==2){
                        document.getElementById('big_title').innerHTML = 'high to low';
                    }
                    
                }


                //TERMÉK TÍPUSOK FUNCTION - MEGJELENÍTÉS BETÖLTÉS NÉLKÜL, AMIKOR AZ AZONOSÍTÓ EGYEZIK AZ EREDMÉNNYEL
                function display_products_by_type(p_type){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "products_by_type_search.php?p_type="+p_type, true);
                    xhttp.send();   
                    console.log('sent');

                    //CÍM VÁLTOZTATÁS

                    if(p_type==1){
                        document.getElementById('small_title').innerHTML = 'new';
                    }
                    else  if(p_type==2){
                        document.getElementById('small_title').innerHTML = 'featured';
                    }
                    else  if(p_type==3){
                        document.getElementById('small_title').innerHTML = 'sales';
                    }
                    else  if(p_type==4){
                        document.getElementById('small_title').innerHTML = 'best-seller';
                    }

                    //NAGY CÍM
                    document.getElementById('big_title').innerHTML = 'TERMÉKEK';
                    
                }

                  
                //TERMÉK TÍPUSOK FUNCTION - MEGJELENÍTÉS BETÖLTÉS NÉLKÜL, AMIKOR AZ AZONOSÍTÓ EGYEZIK AZ EREDMÉNNYEL
                function display_products_by_type_second(p_type){
                    var xhttp;
                   
                    //AJAX
                    console.log('entered ajax');
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log('ready');
                            document.getElementById("result2").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "products_by_type_search.php?p_type="+p_type, true);
                    xhttp.send();   
                    console.log('sent');

                    //CÍM VÁLTOZTATÁS

                    if(p_type==1){
                        document.getElementById('small_title2').innerHTML = 'new';
                    }
                    else  if(p_type==2){
                        document.getElementById('small_title2').innerHTML = 'featured';
                    }
                    else  if(p_type==3){
                        document.getElementById('small_title2').innerHTML = 'sales';
                    }
                    else  if(p_type==4){
                        document.getElementById('small_title2').innerHTML = 'best-seller';
                    }

                    //NAGY CÍM
                    document.getElementById('big_title2').innerHTML = 'PRODUCTS';
                    
                }

