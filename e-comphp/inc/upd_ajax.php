<?php
    require '../controllerUserData.php';

    if(isset($_POST['product_id']) && !empty($_POST['product_id']) && isset($_POST['nval']) && !empty($_POST['nval'])){
        $p_id = (int)$_POST['product_id'];
        $nval = (int)$_POST['nval'];
        $mysqli = mysqli_query($con, "UPDATE `cart_table` SET `product_quan`='$nval' WHERE `uid`= '$_SESSION[uid]' AND `product_id` = '$p_id'");
        if(isset($mysqli)){
            exit("UPDATED") ;
        }else{
            exit("ERROR") ;
        }

    }else{
        exit("baaad");
    }



?>