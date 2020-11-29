window.addEventListener('DOMContentLoaded', (event) => {

  document.body.addEventListener('click',function(e){
    let itsCart=false;
    e.composedPath().forEach(function(el){
      if (el.id=="cart" || el.id=="showCart")
        itsCart=true;
    });

    if (!itsCart)
      cartContainer.style.display="none";
  });
  let cartWrapper = document.getElementById('cartWrapperItems');
  let checkoutButton = document.getElementById('checkout');
  let showCartButton = document.getElementById('showCart');
  let cartContainer=document.getElementById('cart');
  let cartItems = (read_cookie("cart")===null ? new Array() : read_cookie("cart"));
  let guestCart = new Array();

  let username = document.head.querySelector("[property~=username][content]").content;

  if (username!=="guest") {
    mergeGuestAndUserCart();
  }
  else {
    checkoutButton.parentNode.href="?c=login";
  }
  showCartButton.addEventListener('click', function () {

    if (cartContainer.style.display == "none") {
  		populateCart();
  		cartContainer.style.display = 'block'

  		;}
    else
      cartContainer.style.display = 'none';

  });


  function createCartItem(name, price, quantity, prodid, max) {
    wrapper = document.createElement('div');
    wrapper.setAttribute('data-prodid', prodid);
    price=Number(price);
    wrapper.innerHTML = `
    <h3 class="cart_prodname">${name}</h3>
    <input type="number" min="1" data-quantity="${quantity}" class="cart_quantity" value="${quantity}" max="${max}">
    <button class="cart_delete">Törlés</button>
    <span class="cart_fullprice">${price} Ft</span>
    `;
    wrapper.getElementsByClassName("cart_quantity")[0].addEventListener("change", increaseQuantityFromCart);
    wrapper.getElementsByClassName("cart_delete")[0].addEventListener("click", deleteFromCart);
    return wrapper;

  }



  function bake_cookie(name, value) {
    let cookie = [name, '=', JSON.stringify(value), '; path=/; max-age=2100;'].join('');
    document.cookie = cookie;
    console.log("yay");
  }

  function read_cookie(name) {
   let result = document.cookie.match(new RegExp(name + '=([^;]+)'));
   result && (result = JSON.parse(result[1]));
   return result;
  }

  let elements = document.getElementsByClassName('addtocart');
  for(i = 0; i<elements.length; i++) {

    elements[i].addEventListener("click", addToCart)

}
  function addToCart(event) {

    event.persist;
    let quantity =  event.target.previousSibling;
    let prodid= event.target.parentNode.lastChild.getAttribute("data-prodid");
    let price = parseInt(event.target.parentNode.getElementsByClassName('productPrice')[0].innerHTML);
    let id = event.target.parentNode.id;
    console.log(id);
    let name  = event.target.parentNode.firstChild.innerHTML;
    let max = parseInt(quantity.max);

    let value = parseInt(quantity.value);



    if (!isNaN(value) && value>0) {

        let temp = true;
        for(i = 0; i<cartItems.length; i++) {
            if (cartItems[i]["name"] === name && cartItems[i]["username"] === username) {
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
        if(temp && !(value > max) && value > 0) {

          cartItems.push({
            "quantity" : value,
            "name" : name,
            "id" : id,
            "prodid" : prodid,
            "price" : price,
  					"max" : max,
            "username" : username,
          });
          bake_cookie("cart", cartItems);

      }

    }
  }

  function populateCart() {


    cartWrapper.innerHTML = "";
    let fullprice = 0;
    for (i = 0; i<cartItems.length; i++) {
      current = cartItems[i];
      if(current["username"]===username) {
        console.log("?");
      cartWrapper.append(createCartItem(current["name"], current["price"]*current["quantity"], cartItems[i]["quantity"],  current["prodid"], current["max"]));
      fullprice += current["price"] * current["quantity"];
    }
  }

    if (fullprice > 0) cartWrapper.append(`Végösszeg: ${fullprice} Ft`);





  }
  function increaseQuantityFromCart(event) {

    for(i = 0; i<cartItems.length; i++) {

      if(event.target.parentNode.getElementsByClassName("cart_prodname")[0].innerHTML === cartItems[i]["name"] && parseInt(event.target.value) <= parseInt(event.target.max) && parseInt(event.target.value) > 0) {
        console.log(event.target.value);
        cartItems[i]["quantity"] = parseInt(event.target.value);
        event = null;
        console.log(cartItems[i]["quantity"]);
        bake_cookie("cart", cartItems);

        populateCart();

      }
    }
  }
  function deleteFromCart(event) {
    event.persist;
    for(i = 0; i<cartItems.length; i++) {

      if(event.target.parentNode.getElementsByClassName("cart_prodname")[0].innerHTML === cartItems[i]["name"]) {

        cartItems.splice(i, 1);
        bake_cookie("cart", cartItems);
        populateCart();
      }
  }
}
// ezzel a fossal annyi kurva órám elment, hogy remélem valaki értékeli
  function mergeGuestAndUserCart() {
    let indexes = new Array();
    for(i = 0; i< cartItems.length; i++) {
      if (cartItems[i]["username"] === "guest") {
        guestCart.push(cartItems[i]);
        indexes.push(i);
      }

    }

    for(i = 0; i< guestCart.length; i++) {
      let temp = true;
      for(j = 0; j < cartItems.length; j++) {

        if(cartItems[j]["name"] == guestCart[i]["name"] && cartItems[j]["username"] === username) {

          temp = false;
          if(cartItems[j]["quantity"] + guestCart[i]["quantity"] <= cartItems[j]["max"]) {
            cartItems[j]["quantity"] += guestCart[i]["quantity"];

          }
          else {

            cartItems[j]["quantity"] = cartItems[j]["max"];
          }
        }
      }
      if(temp) {
        guestCart[i]["username"] = username;
        cartItems.push(guestCart[i]);


      }

    }
    for(i = 0; i < indexes.length; i++) {
      cartItems.splice(indexes[i], 1);
    }
    bake_cookie("cart", cartItems);
    guestCart.splice(0, guestCart.length);
    populateCart();

  }

});
function read_cookie(name) {
 let result = document.cookie.match(new RegExp(name + '=([^;]+)'));
 result && (result = JSON.parse(result[1]));
 return result;
}
