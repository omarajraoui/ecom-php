<?php
session_start();
session_destroy();
if(isset($_GET['em'])){
    $cem       = $_GET['em'];
    $email     = mysqli_real_escape_string($con, $cem);
    header('location: index.php');
}else{
    header('location: index.php');
}
?>