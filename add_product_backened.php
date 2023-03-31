<?php
session_start();
Include ('db_connect.php');
$insertSuccess = false;
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    // echo "<pre>";
    // print_r($_POST);
    
    $name = $_POST['name'];
    $des = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $warehouse = $_POST['warehouse'];
    $pname = $_FILES["image"]["name"];
    $role = $_SESSION['userID'];
    // echo $role;
    $tname = $_FILES["image"]["tmp_name"];
    // print_r($_FILES);
    move_uploaded_file($tname,'images/'.$pname);
    // exit;
    $sql = "INSERT INTO product(name,des,price,quantity,discount,warehouse,img,seller_id,p_status)
     VALUES ('$name','$des',$price,$quantity,$discount,'$warehouse','$pname',$role,1)";
    $res=mysqli_query($conn, $sql); 
    if($res){
        $insertSuccess = true;
        header('Location:seller.php');
    }
   
}
?>