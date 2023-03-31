<?php

//it will delete the particular product added by seller
    include('db_connect.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM product WHERE p_id = $id";

    $execute_query = mysqli_query($conn, $sql);
    if($execute_query){
        header('Location:manage_seller_product.php');
    }
?>