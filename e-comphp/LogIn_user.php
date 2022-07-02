<?php

require './controllerUserData.php';


if(isset($_POST['email']) && isset($_POST['pass']) && $_POST['email'] != '' && $_POST['pass'] != ''){
    if (hash_equals($csrf, $_POST['csrf'])) {
        $inva = 'In You E-mail';
        $email          = mysqli_real_escape_string($con, $_POST['email']);
        $password       = mysqli_real_escape_string($con, $_POST['pass']);
        if(CheckData($email, $inva)){

            echo CheckData($email, $inva) ;

        }else{
            $check_email    = "SELECT * FROM users WHERE email = '$email'";
            $res            = mysqli_query($con, $check_email);

            if(mysqli_num_rows($res) > 0){
                $fetch      = mysqli_fetch_assoc($res);
                $fetch_pass = $fetch['pass'];
                if(password_verify($password, $fetch_pass)){

                    $_SESSION['email']  = $fetch['email'];
                    $_SESSION['name']   = $fetch['name'];
                    $_SESSION['uid']    = $fetch['uid'];
                    $_SESSION['pri']    = $fetch['priority'];
                    $_SESSION['message_reg'] = "Log in Successfuly";
                    $_SESSION['icon']        = "success";
  
                   echo "<script>window.location.reload();
                   </script>";
                    exit();
                
                }else{
                    echo "Incorrect E-mail or password!";
                }
            }else{
                echo "It's look like you're not a yet member! Click on the bottom link to signup.";
            }
        }



    }else{
        exit();
    }
}else{
    echo 'baad';
}


?>