<?php

require './controllerUserData.php';


if(
    isset($_POST['email']) && 
    isset($_POST['pass']) && 
    isset($_POST['name']) && 
    $_POST['email'] != '' && 
    $_POST['pass'] != '' && 
    $_POST['name'] != ''
){

    $name      = mysqli_real_escape_string($con, $_POST['name']);
    $email     = mysqli_real_escape_string($con, $_POST['email']);
    $password  = mysqli_real_escape_string($con, $_POST['pass']);




    $inva = 'In Your Name';
    $inva2 = 'In You E-mail';

    if(CheckData($name, $inva)){
        echo CheckData($name, $inva);
    }elseif(CheckData($email, $inva2)){
        echo CheckData($email, $inva2);
    }else{
        $encpass = password_hash($password, PASSWORD_DEFAULT);
        $ass = "SELECT * FROM `users` WHERE `email` = '$email'";
        $res = mysqli_query($con, $ass) or die(mysqli_error($con));

        if(mysqli_num_rows($res) > 1){
            echo "<div class='alert alert-danger'><h6>E-mail that you have entered is Already Exist!</h6></div>";
            exit();
        }else{
            // insert

            $insert_data = "INSERT INTO `users`(
                `uid`, 
                `name`,
                `email`,
                `u_img`,
                `priority`,
                `pass`) 
                VALUES (
                    '',
                    '$name',
                    '$email',
                    '',
                    '1',
                    '$encpass'
                )";
            $do_it = mysqli_query($con, $insert_data);
            if(isset($do_it)){
                echo "<div class='alert alert-success'><h6>Your now a member of Us</h6></div>
                <script>window.location.reload();
                </script>";

            }else{
                echo "<div class='alert alert-danger'><h6>Something Went Wrong</h6></div>";
            }



        }


    }
    
}else{
    echo 'bad Syntax';
}


?>