<?php
    require '../controllerUserData.php';

    if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
        $p_id = (int)$_POST['product_id'];
        $mysqli = mysqli_query($con, "DELETE FROM `cart_table` 
                                      WHERE `product_id` = '$p_id' 
                                      AND `uid` ='$_SESSION[uid]'");
        if(isset($mysqli)){
            echo "Deleted";
        }else{
            echo "ERROR";
        }

    }else{
        echo "baaad";
    }



?>