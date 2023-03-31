<?php ?>
<form class="container-fluid card d-flex  align-items-center mx-auto col-10 col-md-10 col-lg-6" action="" method="post"
    enctype="multipart/form-data">

    <div class="container-fluid">
        <h4 class="text-center text-decoration-underline mb-3">Enter Warehouse details</h4>
    </div>

    <div class="col-md-8">
        <label class="form-label">Warehouse name</label>
        <input type="text" class="form-control" id="validationCustom01" name="name" required>
    </div>


    <div class="col-md-8 my-3">
        <label class="form-label">Warehouse area</label>
        <input type="text" class="form-control" id="validationCustom01" name="area" required>
    </div>

    <div class="col-md-8 my-3">
        <label class="form-label">Warehouse pincode </label>
        <input type="text" class="form-control" id="validationCustom01" name="pincode" required>
    </div>

    <div class="col-md-8 my-3">
        <label class="form-label">Warehouse city </label>
        <input type="text" class="form-control" id="validationCustom01" name="city" required>
    </div>

    <div class="col-md-8 my-3">
        <label class="form-label">Warehouse state </label>
        <input type="number" class="form-control" id="validationCustom01" name="state" required>
    </div>

    <div class="col-md-8 my-3">
        <label class="form-label">Warehouse country </label>
        <input type="text" class="form-control" id="validationCustom01" name="country" required>
    </div>
    <br>

    <div class="col-md-8">
        <!-- <button class="btn btn-primary float-start" type="submit" name="submit">Submit</button> -->
        <a class="btn btn-primary float-end" onclick="next2()">Next</a>
        <a class="btn btn-primary float-start" onclick="back1()">Back</a>
    </div>

</form>