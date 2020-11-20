<?php
include 'views/registry.php';

  if (isset($_POST['reg_user'])) {
    if($_POST["password_1"]===$_POST["password_2"]){
  $MODEL->addUser($_POST["username"], $_POST["password_1"], $_POST["email"]);
  header("Location: index.php?c=login"); 
  exit();

  }
  else echo "<span class='error'>A két jelszó nem egyezik.</span>";
}
?>
