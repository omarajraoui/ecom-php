$(document).ready(function () {
          
    $("#sign_up_in").on('click', () =>{
      $("#panel_s").toggle("none");
    })
    $("#left").on('click', () =>{
      $("#form_sign").removeClass("none");
      $("#form_log").addClass("none");
    });
    $("#right").on('click', () =>{
      $("#form_log").removeClass("none");
      $("#form_sign").addClass("none");
    });

    $("#submit_btn_log_in").on('click', () => { 

      var email = $('#email').val();
      var pass  = $('#pass').val();
      var csrf  = $('#csrf').val();
      if( email != "" && pass != "" ){
            $.ajax({
                url:'./LogIn_user.php',
                type:'POST',
                cache:false,
                data:{
                  csrf:csrf,
                  email:email,
                  pass:pass
                },beforeSend: function() {
                    $('.gif').addClass('show');// Note the ,e that I added
                },success:function(e){
                    $('.gif').removeClass('show');
                    $("#message").html(e);
                }
            });
        }
      

    });

    $("#submit_btn_sign_up").on('click', () => { 

      var name = $('#uname').val();
      var email = $('#e_mail').val();
      var pass  = $('#passw').val();
      var cpass  = $('#cpassw').val();

      if( email != "" && pass != "" && cpass != "" && name != ''){
            $.ajax({
                url:'./reg_user.php',
                type:'POST',
                cache:false,
                data:{
                  name:name,
                  email:email,
                  pass:pass
                },beforeSend: function() {
                    $('.gif').addClass('show');// Note the ,e that I added
                },success:function(e){
                    $('.gif').removeClass('show');
                    $("#message_box").html(e);
                }
            });
        }
      

    });


  });
