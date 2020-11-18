<?php 

//every declared variable can be used later in views,
// but we have to work with $VIEWDATA to organize view variables to one place
// ( $VIEWDATA already exists, we declared it in index.php )


$VIEWDATA['products'] = $MODEL->getProducts();

$VIEWDATA['userdata'] =$MODEL->getUser();

/*[
	
	1 => [
		"name" => "név",
		"description" => "Termék leirása"
	]
	...

]*/

include "views/home.php";