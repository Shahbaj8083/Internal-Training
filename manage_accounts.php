<?php 
    //this page is for admin
    include('db_connect.php');   
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage user accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="card container d-flex justify-content-center mt-5" style="width:60rem;">
        <div class="card-header">
            <a href="adminpage.php" class="btn btn-dark"><i class="fa-solid fa-circle-arrow-left"> </i> Go Back </a>
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
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
        $sql = "SELECT * FROM login_credentials";
        $result = mysqli_query($conn, $sql);

        $num_of_row = mysqli_num_rows($result);

        if($num_of_row > 0){
            $sno = 0;
            while($row = mysqli_fetch_assoc($result)){
                $sno += 1;
                if($row['role_id']==1){
                    $role = "USER";
                }
                else if($row['role_id']==2){
                    $role = "SELLER";
                }
                else {
                    $role = "<h6 class='text-success' >ADMIN</h6>";
                }
                ?>

                <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $role; ?></td>
                <td><?php 
                        if($row['status']==1){
                            echo "<a href='status.php?id=".$row['id']." &status=0' class='btn btn-success text-decoration-none'>Active</a>";
                        }
                        else{
                            echo "<a href='status.php?id=".$row['id']." &status=1' class='btn btn-danger text-decoration-none'>Inactive</a>";
                        }
                    ?>
                </td>
               
                <td>
                <button><a href="admin_delete.php?id=<?php echo $row['id'] ?>">Delete</a></button></td>
               </tr>
        <?php
            }
        }
        else{
          echo "<h1>Records not found!</h1>";
        }
    ?>
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