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
    <section class="breadcrumb_part" style="background-image: url(img/fea1f0e4a92955273a053a95ae3b55d9.jpg);background-repeat: no-repeat;background-size: 100vw 400px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2 style="color: black;">checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding" style="background-color: #f8e7e7;">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-4">
            <div class="order_box"style="border: 1px solid black;">
              <h2 >Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
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
                <li>
                  <a ><?php echo $ro['m_title'] ?>
                    <span class="middle">x <?php echo $ro['cart_qty'] ?></span>
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
              <!-- <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" />
                  <label for="f-option5">Check payments</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" />
                  <label for="f-option6">Paypal </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div> -->
            </div>
          </div>
          <div class="col-lg-8">
            <h3>Order Details</h3>
            <form class="row contact_form" action="controller/order.php" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" value="<?php echo $row['c_name'] ?>" id="first" name="name" required/>
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="tel" pattern="[0-9]{10}" class="form-control" value="<?php echo $row['c_phone'] ?>" id="last" name="phone" required/>
                <!-- <span class="placeholder" data-placeholder="Last name"></span> -->
              </div>
              <!-- <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
              </div> -->
              <!-- <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" />
                <span class="placeholder" data-placeholder="Phone number"></span>
              </div> -->
              <div class="col-md-6 form-group p_star">
                <input type="email" value="<?php echo $row['c_email'] ?>" class="form-control" id="email" name="email" />
                <!-- <span class="placeholder" data-placeholder="Email Address"></span> -->
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" value="<?php echo $row['c_address'] ?>" id="first" name="address" required/>
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" value="<?php echo $row['c_city'] ?>" id="first" name="city" required/>
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" value="<?php echo $row['c_state'] ?>" id="first" name="state" required/>
                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="tel" pattern="[0-9]{6}" class="form-control" value="<?php echo $row['c_pin'] ?>" id="pin" name="pin" required/>
                <!-- <span class="placeholder" data-placeholder="Last name"></span> -->
              </div>
              <div class="col-md-6 form-group p_star">
                <button class="btn_3" type="submit" name="order">Place Order</button>
              </div>
              
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->

  <!--::footer_part start::-->
  <?php include 'includes/footer.php'; ?>
  <!--::footer_part end::-->

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