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
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 text-primary" href="home.php">H-<span class="text-primary">CART</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 text-end ">

                        <!-- <li class="nav-item">
                            <a class="nav-link active text-primary text-light" aria-current="page" 
                                href="shopping_cart.php">Cart
                                <i class="fa-solid fa-cart-shopping"></i>

                            </a>
                            <span style="position:absolute; top:15px; right: 123px; font-size:.6rem;" id="cart" class="badge text-bg-danger rounded-pill">
                               
                            </span>
                        </li> -->
                        <!-- <h1>if $login is true show logout</h1> -->
                        
                        <li class="nav-item ">
                            <a class="nav-link active text-light"  href="logout.php" >Logout <i
                                    class="fa-regular fa-user"></i></a>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>
    </div>

    <div class=" card d-flex justify-content-center align-items-center text-danger mt-5">
                <h2 class="text-decoration-none text-success">Payment Successful!</h2></a>
    </div>

</body>
</html>
