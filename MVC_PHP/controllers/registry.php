<?php
include 'views/registry.php';

if (isset($_POST['reg_user'])) {
  if($_POST["password_1"]===$_POST["password_2"] ){
    if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",  $_POST['password_1']) && $_POST["password_1"] !==$_POST["username"]){

    $MODEL->addUser($_POST["username"], $_POST["password_1"], $_POST["email"]);
    header("Location: index.php?c=login");
    exit();
    } else {
      echo "<span class='error is-center'>A jelszó ne egyezzen meg a felhasználónévvel, legalább 8 karakter hosszú legyen, tartalmazzon legalább egy kisbetűt,egy nagybetűt és egy számot!</span>";
    }
  }else echo "<span class='error is-center'>A két jelszó nem egyezik.</span>"; 
}
/*if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password_1'])){
  //echo "1";
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password_1=$_POST['password_1'];
 
  $MODEL->addUser($username, $password_1, $email);
  echo  $username . $email . $password_1;
  header("Location: index.php?c=login");
  exit();
}*/
    
  

?>

<!--?php
include 'views/registry.php';

if (isset($_POST['reg_user'])) {
  if($_POST["password_1"]===$_POST["password_2"] ){
    if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",  $_POST['password_1']) && $_POST["password_1"] !==$_POST["username"]){

    $MODEL->addUser($_POST["username"], $_POST["password_1"], $_POST["email"]);
    header("Location: index.php?c=login");
    exit();
    } else {
      echo "<span class='error is-center'> A jelszó ne egyezzen meg a felhasználónévvel, legalább 8 karakter hosszú legyen, tartalmazzon legalább egy kisbetűt,egy nagybetűt és egy számot!</span>";
    }
  }else echo "<span class='error is-center'>A két jelszó nem egyezik.</span>";


  
}
    /*
$username="";
$email="";
$password_1="";
if (isset($_POST['username'])){
    //echo "1";
  $username=$_POST['username'];

  if( isset($_POST['email'])){
    $email=$_POST['email'];

   if(isset($_POST['password_1'])){
   
      $password_1=$_POST['password_1'];
      $MODEL->addUser($username, $password_1, $email);
      echo  $username . $email . $password_1;
      header("Location: index.php?c=login");
      exit();
    }
  }
}*/
  

?-->