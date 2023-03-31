<?php

Include ('db_connect.php');
$insertSuccess = false;

//$_SERVER['REQUEST_METHOD']=='POST' && 

if(isset($_POST['submit'])){
    // echo "<pre>";
    // print_r($_POST);
    
    $name = $_POST['name'];
    $area = $_POST['area'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
   
    // exit;
    $sql = "INSERT INTO warehouse(name,area,pincode,city,state,country)
     VALUES ('$name','$area','$pincode','$city','$state','$country')";
    $res=mysqli_query($conn, $sql); 
    // echo "hi";
    if($res){
        $insertSuccess = true;
        // header('Location:seller.php');
    }
   
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product details</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

    <style>
        .box {
            width: 800px;
            margin: 0 auto;
        }

        .active_tab1 {
            background-color: #fff;
            color: #333;
            font-weight: 600;
        }

        .inactive_tab1 {
            background-color: #f5f5f5;
            color: #333;
            cursor: not-allowed;
        }

        .has-error {
            border-color: #cc0000;
            background-color: #ffff99;
        }
    </style>
</head>

<body>
        
<nav class="navbar navbar-default" style="background-color:red;!important">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand fs-2 text-primary" href="seller.php">H-<span class="text-primary">CART</span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>







    <div class="container-fluid" >
        
        <div class="navbar-header">
            <a class="navbar-brand" href="seller.php" style="color:blue">
            <i class="fa-solid fa-house"></i> Home
            </a>
        </div>
        

        <div class="container-fluid">
            <h2 class="text-center">Enter Warehouse details!</h2>
        </div>
    </div>
        <?php
        
        if($insertSuccess){

            echo '<div class="alert alert-success" role="alert">Data added successfully!</div>';
        }
        ?>

    <div class="container box" style="margin-top:100px;">

       

        <form method="POST" id="register_form" action="" enctype="multipart/form-data">

            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active_tab1" id="list_login_details" style="border: 1px solid #ccc;">
                        Tab1</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_personal_details"
                        style="border: 1px solid #ccc;">Tab2</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_contact_details" style="border: 1px solid #ccc;">
                        Tab3</a>
                </li>

            </ul>

            <div class="tab-content" style="margin-top: 15px;">
                <div class="tab-pane active" id="login_details">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All fields are mandatory
                        </div>
                        <div class="form-group panel-body">

                            <div class="form-group mb-3">
                                <label> Warehouse Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <span id="error_name" class="text-danger"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label> Warehouse area</label>
                                <input type="text" class="form-control" id="area" name="area">
                                <span id="error_area" class="text-danger"></span>
                            </div>


                            <div class="text-center">
                                <button type="button" class="btn btn-primary" name="btn_login_details"
                                    id="btn_login_details">Next</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="personal_details">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All fields are mandatory
                        </div>
                        <div class="panel-body">
                            <!-- <div class="form-group mb-3">
                                <label> First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname">
                                <span id="error_firstname" class="text-danger"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label> Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                                <span id="error_lastname" class="text-danger"></span>
                            </div> -->

                            <div class="form-group mb-3">
                                <label> Warehouse pincode</label>
                                <input type="text" class="form-control" id="pincode" name="pincode">
                                <span id="error_pincode" class="text-danger"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label> Warehouse city</label>
                                <input type="text" class="form-control" id="city" name="city">
                                <span id="error_city" class="text-danger"></span>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" name="previous_btn_personal_details"
                                    id="previous_btn_personal_details">Back</button>
                                <button type="button" class="btn btn-primary" name="btn_personal_details"
                                    id="btn_personal_details">Next</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="contact_details">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             All fields are mandatory
                        </div>
                        <div class="panel-body">
                            <!-- <div class="form-group mb-3">
                                <label>Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                                <span id="error_address" class="text-danger"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label>Mobile no</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile">
                                <span id="error_mobile_no" class="text-danger"></span>
                            </div> -->

                            <div class="form-group mb-3">
                                <label> Warehouse state</label>
                                <input type="text" class="form-control" id="state" name="state">
                                <span id="error_state" class="text-danger"></span>
                            </div>

                            <div class="form-group mb-3">
                                <label> Warehouse country</label>
                                <input type="text" class="form-control" id="country" name="country">
                                <span id="error_country" class="text-danger"></span>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" name="previous_btn_contact_details"
                                    id="previous_btn_contact_details">Back</button>
                                <button type="submit" class="btn btn-primary" name="submit"
                                    id="btn_contact_details">Register</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </form>

    </div>

</body>

</html>

<script>
    $(document).ready(function () { 
        $("#btn_login_details").click(function () {
            var error_name = '';
            var error_area = '';
            // var filter = /^[_A-Za-z-]{3,20})$/;
                // /^[_A-Za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,5})$/;

            if ($.trim($('#name').val()).length == 0) {
                error_name = 'Name is required';
                $('#error_name').text(error_name);
                $('#name').addClass('has-error');
            }
            else {
            //     if (!filter.test($('#name').val())) {
            //         error_name = 'Invalid Name';
            //         $('#error_name').text(error_name);
            //         $('#name').addClass('has-error');
            //     }
            //     else {
                    error_name = '';
                    $('#error_name').text(error_name);
                    $('#name').removeClass('has-error');
            }
            

            if ($.trim($('#area').val()).length == 0) {
                error_area = 'Area is required';
                $('#error_area').text(error_area);
                $('#area').addClass('has-error');
            }
            else {
                error_area = '';
                $('#error_area').text(error_area);
                $('#area').removeClass('has-error');
            }

            if (error_name != '' || error_area != '') {
                return false;
            }
            else {
                $('#list_login_details').removeClass('active active_tab1');
                $('#list_login_details').removeAttr('href data-toggle');
                $('#login_details').removeClass('active');
                $('#list_login_details').addClass('inactive_tab1');

                $('#list_personal_details').removeClass('inactive_tab1');
                $('#list_personal_details').addClass('active_tab1 active');
                $('#list_personal_details').attr('href', '#personal_details');
                $('#list_personal_details').attr('data-toggle', 'tab');
                $('#personal_details').addClass('active in');
            }
        });

        $('#previous_btn_personal_details').click(function () {
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active in');
            $('#list_personal_details').addClass('inactive_tab1');

            $('#list_login_details').removeClass('inactive_tab1');
            $('#list_login_details').addClass('active_tab1 active');
            $('#list_login_details').attr('href', '#login_details');
            $('#list_login_details').attr('data-toggle', 'tab');
            $('#login_details').addClass('active in');
        });

        $("#btn_personal_details").click(function () {
            var error_pincode = '';
            var error_city = '';
            if ($.trim($('#pincode').val()).length == 0) {
                error_pincode = "Pincode is required";
                $('#error_pincode').text(error_pincode);
                $('#pincode').addClass('has-error');
            }
            else {
                error_pincode = '';
                $('#error_pincode').text(error_pincode);
                $('#pincode').removeClass('has-error');
            }

            if ($.trim($('#city').val()).length == 0) {
                error_city = "City is required";
                $('#error_city').text(error_city);
                $('#city').addClass('has-error');
            }
            else {
                error_city = '';
                $('#error_city').text(error_city);
                $('#city').removeClass('has-error');
            }

            if (error_pincode != '' || error_city != '') {
                return false;
            }
            else {
                $('#list_personal_details').removeClass('active active_tab1');
                $('#list_personal_details').removeAttr('href data-toggle');
                $('#personal_details').removeClass('active');
                $('#list_personal_details').addClass('inactive_tab1');

                $('#list_contact_details').removeClass('inactive_tab1');
                $('#list_contact_details').addClass('active_tab1 active');
                $('#list_contact_details').attr('href', '#contact_details');
                $('#list_contact_details').attr('data-toggle', 'tab');
                $('#contact_details').addClass('active in');
            }
        });

        $('#previous_btn_contact_details').click(function () {

            $('#list_contact_details').removeClass('active active_tab1');
            $('#list_contact_details').removeAttr('href data-toggle');
            $('#contact_details').removeClass('active in');
            $('#list_contact_details').addClass('inactive_tab1');

            $('#list_personal_details').removeClass('inactive_tab1');
            $('#list_personal_details').addClass('active_tab1 active');
            $('#list_personal_details').attr('href', '#personal_details');
            $('#list_personal_details').attr('data-toggle', 'tab');
            $('#personal_details').addClass('active in');
        });

        $('#btn_contact_details').click(function () {
            var error_state = '';
            var error_country = '';
            // var mobile_validation = /^\d{10}$/;
            if ($.trim($('#state').val()).length == 0) {
                error_state = 'State is required';
                $('#error_state').text(error_state);
                $('#state').addClass('has-error');
            }
            else {
                error_state = '';
                $('#error_state').text(error_state);
                $('#state').removeClass('has-error');
            }

            if ($.trim($('#country').val()).length == 0) {
                error_country = "Country is required";
                $('#error_country').text(error_country);
                $('#country').addClass('has-error');
            }
            else {
                // if (!mobile_validation.test($('#mobile_no').val())) {
                //     error_mobile_no = "Invalid Mobile number";
                //     $('#error_mobile_no').text(error_mobile_no);
                //     $('#mobile_no').addClass('has-error');
                // }
                // else {
                    error_country = '';
                    $('#error_country').text(error_country);
                    $('#country').removeClass('has-error');
                }
            

            if (error_state != '' || error_country != '') {
                return false;
            }
            else {
                // $('#btn_contact_details').attr("disabled", "disabled");
                // $(document).css('cursor', 'progress');
                $("#register_form").submit();
            }
        });


    });
</script>