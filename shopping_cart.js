//for increase the quantity of cart item, when $_SESSION['loggedin] is true
$(document).ready(function(){
   
   
    $('.increment-btn').click(function(e){
        e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.product_id').val();
            var qty = $(this).closest('.product_data').find('.quantity').val();
           
            var value = parseInt(qty,10);

            if(value < 10){//not allow to add same product more than ten times
                value++;
                $(this).closest('.product_data').find('.quantity').val(value);

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/H_Cart/inc_dec.php',
                    data : {
                        'call': 'ajax',
                        'product_id': prod_id,
                        'prod_qty' : value,
                    },
                    success: function(response) {
                        // location.reload(true);
                        if(response==200){
                            // alert(200);
                            window.location="http://localhost/H_Cart/shopping_cart.php";
                        }s
                        // }else if(response==500){
                        //     // alert(500);
                        //     window.location="http://localhost/H_Cart/shopping_cart.php";
                        // }
                    }
                  });
            }
    });
});
//----------------------------------------------------------------------------



//for decrease the quantity of cart item, when $_SESSION['loggedin] is true
$(document).ready(function(){
    

    $('.decrement-btn').click(function(e){
        e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.product_id').val();
            var qty = $(this).closest('.product_data').find('.quantity').val();
        
            var value = parseInt(qty,10);
            if(value > 1){

                value--;
                $(this).closest('.product_data').find('.quantity').val(value);

            

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/H_Cart/inc_dec.php',
                    data : {
                        'call': 'ajax',
                        'product_id': prod_id,
                        'prod_qty' : value,
                    },
                    success: function(response) {
                        // location.reload(true);
                        if(response==200){
                            // alert(200);
                            window.location="http://localhost/H_Cart/shopping_cart.php";
                        }
                       
                    }
                  
                });
            }
    });
});
//----------------------------------------------------------------------------------


         
        
//for increase the quantity in cart when no one is logged in.
$(document).ready(function(){
   
   
    $('.session-increment-btn').click(function(e){
        e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.product_id').val();
            var qty = $(this).closest('.product_data').find('.quantity').val();
           
            var value = parseInt(qty,10);

            if(value < 10){//not allow to add same product more than ten times
                value++;
                $(this).closest('.product_data').find('.quantity').val(value);

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/H_Cart/session_cart.php',
                    data: {
                                'call': 'ajax123',
                                'product_id': prod_id,
                                'prod_qty' : value,
                            },
                    success: function(response){
                        console.log(response);
                        if(response==200){
                            console.log("success");
                            window.location="http://localhost/H_Cart/shopping_cart.php";
                        }
                    },error : function(err){
                            console.log("hello bhai error aa gaya hai",err);
                    }
                 });
            }
    });
});
//---------------------------------------------------------------------------------------------


//for decrease the quantity in cart when no one is logged in
$(document).ready(function(){
    

    $('.session-decrement-btn').click(function(e){
        e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.product_id').val();
            var qty = $(this).closest('.product_data').find('.quantity').val();
        
            var value = parseInt(qty,10);
            if(value > 1){

                value--;
                $(this).closest('.product_data').find('.quantity').val(value);

            
                // $(this).serialize({'prod_qty' : value}),
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/H_Cart/session_cart.php',
                    data: {
                                'call': 'ajax123',
                                'product_id': prod_id,
                                'prod_qty' : value,
                            },
                    success: function(response){
                        console.log(response);
                        if(response==200){
                            console.log("success");
                            window.location="http://localhost/H_Cart/shopping_cart.php";
                        }
                    },error : function(err){
                            console.log("hello bhai error aa gaya hai",err);
                    }
                 });
            }
    });
});
//-------------------------------------------------------------------------------------




               
        