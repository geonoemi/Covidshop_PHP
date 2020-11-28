<?php

if(isset($_COOKIE["cart"])) {
  $VIEWDATA["cart"] = json_decode($_COOKIE["cart"], true);
}
include 'views/cart.php';
 ?>
