<?php
        //this code is included in shopping_cart.php file. This foreach loop will fetch the shopping cart session table.

    foreach($_SESSION['shopping_cart'] as $keys => $values){
        ?>

        <tr>
            <td>
                <img src="http://localhost/H_Cart/images/<?php echo $values['item_img']; ?>" height="60px"
                    width="60px">
            </td>

            <td>
                <?php echo $values['item_name']; ?>
            </td>

            <td>
                <?php echo $values['item_price']; ?>
                <input type="hidden" class="price" value=" <?php echo $values['item_price']; ?>">
                <input type="hidden" class="product_id" value=" <?php echo $values['item_id']; ?>">
            </td>

            <td>

                <div class="product_data input-group mb-3" style="width:120px">

                    <span class="input-group-text session-decrement-btn" onclick="subTotal()"> - </span>
                    <input type="hidden" class="product_id" value=" <?php echo $keys; ?>">

                    <input type="text" disabled class="form-control quantity qty"
                            value="<?php echo $values['item_quantity']; ?>" >

                    <span class="input-group-text session-increment-btn" onclick="subTotal()"> + </span>

                </div>


            </td>
            <td class="total">0
                <!-- <?php echo number_format($values['item_quantity'] * $values['item_price'],2);  ?> -->
            </td>
            <td>
                <a
                    href="shopping_cart.php?remove=del&id=<?php echo $values['item_id']; ?>&qty=<?php echo $values['item_quantity']; ?> "><span
                        class="text-danger text-decoration-none"> Remove </span></a>
            </td>
        </tr>
        <?php
                        $total +=($values["item_quantity"] * $values["item_price"]);
    }
        ?>
        <tr>
            <th colspan="4">Total</th>
            <th colspan="3" class="grand_total">
                <?php echo '$ '.number_format($total,2); ?>
            </th>
        </tr>

        