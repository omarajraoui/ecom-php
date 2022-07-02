<?php
    require './controllerUserData.php';
    //check User Info
    if(isset($_SESSION['pri'])){
        if($_SESSION['pri'] != 0){
            header('Location: index.php');
            $_SESSION['message_reg'] = "Sorry you dont have permision to get there";
            $_SESSION['icon']        = "error";
        }else{
            header("Location: cpanel/index.php");
        }
    }


?>