	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
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
    unset($_SESSION['link']);
    
      }
  ?>
  <script src="js/ajax_add_product.js"></script>