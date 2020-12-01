<?php
//szar

include 'views/login.php';
if(isset($_POST['btnLogin'])){
    $checkUser = $MODEL->checkUserData($_POST['username'], $_POST['password']);
    if($checkUser){
        $isadmin = $MODEL->isAdmin($_POST['username']);
        if($isadmin){
            $set = "set";
            $_SESSION["isadmin"] = $set;
            $_SESSION["username"] = $_POST['username'];
            header("Location: index.php");
            exit();
        }
        else{

            $_SESSION["username"] = $_POST['username'];
            $userid = $MODEL->getUserId($_POST["username"]);
            $_SESSION["userid"] = $userid["id"];
            header("Location: index.php");
            exit();
        }
    }
    else {
        echo "<div class='error'>Hibás felhasználónév, vagy jelszó!</div>";
      //echo "<script> alert('Hibás bejelentkezési adatok!')</script>";
    }


}
