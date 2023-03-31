<?php 
    include('db_connect.php');

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE login_credentials SET status= $status WHERE id=$id"; 
    $sql1 = "UPDATE product SET p_status = $status WHERE seller_id = $id";
    $execute_query = mysqli_query($conn, $sql);
    $execute_query1 = mysqli_query($conn, $sql1);
    
    if($execute_query && $execute_query1){
        header('Location:manage_accounts.php');
    }
    

?>