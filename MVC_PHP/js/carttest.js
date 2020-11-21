function createCartItem(name, price, quantity, prod) {
  let wrapper = document.createElement('div');
  wrapper.setAttribute('data-prodId', prod.prodid);
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
function createCartItem(name, price, quantity, prod) {
  let wrapper = document.createElement('div');
  wrapper.setAttribute('data-prodId', prod);
  price=Number(price);
  wrapper.innerHTML = `
  <h3 class="cart_prodname">${name}</h3>
  <input type="number" data-quantity="${quantity}" class="cart_quantity" value="${quantity}">
  <button class="cart_delete">Törlés</button>
  <span class="cart_fullprice">${price} Ft</span>
  `;

  return wrapper;

}


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

  console.log(quantity.value);
  let name  = event.target.parentNode.firstChild.innerHTML;
  let max = parseInt(quantity.max);
  let value = parseInt(quantity.value);
  if (!isNaN(value)&& value>0) {

      console.log(name);
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

        });
        bake_cookie("cart", cartItems);

        //function createCartItem(name, price, quantity, prod)
    }
  }
  let id= document.querySelector(data-prodid);  
  let price = event.target.parentElement.getElementsByClassName('productPrice')[0];    
  for (i = 0; i<cartItems.length; i++) {
    item = createCartItem(cartItems[i]["name"], price.innerHTML, cartItems[i]["quantity"],  "1");
    cartWrapper.append(item);

  }
}








/*
let id= document.querySelector(data-prodid);  
let price = event.target.parentElement.getElementsByClassName('productPrice')[0];         //parseInt(document.getElementsByClassName('productPrice'));
console.log(price);
for (i = 0; i<cartItems.length; i++) {
  item = createCartItem(cartItems[i]["name"], price.innerHTML, cartItems[i]["quantity"],  "1");
  cartWrapper.append(item);
*/