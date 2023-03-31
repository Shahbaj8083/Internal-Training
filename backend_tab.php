<?php

Include ('db_connect.php');
$insertSuccess = false;

//$_SERVER['REQUEST_METHOD']=='POST' && 

if(isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    
    $name = $_POST['name'];
    $area = $_POST['area'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
   
    exit;
    $sql = "INSERT INTO warehouse(name,area,pincode,city,state,country)
     VALUES ('$name','$area',$pincode,$city,$state,'$country')";
    $res=mysqli_query($conn, $sql); 
    if($res){
        $insertSuccess = true;
        // header('Location:seller.php');
    }
   
}
?>

