function createCartItem(name, price, quantity, prodid, max) {
  wrapper = document.createElement('div');
  wrapper.setAttribute('data-prodid', prodid);
  price=Number(price);
  wrapper.innerHTML = `
  <h3 class="cart_prodname">${name}</h3>
  <input type="number" data-quantity="${quantity}" class="cart_quantity" value="${quantity}" max="${max}">
  <button class="cart_delete">Törlés</button>
  <span class="cart_fullprice">${price} Ft</span>
  `;
  wrapper.getElementsByClassName("cart_quantity")[0].addEventListener("change", increaseQuantityFromCart)

  return wrapper;

}

var cartWrapper = document.getElementById('cartWrapperItems');
var checkoutButton = document.getElementById('checkout');
var showCartButton = document.getElementById('showCart');
var cartContainer=document.getElementById('cart');
showCartButton.addEventListener('click', function () {
	populateCart();
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

var cartItems = read_cookie("cart")===null ? new Array() : read_cookie("cart");

var elements = document.getElementsByClassName('addtocart');
for(i = 0; i<elements.length; i++) {
  elements[i].addEventListener("click", addToCart)
}

function addToCart() {
  let quantity =  event.target.previousSibling;
  let prodid= event.target.parentNode.lastChild.getAttribute("data-prodid");
  let price = parseInt(event.target.parentElement.getElementsByClassName('productPrice')[0].innerHTML);
  let id= event.target.parentNode.id;
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
          "price" : price,
					"max" : max,
        });
        bake_cookie("cart", cartItems);

    }
    populateCart();
  }
}

function populateCart() {
  cartWrapper.innerHTML = "";
  for (i = 0; i<cartItems.length; i++) {
    current = cartItems[i];
    console.log(current["prodid"]);
    cartWrapper.append(createCartItem(current["name"], current["price"]*current["quantity"], cartItems[i]["quantity"],  current["prodid"], current["max"]));

    }


}
function increaseQuantityFromCart() {
  for(i = 0; i<cartItems.length; i++) {

    if(event.target.parentNode.getElementsByClassName("cart_prodname")[0].innerHTML === cartItems[i]["name"] && parseInt(event.target.value) <= parseInt(event.target.max)) {

      cartItems[i]["quantity"] = parseInt(event.target.value);
      bake_cookie("cart", cartItems);
      populateCart();
    }
  }
}

//document.getElementById('cartitem-'+prodid).value;



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







//document.getElementBaClassName(".cart_delete").addEventListener("click", function(){
 // let deleteButton=document.getElementsByClassName("cart_delete");
//function deleteFromCart(){
  //for (i = 0; i<cartItems.length; i++) {

 // }
//};
//deleteFromCart();
