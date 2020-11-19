<?php
//szar

if(isset($_POST['btnLogin'])){
    $checkUser = $MODEL->checkUserData($_POST['username'], $_POST['password']);
    if($checkUser){
        $VIEWDATA['username'] = $_POST['username'];
        $VIEWDATA['password'] = $_POST['password'];

        echo '<script>alert('.$VIEWDATA['username'].' '.$VIEWDATA['password'].')</script>';
    }
}

include 'views/login.php';