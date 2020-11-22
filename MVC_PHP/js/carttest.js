function createCartItem(name, price, quantity, prodid) {
  let wrapper = document.createElement('div');
  wrapper.setAttribute('data-prodid', prodid);
  price=Number(price);
  wrapper.innerHTML = `
  <h3 class="cart_prodname">${name}</h3>
  <input type="number" data-quantity="${quantity}" class="cart_quantity" value="${quantity}">
  <button class="cart_delete">Törlés</button>
  <span class="cart_fullprice">${price} Ft</span>
  `;

  return wrapper;
}

let cartWrapper = document.getElementById('cartWrapperItems');
let checkoutButton = document.getElementById('checkout');
let showCartButton = document.getElementById('showCart');
let cartContainer=document.getElementById('cart');
showCartButton.addEventListener('click', function () {
  if (cartContainer.style.display == "none")
    cartContainer.style.display = 'block';
  else
    cartContainer.style.display = 'none';
});

document.body.addEventListener('click',function(e){
  let itsCart=false;
  e.composedPath().forEach(function(el){
    if (el.id=="cart" || el.id=="showCart")
      itsCart=true;
  });

  if (!itsCart)
    cartContainer.style.display="none";
});



function bake_cookie(name, value) {
  var cookie = [name, '=', JSON.stringify(value), '; path=/; max-age=2100;'].join('');
  document.cookie = cookie;
}

function read_cookie(name) {
 var result = document.cookie.match(new RegExp(name + '=([^;]+)'));
 result && (result = JSON.parse(result[1]));
 return result;
}

let cartItems = read_cookie("cart")===null ? new Array() : read_cookie("cart");
let elements = document.getElementsByClassName('addtocart');
for(i = 0; i<elements.length; i++) {
  elements[i].addEventListener("click", addToCart )
}

function addToCart() {
  let quantity =  event.target.previousSibling;
  let prodid=event.target.parentNode.lastChild.getAttribute("data-prodid");
  let price = event.target.parentElement.getElementsByClassName('productPrice')[0];//[0];
  let id=parseInt(event.target.parentNode.getAttribute('id'));//[0]);
  let name  = event.target.parentNode.firstChild.innerHTML;
  let max = parseInt(quantity.max);
  let value = parseInt(quantity.value);

  if (!isNaN(value) && value>0) {

      let temp = true;
      for(i = 0; i<cartItems.length; i++) {
          if (cartItems[i]["name"] === name) {
              let sum = cartItems[i]["quantity"] + value;

              if(value > max || sum > max) {
                temp = false;

                alert("Nincs ennyi a készleten.");
              }
              else{
                cartItems[i]["quantity"] = parseInt(cartItems[i]["quantity"]) + value;
                temp = false;
                bake_cookie("cart", cartItems);
          }
      }
    }
      if(temp && !(value > max)) {
        cartItems.push({
          "quantity" : value,
          "name" : name,
          "id" : id,
          "prodid" : prodid,
        });
        bake_cookie("cart", cartItems);
    }
  }
      
  for (i = 0; i<cartItems.length; i++) {
    item = createCartItem(cartItems[i]["name"], price.innerHTML*cartItems[i]["quantity"], cartItems[i]["quantity"],  prodid);
    if(cartItems.includes(item)){
      console.log("cartItems[i]:"+cartItems[i]["name"]);
      console.log("bip!");
    }else{
    cartWrapper.append(item);
    }
    //changeQuantity();
    //deleteItem();
  }


  /* törlés bugos
  function deleteItem(item,prodid){
    document.querySelector(`div[data-prodid="${prodid}"] .cart_delete`).addEventListener('click', function () {
      removeFromCart(item.getAttribute(prodid));
      item.remove();
    });
  }
  function removeFromCart(id, decreaseVal) {
		if (cartItems[id]) {
			cartItems[id] = cartItems[id] - decreaseVal;
			if (cartItems[id] < 0)
				delete cartItems[id];
		}
  }*/


  /*mennyiségváltoztatás kosárban bugos
  let cartItemQuantity= document.querySelector(`div[data-prodid="${prodid}"] .cart_quantity`);
  cartItemQuantity.addEventListener('change', function () {
    let quantityValue = cartItemQuantity.value;
    console.log(quantityValue);
    price=price*quantityValue;
  });*/



}

//document.getElementBaClassName(".cart_delete").addEventListener("click", function(){
 // let deleteButton=document.getElementsByClassName("cart_delete");
//function deleteFromCart(){
  //for (i = 0; i<cartItems.length; i++) {
    
 // }
//};
//deleteFromCart();







/*
let id= document.querySelector(data-prodid);  
let price = event.target.parentElement.getElementsByClassName('productPrice')[0];         //parseInt(document.getElementsByClassName('productPrice'));
console.log(price);
for (i = 0; i<cartItems.length; i++) {
  item = createCartItem(cartItems[i]["name"], price.innerHTML, cartItems[i]["quantity"],  "1");
  cartWrapper.append(item);
*/