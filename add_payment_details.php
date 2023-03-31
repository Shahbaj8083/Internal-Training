<?php ?>
<form class="container-fluid card d-flex  align-items-center mx-auto col-10 col-md-10 col-lg-6" action="" method="post"
    enctype="multipart/form-data">

    <div class="container-fluid">
        <h4 class="text-center text-decoration-underline mb-3">Enter Payment details</h4>
    </div>

    <div class="col-md-8">
        <label class="form-label">Bank name</label>
        <input type="text" class="form-control" id="validationCustom01" name="b_name" >
    </div>


    <div class="col-md-8 my-3">
        <label class="form-label">Account number</label>
        <input type="text" class="form-control" id="validationCustom01" name="ac_number" >
    </div>

    <div class="col-md-8 my-3">
        <label class="form-label">Account holder name</label>
        <input type="text" class="form-control" id="validationCustom01" name="holder_name" >
    </div>

    
    <div class="col-md-8 my-3">
        <label class="form-label">Branch Name </label>
        <input type="text" class="form-control" id="validationCustom01" name="branch" >
    </div>

    <div class="col-md-8 my-3">
        <label class="form-label">IFSC code </label>
        <input type="text" class="form-control" id="validationCustom01" name="ifsc" >
    </div>

    <div class="col-md-8 my-3">
        <label class="form-label">Account type </label>
        <input type="text" class="form-control" id="validationCustom01" name="ifsc" >
    </div>

    <br>

    <div class="col-md-8">
        <!-- <button class="btn btn-primary float-start" type="submit" name="submit">Submit</button> -->
        <a class="btn btn-primary float-end" onclick="next1()">Next</a>
    </div>

</form>