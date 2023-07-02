<?php 
include('database.php');
$obj = new query();

$name ='';
$email = '';
$mobile ='';
$id = '';

if(isset($_GET['id']) && ($_GET['id'] != '')){
    $id = $_GET['id'];
    $conditionArr = array('id' =>$id);
    $result = $obj->getdata('user','*',$conditionArr);
    $name  = $result['0']['name'];
    $email = $result['0']['email'];
    $phone = $result['0']['mobile'];
    
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];



    $conditionArr = array('name'=>$name,'email'=>$email,'mobile'=>$phone);

    if($id==''){
        $obj->insertdata('user',$conditionArr);
    }
    else{
        $obj->updateData('user',$conditionArr,'id',$id);
        
    }
    header('Location:user.php');

}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="card border-success container d-flex justify-content-center mt-5" style="max-width: 50rem;">
        <div class="card-header bg-transparent border-success text-center">
            <h5>Fill your details</h5>
        </div>

        <div class="card-body text-success">
            <form class="container" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="name" class="form-control" name="name[]" required value="<?php echo $name ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email[]" required value="<?php echo $email ?>">
                </div>
                <div class="mb-5">
                    <label for="exampleInputPassword1" class="form-label">Phone no.</label>
                    <input type="text" class="form-control" name="phone[]" required value="<?php echo $phone ?>">
                </div>

                <div class="paste-new-form"></div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="javascript:void(0)" class="btn add-more-form btn-primary rt-button" >More <i class="fa-sharp fa-solid fa-plus"></i></a>

                <a href="user.php" class="btn btn-dark text-end" style="float:right">Browse <i
                        class="fa-solid fa-globe"></i></a>

            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function () {
            

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();

            });

            $(document).on("click", ".add-more-form", function () {
                console.log(jQuery);
                
                $('.paste-new-form').append('<div class="main-form"><div><h5><u>Add details</u></h5></div><div class="mb-3">\
                    <label for="exampleInputEmail1" class="form-label">Name</label>\
                    <input type="name" class="form-control" name="name[]" required value="<?php echo $name ?>">\
                </div>\
                <div class="mb-3">\
                    <label for="exampleInputPassword1" class="form-label">Email</label>\
                    <input type="email" class="form-control" name="email[]" required value="<?php echo $email ?>">\
                </div>\
                <div class="mb-5">\
                    <label for="exampleInputPassword1" class="form-label">Phone no.</label>\
                    <input type="text" class="form-control" name="phone[]" required value="<?php echo $phone ?>">\
                </div>\
            <div><a href="javascript:void(0)" class="btn btn-danger remove-btn " style="margin-top:1px; float:right">Remove</a></div></div>\
            ');
        });
    });
    </script>
    
</body>

</html>