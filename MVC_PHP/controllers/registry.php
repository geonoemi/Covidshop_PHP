<?php
include 'views/registry.php';

if (isset($_POST['reg_user'])) {
  if($_POST["password_1"]===$_POST["password_2"] ){
    if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",  $_POST['password_1'] && $_POST["password_1"] !=$_POST["username"])){

    $MODEL->addUser($_POST["username"], $_POST["password_1"], $_POST["email"]);
    header("Location: index.php?c=login");
    exit();
    } else {
      echo "<span class='error'> A jelszó ne egyezzen meg a felhasználónévvel, legalább 8 karakter hosszú legyen, tartalmazzon legalább egy kisbetűt,egy nagybetűt és egy számot!</span>";
    }
  }else echo "<span class='error'>A két jelszó nem egyezik.</span>";


  
}
    
  

?>
