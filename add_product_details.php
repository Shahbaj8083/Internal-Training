<?php ?>


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
     action="add_product_backened.php" method="POST" enctype="multipart/form-data">

        <div class="container-fluid"><h4 class="text-center text-decoration-underline mb-3">Enter your product details</h4></div>
        
        <div class="col-md-8">
            <label class="form-label">Product name</label>
            <input type="text" class="form-control" id="validationCustom01" name="name" required>
        </div>


        <div class="col-md-8 my-3">
            <label class="form-label">Product description</label>
            <input type="text" class="form-control" id="validationCustom01" name="description" required>
        </div>

        <div class="row col-md-8 my-3">
            <div class="col-md-6">
                <label class="form-label">Price </label>
                <input type="text" class="form-control" id="validationCustom01" name="price" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Currency </label>
                <select id="currency" class="form-control"></select>
            </div>
        </div>

        <div class="row col-md-8 my-3">
            <div class="col-md-6">
                <label class="form-label">Quantity </label>
                <input type="number" class="form-control" id="validationCustom01" name="quantity" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Discount </label>
                <input type="text" class="form-control" id="validationCustom01" name="discount" required>
            </div>
        </div>

        <div class="col-md-8 my-3">
            <label class="form-label">Warehouse </label>
            <input type="text" class="form-control" id="validationCustom01" name="warehouse" required>
        </div>

        <div class="col-md-8 my-3">
            <label class="form-label">Upload Product Picture</label><br>
            <input type="File" name="image">

        </div>
        <br>

        <div class="col-md-8">
            <button class="btn btn-primary float-end" value="submit" name="submit" onclick="submitt()">Submit</button>
            <a  class="btn btn-primary float-start" onclick="back2()">Back</a>
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
