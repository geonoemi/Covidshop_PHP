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

  if (!isNaN(quantity.value)&& quantity.value>0) {

      console.log(name);
      let temp = true;
      for(i = 0; i<cartItems.length; i++) {
          if (cartItems[i]["name"] === name) {
              if(quantity.value > quantity.max) {
                temp = false;
                alert("Nincs ennyi a készleten.");
              }
              else{
                cartItems[i]["quantity"] = parseInt(cartItems[i]["quantity"]) + parseInt(quantity.value);
                temp = false;
                bake_cookie("cart", cartItems);

          }
      }
    }
      if(temp) {
        cartItems.push({
          "quantity" : quantity.value,
          "name" : name,

        });
        bake_cookie("cart", cartItems);
    }



  }
}
