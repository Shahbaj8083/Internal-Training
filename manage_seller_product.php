
<?php
Include ('db_connect.php');
session_start();
$id =  $_SESSION['userID'];
// echo $id;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
</head>
  <body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">
                <a class="navbar-brand fs-2 text-primary" href="seller.php">H-<span class="text-primary">CART</span></a>
                <span class="text-info">SELLER</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 text-end">


                        <?php if($_SESSION['loggedin']){ ?>

                        <li class="nav-item">

                            <div class="dropstart" style="position:absolute; right:0">
                                <a class="dropdown-toggle text-decoration-none text-light" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <?php if($_SESSION['username']) echo $_SESSION['username']; ?> <i
                                        class="fa-regular fa-user"> </i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" onclick="show_payment()"> Add Product</a>
                                    </li>
                                    <li><a class="dropdown-item" href="manage_seller_product.php">
                                            Manage Products</a></li>
                                    <li><a class="dropdown-item" href="warehouse.php">
                                            Add Warehouse</a></li>
                                    <!-- <li><a class="dropdown-item" href="insert_product.php">Manage user</a></li> -->
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>

                        <?php } else{ 
                            // header('Location:login.php');
                            
                        }?>
                        
                    </ul>

                </div>
            </div>
        </nav>
        


  <!-- <div><img src="http://localhost/H_Cart/images/22.jpg" width="250px" height="300px"></div>  -->
  <div class="card container d-flex justify-content-center mt-5" style="width:90rem;">
        <div class="card-header">
            <a href="seller.php" class="btn btn-dark"><i class="fa-solid fa-house"></i> Home </a>
        </div>
    </div>
  <div class="card container d-flex justify-content-center " style="width:90rem;">
  <table class="table table-striped table-bordered" id="myTable">
  <thead style="background:blue; color:white">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Discount</th>
      <th scope="col">Image</th>
      <th scope="col">Warehouse</th>
      <th scope="col">Actions</th>
      <!-- <td><img src="http://localhost/images/'.$row['img'].'"></td>  -->
    </tr>
  </thead>
  <tbody>

    <?php 
        $sql = "SELECT * FROM product where seller_id=$id";
        $result = mysqli_query($conn, $sql);

        $num_of_row = mysqli_num_rows($result);

        if($num_of_row > 0){
            $sno = 0;
            while($row = mysqli_fetch_assoc($result)){
                $sno += 1;
                echo '<tr>
                <td>'.$sno.'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['des'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['discount'].'</td>
                <td><img src="http://localhost/H_Cart/images/'.$row['img'].'" height="100px" width="100px"></td> 
                <td>'.$row['warehouse'].'</td>
                <td><button><a href="seller_update.php?id='.$row['p_id'].'">Edit</a></button> 
                <button><a href="seller_delete.php?id='.$row['p_id'].'">Delete</a></button></td>
               </tr>';
    
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
        
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
         $('#myTable').DataTable();
        } );
    </script>
</div>
</body>
</html>
