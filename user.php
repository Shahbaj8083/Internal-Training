<?php 
    //This is for select
    include('database.php');
    $obj = new query();
    $result = $obj->getdata('user');
    //Select ends here

    //This is for delete
    if(isset($_GET['type']) && isset($_GET['type'])=='delete'){
        $id = $_GET['id'];
        $conditionArr = array('id'=>$id);
        $result = $obj->deleteData('user',$conditionArr);
        header('Location:user.php');
    }
    //Delete ends here
    
    
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
    <div class="card container d-flex justify-content-center mt-5" style="width:60rem;">
        <div class="card-header">
            <a href="manage_user.php" class="btn btn-dark">Add User <i class="fa-sharp fa-solid fa-plus"></i></a>
        </div>
    </div>

    <div class="card container d-flex justify-content-center mt-3" style="width:60rem;">
        <table class="table table-striped table-bordered" id="myTable">
            <thead style="background:blue; color:white">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php 
            if(isset($result)){
                $id = 1;
                foreach($result as $list){
            ?>

                <tr>
                    <td>
                        <?php echo $id?>
                    </td>
                    <td>
                        <?php echo $list['name']?>
                    </td>
                    <td>
                        <?php echo $list['email']?>
                    </td>
                    <td>
                        <?php echo $list['mobile']?>
                    </td>
                    <td>
                        <a href="manage_user.php?id=<?php echo $list['id']?>" class="text-primary"><i class="fa-sharp fa-solid fa-pen-to-square"></i>Edit</a>
                        <a href="?type=delete&id=<?php echo $list['id']?>" class="text-danger">
                        <i class="fa-solid fa-trash-can"></i> Delete</a>
                    </td>

                </tr>

                <?php  $id++;} }else{    ?>

                <div>
                    <h3 colspan="6" align="center">Records not found!</h3>
                </div>

                <?php } ?>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>