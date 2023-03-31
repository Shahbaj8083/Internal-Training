<?php 
//if $login is true show logout otherwise show login
    $login = true;
    session_start();
    $already_present = false;
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)){
        // header('Location: login.php');
        // exit;
        //if session started $login false means means login option will not display
        $login = false;
        
    }
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
                    // echo $_SESSION['cart_count'] ;
                    // exit;
                }
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
        <?php 
        
            if($already_present == true){
                
                echo '<div class="alert alert-danger" role="alert">
                         Product already added!
                     </div>'; 
                
            }
        ?>
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

                    <?php if($login){ 
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active text-primary text-light" aria-current="page" 
                                href="shopping_cart.php">Cart
                                <i class="fa-solid fa-cart-shopping"></i>

                            </a>
                            <span style="position:absolute; top:15px; right: 123px; font-size:.6rem;" id="cart" class="badge text-bg-danger rounded-pill">
                                <?php echo $_SESSION['cart_count']; ?>
                            </span>
                        </li>
                        <!-- <h1>if $login is true show logout</h1> -->
                        
                        <li class="nav-item ">
                            <a class="nav-link active text-light"  href="logout.php" >Logout <i
                                    class="fa-regular fa-user"></i></a>
                        </li>
                        
                        <!-- <h1>if not loggedin then show login option</h1> -->
                        <?php } else{ ?>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" 
                                    href="shopping_cart.php">Cart
                                    <i class="fa-solid fa-cart-shopping"></i></a>

                                <span style="position:absolute; top:18px; right: 110px; font-size:.6rem;" id="cart" class="badge text-bg-danger rounded-pill">
                                    <?php 
                                        if($_SESSION['cart_count'] > 0){

                                            echo $_SESSION['cart_count']; 
                                        }
                                        else{
                                            echo 0;
                                        }
                                    ?>
                                </span>                        
                            </li>

                            <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="login.php">Login <i
                                    class="fa-regular fa-user"></i></a>
                            </li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
        </nav>
        <div style="background-color:#dfedf0;">
       
            
                <span class="bg-danger text-light h4"><?php if($_SESSION['username']) echo "Welcome ".$_SESSION['username']."!"; ?></span>
       
                <?php 
                    
                    include('fetch_product.php');
               ?>
        </div>
    </div>           
                   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>