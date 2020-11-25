<?php

//lakcímek lekérése
$address = $MODEL->getAddress($_SESSION["userid"]);
if($address) $VIEWDATA['address'] = $address;

//új lakcím hozzáadása
if(isset($_POST['newAddress'])){
    $MODEL->addNewAddress($_SESSION["userid"],$_POST["postalcode"], $_POST["city"], $_POST["street"], $_POST["number"]);
}

//felhasználói adatok változtatása
if(isset($_POST['updateData'])){
    if(isset($_POST['email'])&&isset($_POST['password_1'])&&isset($_POST['password_2'])){
        if($_POST['password_1']==$_POST['password_2']){
            $MODEL->changePwAndEmail($_SESSION["userid"],$_POST["password_1"],$_POST["email"]);
        }else{
            echo '<script>alert("Megadott jelszavak nem egyeznek!")</script>';
        }
    }else if(isset($_POST['password_1'])&&isset($_POST['password_2'])&&!isset($_POST['email'])){
        if($_POST['password_1']==$_POST['password_2']){
            $MODEL->changePw($_SESSION['userid'], $_POST['password_1']);
        }else{
            echo '<script>alert("Megadott jelszavak nem egyeznek!")</script>';
        } 
    }else if (isset($_POST['email'])&&!isset($_POST['password_1'])&&!isset($_POST['password_2'])){
        $MODEL->changeEmail($_SESSION['userid'], $_POST['email']);
    }else{
        echo '<script>alert("Töltsd ki megfelelően a mezőket!")</script>';
    }
}

include 'views/profile.php';