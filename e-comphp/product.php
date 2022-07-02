<?php
  require './controllerUserData.php';
  $p_id =  (int)$_GET['p'];
  if(isset($_GET['p']) && !empty($p_id)){
      $query = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = '$p_id'");
      if(mysqli_num_rows($query) > 0){
        $assoc = mysqli_fetch_assoc($query);
        // DESCRIPTION GUIDE
        if(isset($assoc['p_descri']) && !empty($assoc['p_descri'])){
          $pieces = explode('|', $assoc['p_descri']);
        $img1   = $pieces[0];
        $img2   = $pieces[1];
        $img3   = $pieces[2];
        $img4   = $pieces[3];
        $img5   = $pieces[4];
        $mini_description       = $pieces[5];
        $review                 = (int)$pieces[6];
        $brand                  = $pieces[7];
        $description_unhached   = $pieces[8];
        }
        


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include './inc/headers.php'; ?>

  <title>ASCIITEMS | <?php echo $assoc['title']; ?> </title>
</head>

<body>
  <?php include './inc/header.php'; ?>
  <main id="main">


    <div class="container">
      <!-- Products Details -->
      <section class="section product-details__section container">
        <div class="product-detail__container row">
          <div class="product-detail__left col-md-6">
            <div class="details__container--left">
              <div class="product__pictures">
                <div class="pictures__container">
                  <img class="picture" src="<?php echo $img1;?>" id="pic_<?php echo $img1;?>" />
                </div>
                <div class="pictures__container">
                  <img class="picture" src="<?php echo $img2;?>" id="pic_<?php echo $img2;?>" />
                </div>
                <div class="pictures__container">
                  <img class="picture" src="<?php echo $img3;?>" id="pic_<?php echo $img3;?>" />
                </div>
                <div class="pictures__container">
                  <img class="picture" src="<?php echo $img4;?>" id="pic_<?php echo $img4;?>" />
                </div>
                <div class="pictures__container">
                  <img class="picture" src="<?php echo $img5;?>" id="pic_<?php echo $img5;?>" />
                </div>
              </div>
                <div class="product__picture" id="product__picture">
                  <div class="picture__container">
                    <img src="<?php echo $assoc['image'];?>" id="pic" />
                  </div>
                </div>
               <div class="zoom" id="zoom"></div>
            </div>

            <div class="product-details__btn">
              <a class="add" href="<?php echo './cart.php?add='.$p_id;?>">
                <span>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-cart-plus"></use>
                  </svg>
                </span>
                ADD TO CART</a>
              <a class="buy" href="#">
                <span>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                  </svg>
                </span>
                BUY NOW
              </a>
            </div>
          </div>

          <div class="product-detail__right col-md-6">
            <div class="product-detail__content">
              <h3><?php echo $assoc['title'];?></h3>
              <div class="price">
                <span class="new__price"><?php echo $assoc['price'];?> dh</span>
              </div>
              <div class="product__review">
                <div class="rating">
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                  </svg>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                  </svg>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                  </svg>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                  </svg>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                  </svg>
                </div>
                <a href="#" class="rating__quatity"><?php echo $review;?> reviews</a>
              </div>
              <p>
                <?php echo $mini_description;?>
              </p>
              <div class="product__info-container">
                <ul class="product__info">
                  <li>
                    <span>Subtotal:</span>
                    <a href="#" class="new__price"><?php echo $assoc['price'];?> dh</a>
                  </li>
                  <li>
                    <span>Brand:</span>
                    <a href="#"><?php echo $brand;?></a>
                  </li>
                  <li>
                    <span>Product Type:</span>
                    <a href="#"><?php echo $assoc['category'];?></a>
                  </li>
                  <li>
                    <span>Availability:</span>
                    <?php echo get_stock_inva($p_id, $con);?>
                  </li>
                </ul>
                <div class="product-info__btn">
                  <a href="#">
                    <span>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-truck"></use>
                      </svg>
                    </span>&nbsp;
                    SHIPPING
                  </a>
                  <a href="#">
                    <span>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-envelope-o"></use>
                      </svg>&nbsp;
                    </span>
                    ASK ABOUT THIS PRODUCT
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="product-detail__bottom">
          <div class="title__container tabs">

            <div class="section__titles category__titles ">
              <div class="section__title detail-btn active" data-id="description">
                <span class="dot"></span>
                <h1 class="primary__title">Description</h1>
              </div>
            </div>

            <div class="section__titles">
              <div class="section__title detail-btn" data-id="shipping">
                <span class="dot"></span>
                <h1 class="primary__title">Shipping Details</h1>
              </div>
            </div>
          </div>

          <div class="detail__content">
            <div class="content active" id="description">
              <?php  echo ret_val_wh5($description_unhached); ?>
            </div>
            <div class="content" id="shipping">
              <h3>Returns Policy</h3>
              <p>You may return most new, unopened items within 30 days of delivery for a full refund. We'll also pay
                the return shipping costs if the return is a result of our error (you received an incorrect or defective
                item, etc.).</p>
              <p>You should expect to receive your refund within four weeks of giving your package to the return
                shipper, however, in many cases you will receive a refund more quickly. This time period includes the
                transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes
                us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to
                process our refund request (5 to 10 business days).
              </p>
              <p>If you need to return an item, simply login to your account, view the order using the 'Complete
                Orders' link under the My Account menu and click the Return Item(s) button. We'll notify you via
                e-mail of your refund once we've received and processed the returned item.
              </p>
              <h3>Shipping</h3>
              <p>We can ship to virtually any address in the world. Note that there are restrictions on some products,
                and some products cannot be shipped to international destinations.</p>
              <p>When you place an order, we will estimate shipping and delivery dates for you based on the
                availability of your items and the shipping options you choose. Depending on the shipping provider you
                choose, shipping date estimates may appear on the shipping quotes page.
              </p>
              <p>Please also note that the shipping rates for many items we sell are weight-based. The weight of any
                such item can be found on its detail page. To reflect the policies of the shipping companies we use, all
                weights will be rounded up to the next full pound.
              </p>
            </div>
          </div>
        </div>
      </section>

  
    </div>
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
  <!-- End Footer -->

  <!-- Go To -->

  <a href="#header" class="goto-top scroll-link">
    <svg>
      <use xlink:href="./images/sprite.svg#icon-arrow-up"></use>
    </svg>
  </a>

  <?php include './inc/scripts.php';?>
</body>

</html>
<?php
      }else{
        header("Location: index.php");
        $_SESSION['message_reg'] = "Product Not Found";
        $_SESSION['icon']        = "error";
      }
  }else{
    header("Location: index.php");
    $_SESSION['message_reg'] = "Empty id";
    $_SESSION['icon']        = "error";
  }

?>