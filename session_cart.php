<?php
//session cart increase decrease button code

    session_start();
    
    $id = trim($_POST['product_id']);
    $qty =$_POST['prod_qty'];

     $_SESSION['shopping_cart'][$id]['item_quantity'] = $qty  ;


    //this code is to count the number of items available in the session
    foreach($_SESSION['shopping_cart'] as $keys=> $values){
        $item_count += $values['item_quantity'];
    }
    $_SESSION['cart_count'] = $item_count;
     //---------------------------------------------------

    echo 200;
?>