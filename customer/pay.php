<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['c_id'])){
  header('Location:index.php');
}
$cid=$_SESSION['c_id'];
$stmt=$admin->ret("SELECT * FROM `customer` where `c_id`='$cid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

// $stmt2=$admin->ret("SELECT * FROM `medicine` where `m_id`='$mid'");
// $row2=$stmt2->fetch(PDO::FETCH_ASSOC);

$oid=$_GET['o_id'];
$stm2=$admin->ret("SELECT * FROM `order` inner join `customer` on customer.c_id=order.c_id where `o_id`='$oid'");
$row2=$stm2->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Drug Rial | Customer</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                  <?php include 'includes/navbar.php'; ?>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Payment</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-12">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a >Product
                    <span>Total</span>
                  </a>
                </li>
                <?php
              $i=1;
              $total=0;
              $gtot=0;
              $num=0;
              $st=$admin->ret("SELECT * FROM `order` inner join `customer` on customer.c_id=order.c_id inner join `medicine` on medicine.m_id=order.m_id where `o_id`='$oid'");
              while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                $num=$st->rowCount();
                $price=$ro['m_mrp'];
                $qty=$ro['o_qty'];
                $total=$qty*$price;
                $gtot+=$total;
               ?>
                <li>
                  <a ><?php echo $ro['m_title'] ?>
                    <span class="middle"></span>
                    <span class="last"><?php echo $total; ?></span>
                  </a>
                </li>
                <?php } ?>
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Total
                    <span><?php echo $gtot; ?></span>
                  </a>
                </li>
                <!-- <li>
                  <a href="#">Shipping
                    <span>Flat rate: $50.00</span>
                  </a>
                </li> -->
                <!-- <li>
                  <a href="#">Total
                    <span>$2210.00</span>
                  </a>
                </li> -->
              </ul>
                <div class="payment_item">
                <div >
                  <input id="upi"  name="paymentMethod" type="radio" value="upi" onclick="paytype(this.value)" checked required="" />
                  <label for="f-option5">UPI Payment</label>
                  <div class="check"></div>
                </div>
                <div id="upi_div">
                  <p class="">
                    <span>
                      <label>Scan and Pay</label><br>
                    <img src="img/upi.png" style="height: 300px;width: 300px;">
                    </span><br>
                    <span>
                  <form method="post" action="controller/payment.php">

                      <input type="hidden" name="oid" value="<?php echo $oid; ?>">
                    <label for="cc-cvv">Total Pay</label>
                    <input type="text" class="form-control" name="totamnt" value="<?php echo $row2['o_total_amount']; ?>" readonly>
                    <label for="upi"> UPI transaction ID:</label>
                    <input type="text" class="form-control" id="upi" name="tid" pattern="[a-zA-Z0-9_\-]{10,30}" title="Please enter a valid UPI transaction ID with alphanumeric characters, underscores, and hyphens, between 10 and 30 characters long." required>
                    </span>
                    <button class="btn btn-warning w-100 mt-3" name="paybyupi" type="submit">Submit</button>
                  </form> 
                </p>
                </div>
              </div>
              <div class="payment_item mt-3">
                <div>
                  <input id="credit" name="paymentMethod" type="radio" value="cash" onclick="paytype(this.value)" required=""  />
                  <label for="f-option6">Cash on Delivery </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <div id="cash_div">
              <form method="post" action="controller/payment.php">

                  <p>
                    <input type="hidden" class="form-control" name="totamnt" value="<?php echo $row2['o_total_amount']; ?>" readonly>
                    <input type="hidden" name="oid" value="<?php echo $oid; ?>">
                  <input type="checkbox" value="" required> Agree to pay amount once you received your medicines
                    <button class="btn btn-warning w-100 mt-3" name="paybycash" type="submit">Submit</button>

                </p>
              </form> 
                </div>
              </div>
               <!-- <div class="col-md-6 mt-3 form-group p_star">
                <button class="btn_3" type="submit" name="order">Place Order</button>
              </div> -->
              </form>
            </div>
          </div>
        
          
        </div>
      </div>
    </div>
  </section>

  <!--================End Checkout Area =================-->

  <!--::footer_part start::-->
  <?php include 'includes/footer.php'   ?>
  <!--::footer_part end::-->
  <script type="text/javascript">
    function show_totalAmout(){
      var n=document.getElementById('unit').value;
      var a=document.getElementById('amount').value;
      var tot=n*a;
      document.getElementById('tamount').value=tot;

    }
    function paytype(myvalue) {

if (myvalue == 'cash') { //radio button id
  document.getElementById('cash_div').style.display = 'block'; //div id
  document.getElementById('upi_div').style.display = 'none';

} else if (myvalue == 'upi') {
  document.getElementById('cash_div').style.display = 'none';
  document.getElementById('upi_div').style.display = 'block';
} else {
  document.getElementById('cash_div').style.display = 'none';
  document.getElementById('upi_div').style.display = 'none';
}

}
    </script>

  <!-- jquery plugins here-->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="js/mixitup.min.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>

</html>