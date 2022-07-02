<?php
    require '../../controllerUserData.php';
if(
    isset($_POST['title']) &&
    isset($_POST['quantity']) &&
    isset($_POST['price']) &&
    isset($_FILES['image']) &&
    isset($_FILES['image_1']) &&
    isset($_FILES['image_2']) &&
    isset($_FILES['image_3']) &&
    isset($_FILES['image_4']) &&
    isset($_FILES['image_5']) &&
    isset($_POST['brand']) &&
    isset($_POST['review']) &&
    isset($_POST['mini_description']) &&
    isset($_POST['description']) &&
    !empty($_POST['title']) &&
    !empty($_POST['quantity']) &&
    !empty($_POST['price']) &&
    !empty($_POST['brand']) &&
    !empty($_POST['review']) &&
    !empty($_POST['mini_description']) &&
    !empty($_POST['description'])
){
    $title      = mysqli_real_escape_string($con, $_POST['title']);
    $brand      = mysqli_real_escape_string($con, $_POST['brand']);
    $m_descr    = mysqli_real_escape_string($con, $_POST['mini_description']);
    $descr      = mysqli_real_escape_string($con, $_POST['description']);
    $review      = (int)($_POST['review']);
    $quantity   = (int)($_POST['quantity']);
    $price      = (int)($_POST['price']);
    

    //  ;

    // miniimage1|miniimage2|miniimage3|miniimage4|miniimage5|mini_description|reviews|brand|header-para/header-para
    if(isset($_POST['btn_submit'])){


        $img = upload_img($_FILES['image'], "mini_image_");
        if(isset($img)){
            $img1 = upload_img($_FILES['image_1'], "mini_image_1");
            if(isset($img1)){
                $img2 = upload_img($_FILES['image_2'], "mini_image_2");
                if(isset($img2)){
                    $img3 = upload_img($_FILES['image_3'], "mini_image_3");
                    if(isset($img3)){
                        $img4 = upload_img($_FILES['image_4'], "mini_image_4");
                        if(isset($img4)){
                            $img5 = upload_img($_FILES['image_5'], "mini_image_5");
                            if(isset($img5)){
                                $sql = mysqli_query($con, "INSERT INTO `products`
                                    (`id`,
                                    `title`,
                                    `p_count`,
                                    `p_descri`,
                                    `image`,
                                    `price`,
                                    `category`,
                                    `p_pid`
                                    ) VALUES (
                                        '',
                                        '$title',
                                        '$quantity',
                                        '$img1|$img2|$img3|$img4|$img5|$m_descr|$review|$brand|$descr',
                                        '$img',
                                        '$price',
                                        'Featured Products',
                                        '$_SESSION[uid]'
                                    )");


                                if(isset($sql)){
                                    echo '<div class="alert alert-success"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> Uploaded successfully </div>';
                                }
                            }
                        }
                    }
                }
            }
        

        }
    }


}else{
    echo 'error';
}


?>