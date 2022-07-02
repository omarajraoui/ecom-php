<!-- Header -->
<header id="header" class="header">
    <div class="navigation">
      <div class="container">
        <nav class="nav">
          <div class="nav__hamburger">
            <svg>
              <use xlink:href="./images/sprite.svg#icon-menu"></use>
            </svg>
          </div>

          <div class="nav__logo">
            <a href="./index.php" class="scroll-link">
              ASCII<span class="items">ITEMS</span>
            </a>
          </div>


          <div class="nav__menu">
            <div class="menu__top">
              <span class="nav__category">PHONE</span>
              <a href="#" class="close__toggle">
                <svg>
                  <use xlink:href="./images/sprite.svg#icon-cross"></use>
                </svg>
              </a>
            </div>
            <ul class="nav__list">
              <li class="nav__item">
                <a href="index.php" class="nav__link scroll-link">Home</a>
              </li>
              <li class="nav__item">
                <a href="#category" class="nav__link scroll-link">Category</a>
              </li>
              <li class="nav__item">
                <a href="#news" class="nav__link scroll-link">Personnalise</a>
              </li>
              <li class="nav__item">
                <a href="#contact" class="nav__link scroll-link">Contact</a>
              </li>
            </ul>
          </div>

          <div class="nav__icons">
          <?php
                if(!isset($_SESSION['uid'])){
          ?>
            <a href="#" class="icon__item" id="sign_up_in">
              <svg class="icon__user">
                <use xlink:href="./images/sprite.svg#icon-user"></use>
              </svg>
            </a>
            <?php
                  }else{
            ?>
            <a href="profile.php?user=<?php echo $_SESSION['uid']?>" class="icon__item">
              <?php echo get_img_us($_SESSION['uid'], $con);?>
            </a>
            <a href="logout.php" class="icon__item">
              <i class="fa fa-sign-out-alt"></i>
            </a>

            <?php
                  }
            ?>
            <a href="cart.php" class="icon__item">
              <svg class="icon__cart">
                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
              </svg>
              <span id="cart__total">0</span>
            </a>
          
          </div>
  <?php
    if(!isset($_SESSION['uid'])){
  ?>
              <div id="panel_s" class="container styles_sign none">
                <form id="form_log">
                  <div class="container" id="message">
                  <img src="https://media.tenor.com/images/cac6f4f6ddbe92403ef75aab346d1f59/tenor.gif" class="gif ">
                  </div>
                  <input type="email" id="email" placeholder="E-mail">
                  <input type="password" id="pass" placeholder="Password">
                  <input type="hidden" id="csrf" value="<?php echo $csrf ?>">
                  <h6>Don't have an account <a href="#leftside" id="left">(SignUp)</a></h6>
                  <button type="button" id="submit_btn_log_in" class="btn_sub">Submit</button>
                </form>
                <form id="form_sign" class="none">
                  <div class="container" id="message_box"><img src="https://media.tenor.com/images/cac6f4f6ddbe92403ef75aab346d1f59/tenor.gif" class="gif "></div>
                  <input type="text" id="uname" placeholder="Username">
                  <input type="email" id="e_mail" placeholder="E-mail">
                  <input type="password" id="passw" placeholder="Password">
                  <input type="password" id="cpassw" placeholder="Confirm Password">
                  <h6>Already have account <a href="#rightside" id="right">(Log In)</a></h6>
                  <button type="button" id="submit_btn_sign_up" class="btn_sub">Submit</button>
                </form>
              </div>
  <?php
    }
  ?>

        </nav>
      </div>
    </div>

    
  </header>
  <!-- End Header -->