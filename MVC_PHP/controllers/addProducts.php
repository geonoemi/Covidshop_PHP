<?php
include 'views/addProducts.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
  /*if(isset($_FILES['picfile'])) {
    $file = $_FILES['picfile'];
    $name = $file['name'];
    $path = "uploads/" . basename($name);
    if (move_uploaded_file($file['tmp_name'], $path)) {
        $picid = $path;
    } else {
      $picid = "uploads/default.jpg";
    }}*/
    $picid = (!isset($_POST["picid"]) || empty($_POST["picid"]) ? "https://drive.google.com/uc?id=1c0-ie6crNSqFwqo-pwOgvfC2y1HIoTTp" : $_POST["picid"]);
    $MODEL->addProduct($_POST["name"], $_POST["quantity"], $_POST["prodid"], $_POST["price"], $_POST["description"], mb_substr($picid,32, $picid.length-17));
    
}
 ?>
