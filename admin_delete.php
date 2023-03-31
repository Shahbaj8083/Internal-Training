<?php
    include('db_connect.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM login_credentials WHERE id = $id";

    $execute_query = mysqli_query($conn, $sql);
    if($execute_query){
        header('Location:manage_accounts.php');
    }
?>