<!-- <h1>Shopping cart session code without loggedIn</h1> -->
<?php 
//This code is only used for cart session to store in the cart without login.

include('db_connect.php');
  
session_start();


//-----------------------------------------------------------------
//storing the shopping cart data in the session

if(isset($_POST['submit']) && !$_SESSION['loggedin']){
   
    //This if condition will check is there any data inside shopping cart session
    if(isset($_SESSION['shopping_cart'])){
        //fetching the 'item_id' column from the session array
        $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");

        //if the id($_GET['id'])) you requested is not in the id column ($item_array_id)
        if(!in_array($_GET['id'],$item_array_id)){

            //it will count the session array length
            $count = count($_SESSION['shopping_cart']);
            

            //count the number of items added to the cart
            $_SESSION['cart_count'] += $_POST["quantity"];

            $item_array = array(
                'item_id'       => $_GET["id"],
                'item_img'       => $_POST["hidden_img"],
                'item_name'     => $_POST["hidden_name"],
                'item_price'    => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
           );
           $_SESSION['shopping_cart'][$count] = $item_array;
        }
        else{
            // echo "Item already added!";

            echo "<script> Alert('Item already added') </script>";
            echo "<script> window.location = 'home.php' </script>";

        }
    }

    //if there is no any data inside shopping cart session then add these data inside array which I got after post action
    else{
        //if there is not item in cart initialise the cart count with the first item quantity
        $_SESSION['cart_count'] = $_POST["quantity"];

        //initialise $item_array variable
           $item_array = array(
                'item_id'       => $_GET["id"],
                'item_img'      => $_POST["hidden_img"],
                'item_name'     => $_POST["hidden_name"],
                'item_price'    => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
           );

           $_SESSION['shopping_cart'][0] = $item_array;

    }
}
//--------------------------------------------------------------------------------


else if(isset($_POST['submit']) && $_SESSION['loggedin']){
    $product_id = $_GET['id']; //this is product id
    $user_id = $_SESSION['userID'];
    $quantity = $_POST['quantity'];
    
    $mySql = "SELECT * FROM cart WHERE product_id = $product_id";
    $executeMysql = mysqli_query($conn, $mySql);

    $rowCount = mysqli_num_rows($executeMysql);

    //if add to cart button clicked and that product is not present in cart then add it to the cart_database
    if($rowCount < 1){
        $sql = "INSERT INTO cart(user_id, product_id, quantity) values($user_id, $product_id, $quantity)";
        $execute_query = mysqli_query($conn, $sql);
    }
    else{
        header('Location:home.php');
        $already_present = true;
        // echo $already_present;
    }
   

}

// //inserting the session data to the database when (role1)user is loggedIN
// if($_SESSION['shopping_cart'] && ($_SESSION['role']==1)){

//     $userID = $_SESSION['userID'];
   

//     foreach($_SESSION['shopping_cart'] as $keys => $values){

//         $pid = $values['item_id'];
//         $qty = $values['item_quantity'];

//         $sql = "INSERT INTO cart(user_id, product_id, quantity) values($userID, $pid, $qty)";

//         $execute_query = mysqli_query($conn, $sql);
//     }

//     //after inserting to database remove all items from session
//     unset($_SESSION['shopping_cart']);
// }




// <!-- <h1>Deleting the cart item </h1> -->

