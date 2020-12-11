<?php

$address = $MODEL->getAddress($_SESSION["userid"]);
if($address) $VIEWDATA['address'] = $address;

if(isset($_COOKIE["cart"]) && isset($_SESSION["username"])) {
  $temp = array();

  foreach (json_decode($_COOKIE["cart"], true) as $key) {

    if ($key["username"]===$_SESSION["username"]) {
      array_push($temp, $key);
    }
  }
  $VIEWDATA["cart"] = $temp;
}
if(isset($_POST["checkout"])) {

  if($address){
    // szar, de thinking outside the box
    echo "<script>function bake_cookie(name, value) {
      let cookie = [name, '=', JSON.stringify(value), '; path=/; max-age=2100; Secure;'].join('');
      document.cookie = cookie;

    }
    let cartItems = new Array();</script>";
    $newCookie = array();
    $items = "";
    $price = 0;

    foreach (json_decode($_COOKIE["cart"], true) as $key) {
      if($key["username"] === $_SESSION["username"]) {
        if($MODEL->checkOut($key["quantity"], $key["id"])) {
            $items .= $key["name"] . " " . $key["quantity"] . ",";
            $price = $price + ($key["quantity"] * $key["price"]);
          }
      }else {
        echo "<script>cartItems.push(" . json_encode($key) . ");</script>";

      }
      if($price>0) $MODEL->newOrder($_SESSION["userid"], $items, $price);

    }
    echo "<script>bake_cookie('cart', cartItems);</script>";
    unset($VIEWDATA["cart"]);


  }else{
    echo "<span class='error'>Nem adtál meg szállítási címet! Kérlek módosítsd a Profilom lapon.</span>";
  }
}

include 'views/cart.php';
 ?>
