<?php 
    include('db_connect.php');
    session_start();

    $user_id = $_SESSION['userID'];

    if(!$_SESSION['loggedin']){
        header('Location:login.php');
    }

    else{
        $sql = "DELETE FROM cart WHERE user_id = $user_id";
        $execute_query = mysqli_query($conn, $sql);
        unset($_SESSION['cart_count']);
        $_SESSION['cart_count'] = 0;
        // header('Location:shopping_cart.php');
    }
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
        <?php require('homeNavbar.php'); ?>
    </div>

    <div class=" card d-flex justify-content-center align-items-center text-danger mt-5">
                <h2 class="text-decoration-none text-success">Payment Successful!</h2></a>
    </div>

</body>
</html>
