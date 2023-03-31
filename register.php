<?php 
//when account is created successfully it will be true
$showAlert = false;

//when error will occur it will be true
$showErr = false;

//creating variables for each input and assigning it empty first
$nameError = $emailError = $mobileError = $passError = '';
$name = $email = $mobile = $password = '';

//considering the data entered is valid
$isDataValid = true;

//if request method is POST and name of that post request is 'register' then enter to this 'if' condition
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
    include('db_connect.php');
    
    //if name is empty show error
    if (empty($_POST["name"])) {
        $nameError = "Name is mandatory";
        $isDataValid = false;

      } else {
        $name = test_input($_POST['name']);
        // check if name only contains letters greater than 3 and less than 20
        if (!preg_match('/^([a-zA-Z]{3,20})$/',$name)) {
          $nameError = "Enter valid name format!";
          $isDataValid = false;
        }
      }
    //if email is empty show error
    if (empty($_POST["email"])) {
        $emailError = "Email is mandatory";
        $isDataValid = false;
        }else{
            $email = test_input($_POST['email']);
            // $email = "asd/sdff@asdf.com"; 
            $regex = '/^[_A-Za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,5})$/'; 
            //check if the email format is correct
            if(!preg_match($regex, $email)){
                $emailError="Enter valid email format!";
                $isDataValid = false;
            }
        }
    
    //if mobile is empty show error
    if (empty($_POST["mobile"])) {
        $mobileError = "Mobile number is mandatory";
        $isDataValid = false;

      } else {
        $mobile = test_input($_POST['mobile']);
        // check if mobile number contains only number, and only 10 digits
        if (!preg_match('/^([0-9]{10})$/',$mobile)) {
          $mobileError = "Enter valid contact number!";
          $isDataValid = false;
        }
      }

    //if password is empty show error
    if(empty($_POST["password"])){
        $passError = "Password is mandatory";
        $isDataValid = false;
    }
    else{
        $password = test_input($_POST['password']);
    }
   
   $cpassword = $_POST['cpassword'];
   $role = $_POST['role'];
   $exist = false;

   //it will first check is data valid if data valid then check password is not equals to confirm password
   // if password and confirm password is not same then it will show error
   if($isDataValid && ($password != $cpassword)){
        $showErr = "Password and confirm password should be same!";
   }

   //checking to database if that username exists or not
   $existQuery = "SELECT * FROM login_credentials WHERE name= '$name'";
   $result = mysqli_query($conn, $existQuery);

   //if that row exists in the table means user already exists
   $existRow = mysqli_num_rows($result);

   if($existRow > 0){
    //if exists then show error
    $showErr = "Username already exists!";
   }

   else {//else register successfully
       if(!$exist && ($password == $cpassword) && $isDataValid){
        $sql = "INSERT INTO login_credentials(name, email, phone, password, role_id,status)
                 VALUES ('$name', '$email', '$mobile', '$password', $role,1)";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
        } 
        //after registering redirects toward login page
        header('Location: login.php');
       }
   }

}
//this function is used to remove unwanted spaces,backslashes,and special characters
function test_input($data) {

    // This function removes white spaces 
    $data = trim($data);  

    // This function removes backslashes 
    $data = stripslashes($data);
    
    // This function removes special characters 
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">

        <form class="p-5 rounded shadow" style="max-width: 35rem; width: 100%;" method="POST"
         action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div>
                <h3 class="display-6 mb-3">Create account</h3>
            </div>

            <?php 
            if($showAlert){
            echo '
            <div class="alert alert-success" role="alert">
                Account created successfully!
            </div>'; 
            } ?>

            <?php 
            if($showErr){
            echo '
            <div class="alert alert-danger" role="alert">
                '.$showErr.'
            </div>'; 
            } ?>

            <div class="mb-3">
                <label for="fullname" class="form-label">Name</label>
                <input type="text" class="form-control" id="fullname" name="name"  value=<?php echo $_POST['name']; ?> >
                <span style="color:red;"> <?php echo $nameError; ?></span>
            </div>
            

            <div class="mb-3">
                <label for="myemail" class="form-label">Email </label>
                <input type="email" class="form-control" id="myemail" name="email"  value=<?php echo $_POST['email']; ?>>
                <span style="color:red;"> <?php echo $emailError; ?></span>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Mobile no. </label>
                <input type="text" class="form-control" id="contact" name="mobile"  value=<?php echo $_POST['mobile']; ?> >
                <span style="color:red;"> <?php echo $mobileError; ?></span>
            </div>

            <div class="mb-3">
                <label for="mypass" class="form-label">Password</label>
                <input type="password" class="form-control" id="mypass1" name="password" >
                <span style="color:red;"> <?php echo $passError; ?></span>
            </div>

            <div class="mb-3">
                <label for="mypass" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="mypass2" name="cpassword" >
            </div>

            <!-- <div class="mb-3">
                <label for="myadd" class="form-label">Address</label>
                <div class="form-floating">
                    <textarea class="form-control" id="floatingTextarea" name="address"></textarea>   
                </div>
            </div> -->

            <div class="">Role :</div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="1" checked>
                <label class="form-check-label">
                    User
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="role" value="2" >
                <label class="form-check-label">
                    Seller
                </label>
            </div>


            <button type="submit" name="register" class="btn btn-primary">Submit</button>
            <a href="login.php" class="text-decoration-none float-end">Already have account? Login</a>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>