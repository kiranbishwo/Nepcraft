    // <!-- heaser part -->
        $(document).ready(function(){
            loadTable();
            update_amounts();
            loadOSummery();
            
            $(".hide-nav-links").hide();
            $(".bar_icon").click(function(){
            $(".hide-nav-links").fadeToggle();
            });
            // owl careousel

            $('.carousel').carousel({
                interval: 2000
                });
            $('.owl-carousel').owlCarousel({
                loop:true,
                nav:false,
                autoplay:true,
                // stagePadding: 30,
                autoplayTimeout:3000,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:2
                    },
                    768:{
                        items:4
                    }
                }
            });
 

            // for load cart
            $(document).on("click",".add-cart", function(){
                var p_id = $(this).data("id");
                $(".cart-badge").load(".cart-badge");
                // alert(p_id);
                // alert('product added to cart');
                
                $.ajax({
                url: "load_cart.php",
                type : "POST",
                data : {id: p_id},
                success : function(data){
                    
                    loadTable();
                    loadOSummery();
                    if(data == 1){
                        $('#alert_info').text('Product added to cart successfully.');
                    }else{
                        $('#alert_info').text('Product Doesn\'t added to cart.');
                    }

                    }
                });

            });
            // for wishlist
            $(document).on("click",".cart-heart", function(){
                var w_id = $(this).data("wid");
                // alert(w_id);
                $.ajax({
                url: "add_wishlist.php",
                type : "POST",
                data : {id: w_id},
                success : function(data){
                    // if(data==1){
                        $('#alert_info').text('Product added to wishlist successfully.');
                    // }else{
                    //     $('#alert_info').text('Product Doesn\'t added to wishlist.');
                    // }
                    }
                });

            });

        //Delete Records of cart
        $(document).on("click",".c-cancel-button", function(){
            var cart_id = $(this).data("id");
            update_amounts();
            var element = this;
            // alert(cart_id);

            $.ajax({
            url: "delete_cart.php",
            type : "POST",
            data : {cart_id : cart_id},
            success : function(data){
                loadTable();
                update_amounts();
                loadOSummery();
                if(data == 1){
                    $(element).closest("tr").fadeOut();
                    update_amounts();
                } else {
                    update_amounts();
                    $("#error-message").html("Can't Delete Record.").slideDown();
                    $("#success-message").slideUp();
                }
            }
            });
        
        });
        //Delete Records of wishlist
        $(document).on("click",".w-cancel-button", function(){
            var wish_id = $(this).data("wid");
            var element = this;
            

            $.ajax({
            url: "delete_wish.php",
            type : "POST",
            data : {wish_id : wish_id},
            success : function(data){
                if(data == 1){
                    $(element).closest("tr").fadeOut();
                }else{
                    // $("#error-message").html("Can't Delete Record.").slideDown();
                    // $("#success-message").slideUp();
                }
            }
            });
            
        });

        // load cart badgs
            function loadTable(){
            $.ajax({
                url : "badge-load.php",
                type : "POST",
                success : function(data){
                $(".cart-badge").text(data);
                // console.log(data);
                // console.log('hello');
                }
            });
        
            }

            // // for dinamic price calculator in cart

                
            $('.add , .sub').on('click', function() {
                update_amounts();
                // loadCart();
            });
            function update_amounts(){
                var sum = 0.0;
                $('#my_cart > tbody  > tr').each(function() {
                    var qty = parseInt($(this).find('.qtyBox').val());
                    var price = parseInt($(this).find('.priceBox').val());
                    var cart_id = $(this).find('.hidden_cart_id').val();
                    var amount = (qty*price)
                    sum+=amount;
                    
                    $(this).find('.totalBox').val('' + amount);

                        
                });
                // $('.total').text(sum);
                
            }

            //----------------for quantity-increment-or-decrement-------
            var incrementQty;
            var decrementQty;
            var plusBtn  = $(".add");
            var minusBtn = $(".sub");
            var incrementQty = plusBtn.click(function() {
                var $n = $(this)
                .parent(".button-container")
                .find(".qtyBox");
                $n.val(Number($n.val())+1 );
                update_amounts();
                // loadCart();
            });
            var decrementQty = minusBtn.click(function() {
                var $n = $(this)
                .parent(".button-container")
                .find(".qtyBox");
                var QtyVal = Number($n.val());
                if (QtyVal > 1) {
                    $n.val(QtyVal-1);
                }
                update_amounts();
                // loadCart();
            });

            // load order summery
            function loadOSummery(){
            $.ajax({
                url : "order_summery.php",
                type : "POST",
                success : function(data){
                $('.sub-total').text(data); 
                }
            });
        
            }
             
            

    });
// foe showing password 
var state= false;
function showpass(){
    if (state) {
        document.getElementById('password').setAttribute("type","password");
        document.getElementById('showpass').style.color='gray';
        state= false;
    }else{
        document.getElementById('password').setAttribute("type","text");
        document.getElementById('showpass').style.color='blue';
        state= true;
    }

}
