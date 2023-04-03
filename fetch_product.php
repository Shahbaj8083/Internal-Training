
<?php
session_start(); 
//All these below codes is used to fetch all the products and display on home page


?>
<div class="container" >
 <div class="row">

 <?php
     include('db_connect.php'); 

    //$role = store the role of the person who logged in, is he customer,seller or admin
     $role = $_SESSION['role'];

     //if he is seller what is his ID number
     $seller_id = $_SESSION['userID'];
     
     
     //role = 2 means seller only, each and every seller can only fetch that procucts whatever they added, they cannot see other seller products
     if($role == 2){
         $sql = "SELECT * FROM product WHERE seller_id = $seller_id AND p_status = 1;";
        }

        else{
            //selecting all the products from product table if he is not seller and product_status is active(1)
            $sql = "SELECT * FROM product WHERE p_status = 1";
        }

    //execute the query
    $query_execute = mysqli_query($conn, $sql);

    //checking number of rows present in the product table
    $check_product = mysqli_num_rows($query_execute);
    

    //if number of rows is greater than zero means there is some data, if data available show in the card below
    if($check_product > 0){

    //$row is variable to which I am assigning the number of rows ie if $row=10 the loop runs for 10 times
    //and fetch the data one by one
    while($row = mysqli_fetch_assoc($query_execute)){
       //note -->form should be outside of loop
       //note --> fetch on top 
    ?>
        <div class="col-md-3 col-lg-3 col-sm-12 mt-5 " >
            
         <form action="shopping_cart.php?action=add&id=<?php echo $row['p_id']; ?>" method="POST" enctype="multipart/form-data">
            <div class=" shadow p-2" style="background-color:white;">

                <!-- <h1>from this location it is fetching product images</h1> -->
                
                <img src="http://localhost/H_Cart/images/<?php echo $row['img']; ?>" class="card-img-top" alt="laptop" height=250px>
                <div class="card-body text-center">
                    <h5 class="card-title text-info">
                        <!-- <h1>Fteching the name of the product</h1> -->
                        <?=$row['name']; ?>
                    </h5>
                    <div class="card-text">
                        <!-- <h1>Fteching the description of the product</h1> -->
                        <?php echo $row['des']; ?>
                     </div>

                    <div class="d-flex justify-content-center align-items-center">
                        
                        <div class="d-inline-block">
                            <h6 class=" text-danger">
                                <!-- <h1>Fteching the price of the product</h1> -->
                                <?php echo "$ ". $row['price']; ?>
                            </h6>
                        </div> 
                        
                        <div class="d-inline-block" style="text-decoration: line-through;">
                            <em><?php echo " $". $row['discount']; ?></em>
                        </div>

                    </div>

                    <p class="flex-fill">Quantity <input class="flex-fill col-md-2" type="number" name ="quantity" value="1" min="1" max="10"></p>
                    <input type="hidden" name="hidden_img"  value="<?php echo $row['img']; ?>" >
                    <input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
                    <div class="btn-group d-flex">
                        <button  class="btn btn-success flex-fill" type="submit" name="submit" value="submit" >Add to cart 
                            <i  class="fa-solid fa-cart-shopping"></i></button>

                        <!-- <a href="#" class="btn btn-warning flex-fill">Buy Now 
                        <i class="fa-solid fa-bag-shopping"></i></a> -->
                    </div>
                </div>
            </div>
         </form>
        </div>
            <?php
        }
    }
    else{
        //if there is no data available in product table echo this.
        echo"No product found";
    }?>
 </div>
</div>