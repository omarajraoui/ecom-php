<?php
session_start();
// header('Set-Cookie: PHPSESSID= ' . session_id() . '; SameSite=None; Secure');
require "connection.php";
    date_default_timezone_set("Africa/Casablanca");
function CheckData($name_invalid, $inva){

        

    if(preg_match("/</", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( < ) '.$inva.'</p>';
    }elseif(preg_match("/>/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( > ) '.$inva.'</p>';
    }elseif(preg_match("/:/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( : ) '.$inva.'</p>';
    }elseif(preg_match("/,/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( , ) '.$inva.'</p>';
    }elseif(preg_match("/-/", $name_invalid)){       
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( - ) '.$inva.'</p>';
    }elseif(preg_match("/`/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ` ) '.$inva.'</p>';
    }elseif(preg_match("/\(/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong>  [ ( ]  '.$inva.'</p>';
    }elseif(preg_match("/\)/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> [ ) ] '.$inva.'</p>';
    }elseif(preg_match("/&/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( & ) '.$inva.'</p>';
    }elseif(preg_match("/'/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( \' ) '.$inva.'</p>';
    }elseif(preg_match("/\"/", $name_invalid)){ 
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( " ) '.$inva.'</p>';
    }elseif(preg_match("/#/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( # ) '.$inva.'</p>';
    }elseif(preg_match("/\//", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( / ) '.$inva.'</p>';
    }elseif(preg_match("/=/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( = ) '.$inva.'</p>';
    }elseif(preg_match("/\*/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( * ) '.$inva.'</p>';
    }elseif(preg_match("/!/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ! ) '.$inva.'</p>';
    }else{

    }
}
function get_img_us($uid_auth, $con){
    $select_img_author  = "SELECT `uid`, `u_img` FROM `users` WHERE `uid` = '$uid_auth'";
    $r_q                = mysqli_query($con, $select_img_author);
    if(mysqli_num_rows($r_q) > 0){
      $assoc              = mysqli_fetch_assoc($r_q);
      if(empty($assoc['u_img'])){
        return '<svg class="icon__user">
        <use xlink:href="./images/sprite.svg#icon-user"></use>
      </svg>';
      }else{
        return " <img src='".$assoc['u_img']."' width='23px' alt='profile'";
      }
    }else{
        return '<svg class="icon__user">
        <use xlink:href="./images/sprite.svg#icon-user"></use>
      </svg>';
    }
}
function get_id_bn($name, $con){
    $sql = mysqli_query($con, "SELECT * FROM `users` WHERE `name` = '$name'");
    if(mysqli_num_rows($sql) > 0){
        $assoc              = mysqli_fetch_assoc($sql);
        return $assoc['uid'];
    }else{
        return 'undefined'; 
    }

}
function get_id_us($email, $con){
    $sql = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email'");
    if(mysqli_num_rows($sql) > 0){
        $assoc              = mysqli_fetch_assoc($sql);
        return $assoc['uid'];
    }else{
        return 'undefined'; 
    }

}
function get_pr($p_id, $p_qua){
    $con = mysqli_connect('localhost', 'root', '', 'ecom_db');

    $p_id = (int)$p_id;
    $fetch_from_db = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = $p_id" );
    if(mysqli_num_rows($fetch_from_db) > 0){

        $get_info           = mysqli_fetch_assoc($fetch_from_db);
       return '
    <td class="product__thumbnail">
        <a href="product.php?p='.$p_id.'">
            <img src="'.$get_info['image'].'" alt="">
        </a>
    </td>
    <td class="product__name">
        <a href="product.php?p='.$p_id.'">'.$get_info['title'].'</a>
        <br><br>
        <small>'.$get_info['category'].'</small>
    </td>
    <td class="product__price">
        <div class="price">
            <span class="new__price">'.$get_info['price'].'</span> <small>dh</small>
        </div>
    </td>
    <td class="product__quantity">
        <div class="input-counter">
        <div>
            <div>
                <input type="number" min="1" value="'. (int)$p_qua .'" max="30"  data-id="'.$p_id.'" class="item__quan counter-btn">
            </div>
        </div>
        </div>
    </td>
    <td class="product__subtotal">
        <a class="remove__cart">
            <i class="fas fa-trash" data-id="'.$p_id.'"></i>
        </a>
    </td>'; 
    }else{
        return 'error';
    }
    


}
function get_title($string){
    $pieces = explode('[', $string);
    $arrows = explode(']', $pieces[1]);
    $title = $arrows[0];
    return $title;
}
function get_text($string){
    $n = explode(':', $string);
    $txt = $n[1];
    return $txt;
}
function how_many_titles_there($string, $i){
    $s = explode("/", $string);
    $new = $s[$i];
    $tit = get_title($new);
    $text = get_text($new);

    return "<h2>$tit</h2><p>$text</p><br>";

}
function ret_val_wh5($string){
    // $string = "[hello]:hellobaby./";
    $s = count(explode("/", $string)) - 1;
    $str = "";
    for ($i=0; $i < $s; $i++) { 
        $str .= how_many_titles_there($string, $i);
    }
    return $str;

}

function upload_img($request, $name ){
     // image Upload
        sleep(1);
     if(isset($request)) {
        $image          = $request;
        $image_name     = $image['name'];
        $image_tmp      = $image['tmp_name'];
        $image_size     = $image['size'];
        $image_error    = $image['error'];
    
        $image_exe = explode('.' , $image_name);
        $image_exe = strtolower(end($image_exe));
    
        $allowd = array('png', 'gif', 'jpg', 'jpeg');
        if(in_array($image_exe , $allowd)){
            if($image_error === 0) {
                if($image_size <= 3000000) {
                    $new_name = uniqid($name ,false) . '.' . $image_exe;
                    $image_dir = "../../images/" . $new_name;
                    $image_db = "./images/" . $new_name;
                    if(move_uploaded_file($image_tmp ,$image_dir)){
                        
                        return $image_db;
                         
    
                        
                    }else{
                        return '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> There is a error while uploading Photo .</div>';
                    }
                }else{
                    return '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> The image is to big (try one (<3MB))</div>';
                }
            }else{
                return '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload" style="color:darkred"></i> There is a error while uploading Photo (Error 404) .</div>';
            }
        }else{
            return '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> Please image should have a (png/jpeg/jpg/gif) at the end .</div>';
        }
    
    
    }
}
function get_stock_inva ($p_id, $con)
{
    $pid = (int)$p_id;
    $sql = mysqli_query($con, "SELECT `id`,`p_count`FROM `products` WHERE `id` = '$pid'");
    $mysql = mysqli_fetch_assoc($sql);
    if($mysql['p_count'] == '0'){
        return '<a href="'.$pid.'" class="in-stock">Not In Stock ('.$mysql['p_count'].' Item)</a>';
    }else{
        return '<a href="'.$pid.'" class="in-stock">In Stock ('.$mysql['p_count'].' Items)</a>';
    }
    
}
// function get_product_by_id($p_id, $con){
//     $query = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = '$p_id'");
//     if(mysqli_num_rows($query) > 0){
//       $assoc = mysqli_fetch_assoc($query);
//         return '<li class="glide__slide">
//         <div class="product">
//         <div class="product__header">
//             <a href="#"><img src="'. $assoc['image'].'" alt="product"></a>
//         </div>
//         <div class="product__footer">
//             <h3>'.$assoc['title'].'</h3>
//             <div class="rating">
//                 <svg>
//                     <use xlink:href="./images/sprite.svg#icon-star-full"></use>
//                 </svg>
//                 <svg>
//                     <use xlink:href="./images/sprite.svg#icon-star-full"></use>
//                 </svg>
//                 <svg>
//                     <use xlink:href="./images/sprite.svg#icon-star-full"></use>
//                 </svg>
//                 <svg>
//                     <use xlink:href="./images/sprite.svg#icon-star-full"></use>
//                 </svg>
//                 <svg>
//                     <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
//                 </svg>
//             </div>
//             <div class="product__price">
//             <h4>'.$assoc['price'].' dh</h4>
//             </div>
//             <a href="cart.php?add='.$p_id.'"><button type="submit" class="product__btn">Add To Cart</button></a>
//         </div>
//         <ul>
//             <li>
//             <a data-tip="Quick View" data-place="left" href="product.php?p='.$p_id.'">
//                 <svg>
//                 <use xlink:href="./images/sprite.svg#icon-eye"></use>
//                 </svg>
//             </a>
//             </li>
//             <li>
//             <a data-tip="Add To Wishlist" data-place="left" href="#">
//                 <svg>
//                 <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
//                 </svg>
//             </a>
//             </li>
//         </ul>
//         </div>
//         </ul>';

//     }
// }
// function get_products_by_price($con, $x)
// {
//   $sql = mysqli_query($con, "SELECT `id`,`price` FROM `products` ORDER BY `products`.`price` ASC LIMIT $x");
//   if(mysqli_num_rows($sql) > 0){
//     while($data = mysqli_fetch_assoc($sql)) {
//         return get_product_by_id($data['id'], $con);
//     }
//   }
  
// }

if (empty($_SESSION['key'])){
    $_SESSION['key'] = bin2hex(random_bytes(32));
}
//create CSRF token
$csrf = hash_hmac('sha256', 'th990is IUs so!;me string: ind343ex.php', $_SESSION['key']);






?>