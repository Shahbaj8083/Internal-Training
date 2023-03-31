<?php 

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
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-white border-bottom " style="background-color: white !important;">
            <div class="container-fluid">
                <a class="navbar-brand fs-2" href="adminpage.php">H-<span class="text-primary">CART</span></a>
                <span class="text-success">ADMIN</span>
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
                                    <a class="dropdown-toggle text-decoration-none" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php if($_SESSION['username']) echo $_SESSION['username']; ?> <i
                                            class="fa-regular fa-user"> </i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="manage_accounts.php">Manage
                                                User/Seller accounts</a></li>
                                        <!-- <li><a class="dropdown-item" href="insert_product.php">Manage user</a></li> -->
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </li>

                            <?php } else{ ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login.php">Login <i
                                        class="fa-regular fa-user"></i></a>
                            </li>
                            <?php } ?>
                        </ul>

                </div>
            </div>
        </nav>
        
        <?php include('fetch_product.php') ?>

        

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>