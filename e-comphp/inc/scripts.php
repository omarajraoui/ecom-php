  <!-- Glide Carousel Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
  <!-- Animate On Scroll -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <?php
    if(isset($_SESSION['message_reg']) && 
       isset($_SESSION['icon']) && 
       $_SESSION['message_reg'] != '' && 
       $_SESSION['icon'] != '')
    {
  ?>
  <script>
    Swal.fire({
        icon: '<?php echo $_SESSION['icon']; ?>',
        title: '<?php echo $_SESSION['message_reg']; ?>'
        })
  </script>
  <?php
    unset($_SESSION['message_reg']);
    unset($_SESSION['icon']);
      }
  ?>
  
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Custom JavaScript -->
  <script src="./js/products.js"></script>
  <script src="./js/index.js"></script>
  <script src="./js/slider.js"></script>
  

  <?php
    if(!isset($_SESSION['uid'])){
      // if(isset($_SESSION['message_reg'])){
      //   echo '<!-- '.$_SESSION['message_reg'].' -->';
      // }else{
      //   echo '<!-- ERROR -->';
      // }
  ?>


  <script src="./js/new.js"></script>
  <script src="./js/ajax.js"></script>
  <?php
    }else{
  ?>
  <script>
    function update_cart() { 
      $.ajax({
                url:'./inc/get_cart_num.php',
                type:'POST',
                cache:false,
                data:{
                  info:'<?php echo $_SESSION['name']; ?>'
                },beforeSend: function() {
                    $('.gif').addClass('show');// Note the ,e that I added
                },success:function(element){
                    $('.gif').removeClass('show');
                    $("#cart__total").html(element);
                }
            });
    }
    setTimeout(() => {
        //UPDATE EVERY 8 sec
        update_cart();
    }, 8000);

    update_cart();
  </script>
  <?php
    }
  ?>