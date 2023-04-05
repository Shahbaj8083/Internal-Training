<?php

//inserting the session data to the database when (role1)user is loggedIN

//if request method is post means when we register the form it sends the post request 
//if conditions is true then "if" condition will execute.
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $loggedIn = false;
    $showErr = false;
    
    include('db_connect.php'); 

    
    if(empty($_POST['name'])){
        $nameError = "Username is mandatory";   
    }

    else{
        $username = $_POST['name'];
    }

    if(empty($_POST['password'])){
        $passError = "Password is mandatory";   
    }
    {
        $password = $_POST['password'];
    }
    
    
    if(!$nameError && !$passError){

            //considering the data is not exist first
            $exist = false;

            //selecting the data from login_credentials table if data available or not
            $sql = "SELECT * FROM login_credentials WHERE name = '$username' AND password='$password'"; 
            //executing the query        
            $result = mysqli_query($conn, $sql);

            //fetch all the rows present in the table
            $rows = mysqli_num_rows($result);

            //fetching the role of the person who logged in, is he user,seller or admin
            //according to that the pages will be shown to him.
            $role = mysqli_fetch_assoc($result);

            if($rows == 1 && $role['status']==1){//if status is 1 means user is active
                //row ==1 means data found in the database with that username and password
                // so allow him/her to login
                $loggedIn = true;
                

                //when user is logged in, start the session and store the required information in the session which will be used in other page
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['cart_count'] = 0;

                //this is user identity number who is logged in
                $_SESSION['userID'] = $role['id'];

                //this is user role id(user,seller or admin) who is logged in
                $_SESSION['role'] = $role['role_id'];


                //inserting the session data to the cart database while login as customer
                //------------------------------------------------------------------
                if($_SESSION['shopping_cart'] && ($_SESSION['role']==1)){
                    // echo "<pre>";
                    // echo $_SESSION['role'];
                    // print_r($_SESSION['shopping_cart']);
                    // exit;
    
                    $userID = $_SESSION['userID'];
                    // echo $userID;
                   
                
                    foreach($_SESSION['shopping_cart'] as $keys => $values){
                
                        $pid = $values['item_id'];
                        $qty = $values['item_quantity'];
                
                        $sql = "INSERT INTO cart(user_id, product_id, quantity) values($userID, $pid, $qty)";
                
                        $execute_query = mysqli_query($conn, $sql);
                    }
                
                    //after inserting to database remove all items from session
                    unset($_SESSION['shopping_cart']);
                }
                //-------------------------------------------------------------------------
               

                //if role_id = 1 means it is user/customer
                if($role['role_id']==1){
                    header('Location: home.php');
                }
                //if role_id = 2 means seller
                else if($role['role_id']==2){
                    header('Location: seller.php');
                }
                //else that is admmin then redirect to admin page
                else{
                    header('Location: adminpage.php');
                }
            } 
            //if data not found show error
            else{
                $showErr=true;
           }
        }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        .password{
            position:relative;
        }
        .fa-eye{
            position:absolute;
            top:58%;
            right:38%;
            cursor: pointer;
            /* color:lightgray; */
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <form class="p-5 rounded shadow" style="max-width: 30rem; width:100%;" method="POST" action="#">

            <h1 class="text-center display-4 pb-5">LOGIN</h1>

            <?php 
            if($loggedIn){
            echo '
            <div class="alert alert-success" role="alert">
                Logged in successfully!
            </div>'; 
            } ?>

            <?php 
            if($showErr){
            echo '
            <div class="alert alert-danger" role="alert">
                Incorrect username or password!
            </div>'; 
            } ?>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                <span style="color:red;"> <?php echo $nameError; ?></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control password" id="id_password" name="password">
                <i class="far fa-eye" id="togglePassword" ></i>
                <span style="color:red;"> <?php echo $passError; ?></span>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>


            <section class="text-center mt-4">
                <a class="text-decoration-none text-center" href="register.php">New to H-cart? Create an account</a>
            </section>

        </form>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>