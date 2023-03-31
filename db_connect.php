<?php 
#.env
$servername = "localhost";
$username = "shahbaj";
$password = "password";
$db = "hcart";

$conn = mysqli_connect($servername,$username,$password,$db);

 if($conn){
    // echo "successfully connected!";
 }
 else{
    die("error".mysqli_connect_error());
 }
?>