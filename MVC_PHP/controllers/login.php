<?php
//szar


include 'views/login.php';
if(isset($_POST['btnLogin'])){

    $checkUser = $MODEL->checkUserData($_POST['username'], $_POST['password']);
  if($checkUser){

        setcookie("username", $_POST['username'], time() + (86400 * 30), "/");
        header("Location: index.php"); 
        exit();

    }


}
