<?php
    require '../controllerUserData.php';

    if(
        isset($_POST['info']) &&
        !empty($_POST['info']) &&
        isset($_SESSION['uid'])
    ){
        $name = mysqli_real_escape_string($con, $_POST['info']);
        $id = get_id_bn($name, $con);
        if($id != $_SESSION['uid']){
            exit();
        }else{
            $query = mysqli_query($con, "SELECT `id`,`uid` FROM `cart_table` WHERE `uid` = '$_SESSION[uid]'");
            $m = mysqli_num_rows($query);
            echo $m;
            exit();
        }
        
    }else{
        exit(0);
    }

?>
