<?php
    require './controllerUserData.php';
    if(!isset($_SESSION['uid'])){
        $_SESSION['message_reg'] = "Your Not a memeber yet please create an account to proceess the Cart";
        $_SESSION['icon']        = "warning";
        header('Location: index.php');

    }else{
        $quan = 1;
        if(isset($_GET['add']) && !empty($_GET['add'])){
            $p_id = (int)$_GET['add'];

            $sql = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$p_id'");
            if(mysqli_num_rows($sql) > 0){

                //select from other table
                $mysql = mysqli_query($con, "SELECT * FROM `cart_table` WHERE `product_id`= '$p_id' AND `uid`='$_SESSION[uid]' ");
                if(mysqli_num_rows($mysql) > 0){
                    //do nothing
                }else{
                    $mysqli_query = mysqli_query($con, "INSERT INTO `cart_table`(`id`, `uid`, `product_id`, `product_quan`) 
                VALUES (
                    '',
                    '$_SESSION[uid]',
                    '$p_id',
                    '$quan'
                )");
                }

                

            }else{
            $_SESSION['message_reg'] = "Something Went Wrong / The id of the Product Not Found";
            $_SESSION['icon']        = "warning";
            header('Location: index.php');
            }


        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include './inc/headers.php'; ?>

    <title>Custom shop</title>
</head>

<body>
    <?php include_once './inc/header.php';?>

    <main id="main">
        <section class="section cart__area">
            <div class="container">
                <div class="responsive__cart-area">
                    <form class="cart__form">
                        <div class="cart__table table-responsive">
                            <table width="100%" class="table">
                                <thead>
                                    <tr>
                                        <th>PRODUCT</th>
                                        <th>NAME</th>
                                        <th>UNIT PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody class="item_container" id="ajax_form_fetch">
                 

                                </tbody>
                            </table>
                        </div>

                        <div class="cart-btns">
                            <div class="continue__shopping">
                                <a href="./cart.php">Continue Shopping</a>
                            </div>
                            <div class="check__shipping" onclick="shipping();">
                                <input type="checkbox" class="shipping__box">
                                <span>Shipping(+100 dh)</span>
                            </div>
                        </div>

                        <div class="cart__totals">
                            <h3>Cart Totals</h3>
                            <ul>
                                <li>
                                    Subtotal
                                    <span class="new__price subtotal">0 dh</span>
                                </li>
                                <li>
                                    Shipping
                                    <span class="shipping__area">0 dh</span>
                                </li>
                                <li>
                                    Total
                                    <span class="new__price total__price_area">0 dh</span>
                                </li>
                            </ul>
                            <a href="./cart.php">PROCEED TO CHECKOUT</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Facility Section -->
        <section class="facility__section section" id="facility">
            <div class="container">
                <div class="facility__contianer">
                    <div class="facility__box">
                        <div class="facility-img__container">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-airplane"></use>
                            </svg>
                        </div>
                        <p>FREE SHIPPING WORLD WIDE</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-credit-card-alt"></use>
                            </svg>
                        </div>
                        <p>100% MONEY BACK GUARANTEE</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                            </svg>
                        </div>
                        <p>MANY PAYMENT GATWAYS</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-headphones"></use>
                            </svg>
                        </div>
                        <p>24/7 ONLINE SUPPORT</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

<!-- Footer -->
    <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer__top">
        <div class="footer-top__box">
          <h3>BONUS</h3>
          <a href="#">Brand</a>
          <a href="#">Gift Certificates</a>
          <a href="#">Our Affiliate Program</a>
        </div>
        <div class="footer-top__box">
          <h3>INFORMATION</h3>
          <a href="#">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Contact Us</a>
        </div>
        <div class="footer-top__box">
          <h3>ACCOUNT</h3>
          <a href="#">My Account</a>
          <a href="#">Order History</a>
          <a href="#">Wish List</a>
        </div>
        <div class="footer-top__box">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-location"></use>
              </svg>
            </span>
            126 Marjane 2 Meknes , Maroc
          </div>
          <div>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-envelop"></use>
              </svg>
            </span>
            ASCIITEMS@gmail.com
          </div>
          <div>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-phone"></use>
              </svg>
            </span>
            +2120612215103
          </div>
          <div>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-paperplane"></use>
              </svg>
            </span>
            Meknes , Morocco
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer-bottom__box">

      </div>
      <div class="footer-bottom__box">

      </div>
    </div>
    </div>
    </footer>

     <!-- Go To -->

  <a href="#header" class="goto-top scroll-link">
    <svg>
      <use xlink:href="./images/sprite.svg#icon-arrow-up"></use>
    </svg>
  </a>


    <?php include_once './inc/scripts.php'; ?>

    <script>
        $(document).ready(function () {
            $.ajax({
                url:'./inc/ajax_cart.php',
                type:'POST',
                cache:false,
                data:{
                  info:'<?php echo $_SESSION['name']."&".$_SESSION['email']; ?>'
                
                },beforeSend: function() {
                    $('.gif').addClass('show');// Note the ,e that I added
                },success:function(e){
                    $('.gif').removeClass('show');
                    $("#ajax_form_fetch").html(e);
                }
            });

        });

    </script>
    <!-- <script src="./js/cart.js" async></script> -->
</body>
</html>

<?php
}
?>