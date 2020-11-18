<?php 


//CREATE MODEL OBJECT FROM MODEL CLASS
//(we can call it later in other included files)
include "Model.php";
$MODEL =  new Model();

$VIEWDATA = [];


//FIND CONTROLLER
if(isset($_GET['c'])){ //c stands for controller

	$_CONTROLLERNAME = $_GET['c'];
	if (file_exists("controllers/".$_CONTROLLERNAME.".php")){
		
		//controller exists, call it
		include("controllers/".$_CONTROLLERNAME.".php");

	}else{
		
		//controller does not exists, so we call "404 sorry" page 
		include("views/404.php");

	}

}else{

	//url does not contanis any controller, so we call home
	include("controllers/home.php");

}


/*
LAter in the project, we can experiment with .htaccess to change the urls from:
localhost?c=products

to localhost/products

*/


?>