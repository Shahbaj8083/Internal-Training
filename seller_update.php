<?php 
    include('db_connect.php');

    $login = true;
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)){
        // header('Location: login.php');
        // exit;
        $login = false;
    }

        $id = $_GET['id'];

        $sql = "SELECT * FROM product WHERE p_id=$id";
        $execute_query = mysqli_query($conn, $sql);

        $total = mysqli_fetch_assoc($execute_query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Update Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div>
    <?php
    #I'm adding this if to reoslve 
    if($insertSuccess)
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data added successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    ?>

    <form class="container-fluid card d-flex  align-items-center mx-auto col-10 col-md-10 col-lg-6"
     id = "myform"
     action="" method="POST" enctype="multipart/form-data">

        <div class="container-fluid"><h4 class="text-center bg-success text-light mb-3">Enter your product details</h4></div>
        
        <div class="col-md-8">
            <label class="form-label">Product name</label>
            <input type="text" class="form-control" id="validationCustom01" name="name" value="<?php echo $total['name'] ?>">
        </div>


        <div class="col-md-8 my-3">
            <label class="form-label">Product description</label>
            <input type="text" class="form-control" id="validationCustom01" name="description" value="<?php echo $total['des'] ?>">
        </div>

        <div class="row col-md-8 my-3">
            <div class="col-md-6">
                <label class="form-label">Price </label>
                <input type="text" class="form-control" id="validationCustom01" name="price" value="<?php echo $total['price'] ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Currency </label>
                <select id="currency" class="form-control"></select>
            </div>
        </div>

        <div class="row col-md-8 my-3">
            <div class="col-md-6">
                <label class="form-label">Quantity </label>
                <input type="number" class="form-control" id="validationCustom01" name="quantity" value="<?php echo $total['quantity'] ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Discount </label>
                <input type="text" class="form-control" id="validationCustom01" name="discount" value="<?php echo $total['discount'] ?>">
            </div>
        </div>

        <div class="col-md-8 my-3">
            <label class="form-label">Warehouse </label>
            <input type="text" class="form-control" id="validationCustom01" name="warehouse" value="<?php echo $total['warehouse'] ?>">
        </div>

        <div class="col-md-8 my-3">
            <label class="form-label">Upload Product Picture</label><br>
            <input type="File" name="image" value="http://localhost/H_Cart/images/'.<?php echo $total['img'] ?>.'">

        </div>
        <br>

        <div class="col-md-8">
            <button class="btn btn-primary float-end" value="submit" name="update" >Update</button>
        </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    
        <script type="text/JavaScript">
        //this ajax code is used to fetch currency json file
        $select = $('#currency');

        $.ajax({
        url:   "http://localhost/H_Cart/currency.json",
        dataType: 'JSON',
            success: function (data) {
                // alert("data");
                $select.html('');
                $.each(data, function(key, val){
                $select.append('<option id="' + val.symbol + '">' + val.name +' '+ val.symbol + '</option>');
            })
            },
             error: function () {
                $select.html('<option id="-1">Not available</option>');
            }
        });
    </script>
    </div>
</body>
</html>

<?php
include ('db_connect.php');
$insertSuccess = false;

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
    // echo "<pre>";
    // print_r($_POST);
    session_start();

    $name = $_POST['name'];
    $des = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $warehouse = $_POST['warehouse'];
    $pname = $_FILES["image"]["name"];
    $role = $_SESSION['userID'];
    // echo $role;
    $tname = $_FILES["image"]["tmp_name"];
    // print_r($_FILES);
    move_uploaded_file($tname,'images/'.$pname);

    $sql = "UPDATE product SET name='$name', des='$des', price=$price, quantity=$quantity,
            discount=$discount, warehouse='$warehouse', seller_id=$role
            WHERE p_id=$id";

    $res=mysqli_query($conn, $sql); 
    if($res){
        $insertSuccess = true;
        header('Location:manage_seller_product.php');
    }        
}

?>

      