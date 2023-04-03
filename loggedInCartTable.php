<?php
//this code is included in shopping_cart.php file. This foreach loop will fetch the shopping cart table when someone is loggedin.

    $grand_total = 0;

    $id = $_SESSION['userID'];

    $cart_count = 0;//store the cart count value

    $sql = "SELECT * FROM cart WHERE user_id= $id "; 
    $query_execute = mysqli_query($conn, $sql);

    $check_product = mysqli_num_rows($query_execute); //checking number of rows

    if($check_product > 0){
        
        while($row = mysqli_fetch_assoc($query_execute)){

            $cart_count += $row['quantity'];

            $product_id = $row['product_id'];
            $mysql = "SELECT * FROM product WHERE p_id = $product_id";

            $execute_mysql = mysqli_query($conn, $mysql);

            foreach($execute_mysql as $key => $data){
        
?>

        <tr>
            <td>
                <img src="http://localhost/H_Cart/images/<?php echo $data['img']; ?>" height="60px" width="60px">
            </td>

            <td>
                <?php echo $data['name']; ?>
            </td>

            <td>
                <?php echo $data['price']; ?>
                <input type="hidden" class="price" value=" <?php echo $data['price']; ?>">
            </td>

            <td>

                <div class="product_data input-group mb-3" style="width:120px">
                    <input type="hidden" class="product_id" value=" <?php echo $product_id; ?>">

                    <span class="input-group-text decrement-btn inc-quantity" onclick="subTotal()"> - </span>

                    <input type="text" disabled class="form-control quantity qty" id="qty"
                        value="<?php echo $row['quantity']; ?>">

                    <span class="input-group-text increment-btn dec-quantity" onclick="subTotal()"> + </span>

                </div>


            </td>
            <td class="total">0
                <!-- <?php echo number_format($row['quantity'] * $row['price'],2);  ?> -->
            </td>
            <td>
                <a href="shopping_cart.php?remove=del&id=<?php echo $row['id']; ?>"><span
                        class=" text-danger text-decoration-none" style="text-decoration:none; !important">
                        Remove </span></a>
            </td>
        </tr>
            <?php
                        $grand_total +=($row["quantity"] * $data["price"]);
            }
        }

            $_SESSION['cart_count'] = $cart_count;

    }
            ?>
            <tr>
                <th colspan="4">Total</th>
                <th colspan="3" class="grand_total">
                    <?php echo '$ '.number_format($grand_total,2); ?>
                </th>
            </tr>

         