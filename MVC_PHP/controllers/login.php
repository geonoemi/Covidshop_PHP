<?php
//szar


include 'views/login.php';
if(isset($_POST['btnLogin'])){

    $checkUser = $MODEL->checkUserData($_POST['username'], $_POST['password']);
  if($checkUser){
        
        $_SESSION["username"] = $_POST['username'];
        echo $_SESSION["username"];
        header("Location: index.php");
        exit();

    }


}
