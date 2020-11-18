<?php
include 'views/addProducts.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $MODEL->addProduct($_POST["name"], $_POST["quantity"], $_POST["prodid"], $_POST["price"], $_POST["description"]);

}
 ?>
