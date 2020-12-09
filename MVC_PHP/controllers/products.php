<?php

/*$VIEWDATA['products'] = $MODEL->getProducts();*/
if(isset($_GET["inpText"])) {
$VIEWDATA['products'] = $MODEL->searchProducts($_GET["inpText"]);}
include 'views/products.php';

?>