if(isset($_GET["remove"])){

    //if not logged in then unset the session
    if(!$_SESSION['loggedin']){
        foreach($_SESSION['shopping_cart'] as $keys => $values){
            if($values["item_id"] == $_GET["id"]){

                unset($_SESSION["shopping_cart"][$keys]);
                
                //decreasing the cart count
                $_SESSION['cart_count'] -= $_GET["qty"];

                // echo "<script>window.location = 'shopping_cart.php'</script>";
                header('Location:shopping_cart.php');
            }
        }
    }
    //if logged in then delete from the cart_database
    else{
        $id = $_GET['id'];
        $user = $_SESSION['userID'];

        $sql = "DELETE FROM cart WHERE id=$id AND user_id = '$user'";
        $execute_qry = mysqli_query($conn, $sql);

        $_SESSION['cart_count'] -= $_GET["qty"];
        // echo "<script>window.location = 'shopping_cart.php'</script>";
        header('Location:shopping_cart.php');
    }
}

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="shopping_cart.js"></script>
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
    </div>
    <div class=" container  mt-5" style="width:60rem;">

        <div>
            <div class="card-header">
                <a href="home.php" class="btn btn-dark"><i class="fa-solid fa-circle-arrow-left"> </i> Home </a>
            </div>

            <div class=" card d-flex justify-content-center align-items-center text-danger mb-5">
                <h2>Your Cart</h2>
            </div>
        </div>

        <table class=" table" style=" min-height:6rem;">
            <thead>
                <tr>

                    <th scope="col" width="10%"></th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class=" text-align-center">
                <?php 
            


            //This is cart table of session when no one is logged in

            if((!empty($_SESSION['shopping_cart'])) && (!$_SESSION['loggedin'])){
           
              
    
    
              foreach($_SESSION['shopping_cart'] as $keys => $values){
                ?>

                <tr>
                    <td>
                        <img src="http://localhost/H_Cart/images/<?php echo $values['item_img']; ?>" height="60px"
                            width="60px">
                    </td>

                    <td>
                        <?php echo $values['item_name']; ?>
                    </td>

                    <td>
                        <?php echo $values['item_price']; ?>
                        <input type="hidden" class="price" value=" <?php echo $values['item_price']; ?>">
                        <input type="hidden" class="product_id" value=" <?php echo $values['item_id']; ?>">
                    </td>

                    <td>

                        <div class="product_data input-group mb-3" style="width:120px">

                            <span class="input-group-text session-decrement-btn" onclick="subTotal()"> - </span>
                            <input type="hidden" class="product_id" value=" <?php echo $keys; ?>">

                            <input type="text" disabled class="form-control quantity qty"
                                 value="<?php echo $values['item_quantity']; ?>" >

                            <span class="input-group-text session-increment-btn" onclick="subTotal()"> + </span>

                        </div>


                    </td>
                    <td class="total">0
                        <!-- <?php echo number_format($values['item_quantity'] * $values['item_price'],2);  ?> -->
                    </td>
                    <td>
                        <a
                            href="shopping_cart.php?remove=del&id=<?php echo $values['item_id']; ?>&qty=<?php echo $values['item_quantity']; ?> "><span
                                class="text-danger text-decoration-none"> Remove </span></a>
                    </td>
                </tr>
                <?php
                             $total +=($values["item_quantity"] * $values["item_price"]);
              }
              ?>
                <tr>
                    <th colspan="4">Total</th>
                    <th colspan="3" class="grand_total">
                        <?php echo '$ '.number_format($total,2); ?>
                    </th>
                </tr>

                <?php
            }

            //session shopping_cart table ends here



            //This code executes when someone logged in
            else if($_SESSION['loggedin']){

                $grand_total = 0;

                $id = $_SESSION['userID'];

                $cart_count = 0;//store the cart count value

                $sql = "SELECT * FROM cart WHERE user_id= $id "; 
                $query_execute = mysqli_query($conn, $sql);
            
                $check_product = mysqli_num_rows($query_execute); //checking number of rows
    
                if($check_product > 0){
                    
                while($row = mysqli_fetch_assoc($query_execute)){

                    $cart_count += $row['quantity'];

                    $product_id = $row['product_id'];
                    $mysql = "SELECT * FROM product WHERE p_id = $product_id";

                    $execute_mysql = mysqli_query($conn, $mysql);
                    
                    foreach($execute_mysql as $key => $data){
                        
                ?>

                <tr>
                    <td>
                        <img src="http://localhost/H_Cart/images/<?php echo $data['img']; ?>" height="60px"
                            width="60px">
                    </td>

                    <td>
                        <?php echo $data['name']; ?>
                    </td>

                    <td>
                        <?php echo $data['price']; ?>
                        <input type="hidden" class="price" value=" <?php echo $data['price']; ?>">
                    </td>

                    <td>

                        <div class="product_data input-group mb-3" style="width:120px">
                            <input type="hidden" class="product_id" value=" <?php echo $product_id; ?>">

                            <span class="input-group-text decrement-btn inc-quantity" onclick="subTotal()"> - </span>

                            <input type="text" disabled class="form-control quantity qty" id="qty"
                                value="<?php echo $row['quantity']; ?>">

                            <span class="input-group-text increment-btn dec-quantity" onclick="subTotal()"> + </span>

                        </div>


                    </td>
                    <td class="total">0
                        <!-- <?php echo number_format($row['quantity'] * $row['price'],2);  ?> -->
                    </td>
                    <td>
                        <a href="shopping_cart.php?remove=del&id=<?php echo $row['id']; ?>"><span
                                class=" text-danger text-decoration-none" style="text-decoration:none; !important">
                                Remove </span></a>
                    </td>
                </tr>
                <?php
                             $grand_total +=($row["quantity"] * $data["price"]);
                }
            }
            $_SESSION['cart_count'] = $cart_count;
        }
              ?>
                <tr>
                    <th colspan="4">Total</th>
                    <th colspan="3" class="grand_total">
                        <?php echo '$ '.number_format($grand_total,2); ?>
                    </th>
                </tr>

                <?php
            }
                ?>



            </tbody>


        </table>


        <div class=" card d-flex justify-content-center align-items-center text-danger mt-5">
            <a href="checkout.php" class="text-decoration-none">
                <h2>Check out</h2>
            </a>
        </div>


    </div>


    <script>

        var price = document.getElementsByClassName('price');
        var quantity = document.getElementsByClassName('qty');
        var total = document.getElementsByClassName('total');
        // var grand_total = document.getElementsByClassName('.grand_total');

        //this function is calculating the total price
        function subTotal() {

            for (var i = 0; i < price.length; i++) {
                total[i].innerText = (price[i].value) * (quantity[i].value);
                //  console.log($_SESSION['shopping_cart']['item_quantity']);
            }
        }
        subTotal();


    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>



</body>

</html>