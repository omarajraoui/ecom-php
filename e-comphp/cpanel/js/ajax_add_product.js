$(document).ready(function () {
    $(function() {
        $("#new_product").ajaxForm({
            beforeSend:function() {
                $('#output').html("<img src='../assets/loadings/loader.gif' style='text-align:center;width:100px'/>");
            },success:function(data) {

                $('#output').html(data);
                
            }
        });
});
});



