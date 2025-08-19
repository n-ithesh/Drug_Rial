<?php
include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];

if(isset($_GET['cart_id_increment'])){
    $cart_id=$_GET['cart_id_increment'];
    $stmt=$admin->ret("SELECT * FROM `cart` INNER JOIN `medicine` ON medicine.m_id=cart.m_id WHERE `cart_id`='$cart_id' AND `c_id`='$cid'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $item_price = $row['m_mrp'];
    $old_quantity = $row['cart_qty'];
    $new_quantity = $old_quantity + 1;
    $total = $item_price * $new_quantity;

    $stmt1=$admin->cud("UPDATE `cart` SET `cart_qty`='$new_quantity',`cart_total_amount`='$total' WHERE `cart_id`='$cart_id' AND `c_id`='$cid'",'updated');
}

if(isset($_GET['cart_id_decrement'])){
    $cart_id=$_GET['cart_id_decrement'];
    $stmt=$admin->ret("SELECT * FROM `cart` INNER JOIN `medicine` ON medicine.m_id=cart.m_id WHERE `cart_id`='$cart_id' AND `c_id`='$cid'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $item_price = $row['m_mrp'];
    $old_quantity = $row['cart_qty'];
    $new_quantity = $old_quantity -1;
    $total = $item_price * $new_quantity;

    $stmt1=$admin->cud("UPDATE `cart` SET `cart_qty`='$new_quantity',`cart_total_amount`='$total' WHERE `cart_id`='$cart_id' AND `c_id`='$cid'",'updated');
}
?>



<div class="container" id="cart">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col"> Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              $total=0;
              $gtot=0;
              $num=0;
              $st=$admin->ret("SELECT * FROM `cart` inner join `medicine` on medicine.m_id=cart.m_id where cart.c_id='$cid'");
              while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                $num=$st->rowCount();
                $price=$ro['m_mrp'];
                $qty=$ro['cart_qty'];
                $total=$qty*$price;
                $gtot+=$total;
               ?>
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="../employee/controller/<?php echo $ro['m_image']; ?>" alt="" />
                    </div>
                    <div class="media-body">
                      <p><?php echo $ro['m_title']; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>₹<?php echo $ro['m_mrp']; ?></h5>
                </td>
                <td>
                  <div class="product_count">
                    <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                      class="input-text qty input-number" />
                    <button
                      class="increase input-number-increment items-count" type="button">
                      <i class="ti-angle-up"></i>
                    </button>
                    <button
                      class="reduced input-number-decrement items-count" type="button">
                      <i class="ti-angle-down"></i>
                    </button> -->
                    
                  <?php if ($ro['cart_qty'] > 1) { ?>
                    <button class="btn btn-danger" onclick="decrement(<?php echo $ro['cart_id']; ?>)">-
                    </button>
                    <?php } ?>
                    <input class="input-number" type="text" value="<?php echo $ro['cart_qty']; ?>" min="0" max="10">
                    <button class="btn btn-success" onclick="increment(<?php echo $ro['cart_id']; ?>)">+
                    </button>
                    
                  </div>
                </td>
                <td>
                  <h5><?php echo $total; ?></h5>
                </td>
                <td>
                <a href="remove_cart.php?cart_id=<?php echo $ro['cart_id']; ?>" class="btn btn-info">Remove</a>
                </td>
              </tr>
            <?php } ?>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>₹<?php echo $gtot; ?></h5>
                </td>
              </tr>
              
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
          </div>
        </div>
      </div>