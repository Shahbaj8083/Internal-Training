<?php 
//if $login is true show logout otherwise show login
    $login = true;
    session_start();
   
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)){
        
        //if session started $login false means means login option will not display
        $login = false;
        
    }
    //this code is for cart count only
    //------------------------------------------------------------
            if(isset($_SESSION['loggedin'])){
                include('db_connect.php');

                $_SESSION['cart_count'] = 0;

                $userID = $_SESSION['userID'];
           
                $sql = "SELECT * FROM cart WHERE user_id = $userID";
                $result = mysqli_query($conn, $sql);
                
                
                $check_product = mysqli_num_rows($result);
                
    
                if($check_product > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $_SESSION['cart_count'] += $row['quantity'];
                    }
                    
                }
            }
        //------------------------------------------------------------    
   
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
       
    <div class="container-fluid">
       <?php require('homeNavbar.php') ?>

        <div style="background-color:#dfedf0;">
       
                <span class="bg-danger text-light h4"><?php if($_SESSION['username']) echo "Welcome ".$_SESSION['username']."!"; ?></span>
       
                <?php 
                    
                    require('fetch_product.php');
                ?>
        </div>
    </div>           
                   
</body>
<script>
    $('#pForm').submit(function(){
       return false;
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>