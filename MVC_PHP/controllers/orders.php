<?php

if(isset($_SESSION['isadmin'])) $VIEWDATA['orders'] = $MODEL->getAllOrders();
else $VIEWDATA['orders']=$MODEL->getOrdersByUsername($_SESSION['username']);

include 'views/orders.php';
