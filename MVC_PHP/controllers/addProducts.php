<?php
include 'views/addProducts.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $picid = (!isset($_POST["picid"]) || empty($_POST["picid"]) ? "https://drive.google.com/uc?id=1c0-ie6crNSqFwqo-pwOgvfC2y1HIoTTp" : $_POST["picid"]);
  $MODEL->addProduct($_POST["name"], $_POST["quantity"], $_POST["prodid"], $_POST["price"], $_POST["description"], $picid);

}
 ?>
