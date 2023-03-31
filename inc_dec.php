<?php
    include('db_connect.php');
    

    // if(isset($_POST['submit'])){
        $qty = $_POST['prod_qty'];
        $id = $_POST['product_id'];

        $sql = "UPDATE cart SET quantity = $qty WHERE product_id = $id";
        $execute_query = mysqli_query($conn, $sql);
        if($execute_query){
            echo 200;
        }else{
            echo 500;
        }
    // }
?>