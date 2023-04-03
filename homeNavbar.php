<!-- <h1>This is homepage navbar</h1> -->

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

                        <?php if($_SESSION['loggedin']){ 
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active text-primary text-light" aria-current="page"
                                href="shopping_cart.php">Cart
                                <i class="fa-solid fa-cart-shopping"></i>

                            </a>
                            <span style="position:absolute; top:15px; right: 123px; font-size:.6rem;" id="cart"
                                class="badge text-bg-danger rounded-pill">
                                <?php echo $_SESSION['cart_count']; ?>
                            </span>
                        </li>
                        <!-- <h1>if $login is true show logout</h1> -->

                        <li class="nav-item ">
                            <a class="nav-link active text-light" href="logout.php">Logout <i
                                    class="fa-regular fa-user"></i></a>
                        </li>

                        <!-- <h1>if not loggedin then show login option</h1> -->
                        <?php } else{ ?>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="shopping_cart.php">Cart
                                <i class="fa-solid fa-cart-shopping"></i></a>

                            <span style="position:absolute; top:18px; right: 110px; font-size:.6rem;" id="cart"
                                class="badge text-bg-danger rounded-pill">
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