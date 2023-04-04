<?php 
    include('db_connect.php');

    $login = true;
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)){
        // header('Location: login.php');
        // exit;
        $login = false;
    }
 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container-fluid">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">
                <a class="navbar-brand fs-2 text-primary" href="seller.php">H-<span class="text-primary">CART</span></a>
                <span class="text-info">SELLER</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 text-end">


                        <?php if($login){ ?>

                        <li class="nav-item">

                            <div class="dropstart" style="position:absolute right:0">
                                <a class="dropdown-toggle text-decoration-none text-light" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <?php if($_SESSION['username']) echo $_SESSION['username']; ?> <i
                                        class="fa-regular fa-user"> </i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" onclick="show_payment()"> Add Product</a>
                                    </li>
                                    <li><a class="dropdown-item" href="manage_seller_product.php">
                                            Manage Products</a></li>
                                    <li><a class="dropdown-item" href="warehouse.php">
                                            Add Warehouse</a></li>
                                    <!-- <li><a class="dropdown-item" href="insert_product.php">Manage user</a></li> -->
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>

                        <?php } else{ 
                            // header('Location:login.php');
                            
                        }?>
                        
                    </ul>

                </div>
            </div>
        </nav>
        
       
            <div id="main-view">
            <?php  include('fetch_product.php'); ?>
            </div>

        <form class="container-fluid card d-flex me-auto col-10 col-md-10 col-lg-6" action="" method="post"
             enctype="multipart/form-data">

            <div id="payment" style="display:none;">
                <?php  include('add_payment_details.php'); ?>
            </div>

            <div id="warehouse" style="display:none;">
                <?php  include('add_warehouse_details.php'); ?>
            </div>

            <div id="product" style="display:none;">
                <?php  include('add_product_details.php'); ?>
            </div>

        </form>    
        

        <script>
            function show_payment(){
                document.getElementById('payment').style.display = "block";
                document.getElementById('main-view').style.display = "none";
            }

            function next1(){
                document.getElementById('payment').style.display = "none";
                document.getElementById('main-view').style.display = "none";
                document.getElementById('warehouse').style.display = "block";
                document.getElementById('product').style.display = "none";
            }

            function back1(){
                document.getElementById('payment').style.display = "block";
                document.getElementById('main-view').style.display = "none";
                document.getElementById('warehouse').style.display = "none";
                document.getElementById('product').style.display = "none";
            }

            function next2(){
                document.getElementById('warehouse').style.display = "none";
                document.getElementById('payment').style.display = "none";
                document.getElementById('main-view').style.display = "none";
                document.getElementById('product').style.display = "block";
            }

            function back2(){
                document.getElementById('payment').style.display = "none";
                document.getElementById('main-view').style.display = "none";
                document.getElementById('warehouse').style.display = "block";
                document.getElementById('product').style.display = "none";
            }

            function submitt(){
                document.getElementById('myform').submit();
            }


        </script>
    </div>
        

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>