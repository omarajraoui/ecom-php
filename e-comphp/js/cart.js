function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(function() {
    


    var removeBtn = document.getElementsByClassName('remove__cart');
    for(var i=0; i<removeBtn.length; i++) { 
      var btn_r = removeBtn[i] ;
      btn_r.addEventListener('click', removeBtnFunc);
    }
    var upd_quan = document.getElementsByClassName('item__quan');
    for(var i=0; i<upd_quan.length; i++) { 
      var input = upd_quan[i] ;
      input.addEventListener('change', quanChange);
    }

    addtoadd();
    udp_cart_total();
    shipping();
});
    function quanChange (event) { 
        var input = event.target;
        var p_id = input.getAttribute("data-id");
        var nval = input.value
        if(isNaN(input.value) || input.value <= 0){
            input.value = 1
        }
        $.ajax({
            type: "POST",
            url: "./inc/upd_ajax.php",
            data: {
                product_id:p_id,
                nval:nval
            },
            success: function (e) {
                udp_cart_total();
                console.log(e);
            }
        });
        
    }
    function removeBtnFunc (event) {
        var btn_clicked = event.target;
        var p_id = btn_clicked.getAttribute("data-id");
            $.ajax({
                type: "POST",
                url: "./inc/delete_ajax.php",
                data: {
                    product_id:p_id
                },
                success: function (e) {
                    btn_clicked.parentElement.parentElement.parentElement.remove();
                    udp_cart_total();
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted Successfuly'
                    });
                    console.log(e);
                }
            });

    }
    function udp_cart_total () {
        var cont;
        var total = 0;
        cont = document.getElementsByClassName('item_container')[0];
        var items = cont.getElementsByClassName('row_container');
        for (let i = 0; i < items.length; i++) {
            var item = items[i];
            var i_price = item.getElementsByClassName('new__price')[0].innerText;
            var i_quan  = item.getElementsByClassName('item__quan')[0].value;

            total = total + (i_price * i_quan);
        }

        document.getElementsByClassName('subtotal')[0].innerText = total + ' dh'
        addtoadd();
    }
    function shipping (event) { 
        var checkbox = document.getElementsByClassName("shipping__box")[0];
    checkbox.addEventListener('change', (e) => {
        if(e.target.checked){
            document.getElementsByClassName("shipping__area")[0].innerText = 100 + " dh";
        }else{
            document.getElementsByClassName("shipping__area")[0].innerText = "0 dh";
        }
        addtoadd();
    });

    }
    function addtoadd() { 
        var old = parseInt( document.getElementsByClassName('subtotal')[0].innerText.replace(' dh', ''));
        var ship_old = parseInt(document.getElementsByClassName("shipping__area")[0].innerText.replace(' dh', ''));

        document.getElementsByClassName('total__price_area')[0].innerText =  (old + ship_old) + ' dh';
    }



    // ('','1','2','3'),('','1','2','3'),('','1','5','1'),('','2','2','3'),('','2','5','1')