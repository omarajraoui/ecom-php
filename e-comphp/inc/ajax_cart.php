<?php
    require '../controllerUserData.php';
    if(!isset($_SESSION['uid']) && !isset($_SESSION['email'])){
        echo '';
    }else{

   
        //get id ( --- )
        if(isset($_POST['info'])){
            $info = mysqli_real_escape_string($con, $_POST['info']);
            $pieces = explode("&" , $info);
            $name = $pieces[0];
            $email = $pieces[1];
            $id = get_id_us($email, $con);
            if($_SESSION['uid'] != $id){
                echo "Error 303";
            }else{
                $conn = new mysqli('localhost', 'root', '', 'ecom_db');
                $query = "SELECT * FROM `cart_table` WHERE `uid` = '$_SESSION[uid]'";

        		$sql = $con->query($query);
		        if ($sql->num_rows > 0) {
			        $response = "";

                    while($data = $sql->fetch_assoc()) {
                        $val = get_pr($data['product_id'], $data['product_quan']);
                        $response .= "<tr class='row_container'>$val<tr>";
                    }

                    exit($response."<script src=\"./js/cart.js\" async></script>");
                } else{
                    exit('<tr><h3>No Product Found</h3></tr>');
                }

            }

        }else{
            echo "Error 404";
        }


   





















//     echo '<tr class="row_container">
//     <td class="product__thumbnail">
//         <a href="#article_id">
//             <img src="./images/hoodie.png" alt="">
//         </a>
//     </td>
//     <td class="product__name">
//         <a href="#">Blissful Tshirt</a>
//         <br><br>
//         <small>White/black</small>
//     </td>
//     <td class="product__price">
//         <div class="price">
//             <span class="new__price">150</span> <small>dh</small>
//         </div>
//     </td>
//     <td class="product__quantity">
//      <div class="input-counter">
//         <div>
//             <input type="number" min="1" value="1" max="30" class="item__quan counter-btn">
//         </div>
//       </div>
//     </td>
//     <td class="product__subtotal">
//         <a href="#delete" class="remove__cart">
//             <i class="fas fa-trash"></i>
//         </a>
//     </td>
// </tr>
// <tr class="row_container">
//     <td class="product__thumbnail">
//         <a href="#article_id">
//             <img src="./images/hoodie.png" alt="">
//         </a>
//     </td>
//     <td class="product__name">
//         <a href="#">Blissful Tshirt</a>
//         <br><br>
//         <small>White/black</small>
//     </td>
//     <td class="product__price">
//         <div class="price">
//             <span class="new__price">600</span> <small>dh</small>
//         </div>
//     </td>
//     <td class="product__quantity">
//         <div class="input-counter">
//         <div>
//             <div>
//                 <input type="number" min="1" value="1" max="30" class="item__quan counter-btn">
//             </div>
//         </div>
//         </div>
//     </td>
//     <td class="product__subtotal">
//         <a href="#delete" class="remove__cart">
//             <i class="fas fa-trash"></i>
//         </a>
//     </td>
// </tr>
// <tr class="row_container">
//     <td class="product__thumbnail">
//         <a href="#article_id">
//             <img src="./images/hoodie.png" alt="">
//         </a>
//     </td>
//     <td class="product__name">
//         <a href="#">Blissful Tshirt</a>
//         <br><br>
//         <small>White/black</small>
//     </td>
//     <td class="product__price">
//         <div class="price">
//             <span class="new__price">650</span> <small>dh</small>
//         </div>
//     </td>
//     <td class="product__quantity">
//         <div class="input-counter">
//         <div>
//             <div>
//                 <input type="number" min="1" value="1" max="30" class="item__quan counter-btn">
//             </div>
//         </div>
//         </div>
//     </td>
//     <td class="product__subtotal">
//         <a href="#delete" class="remove__cart">
//             <i class="fas fa-trash"></i>
//         </a>
//     </td>
// </tr>
// <tr class="row_container">
//     <td class="product__thumbnail">
//         <a href="#article_id">
//             <img src="./images/hoodie.png" alt="">
//         </a>
//     </td>
//     <td class="product__name">
//         <a href="#">Blissful Tshirt</a>
//         <br><br>
//         <small>White/black</small>
//     </td>
//     <td class="product__price">
//         <div class="price">
//             <span class="new__price">900</span> <small>dh</small>
//         </div>
//     </td>
//     <td class="product__quantity">
//         <div class="input-counter">
//         <div>
//             <div>
//                 <input type="number" min="1" value="1" max="30" class="item__quan counter-btn">
//             </div>
//         </div>
//         </div>
//     </td>
//     <td class="product__subtotal">
//         <a href="#delete" class="remove__cart">
//             <i class="fas fa-trash"></i>
//         </a>
//     </td>
// </tr>

//                                     <script src="./js/cart.js" async></script>                                    ';
    
 }
?>