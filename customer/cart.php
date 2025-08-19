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
  <!-- icon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- magnific popup CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/nice-select.css">
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
  <section class="breadcrumb_part" style="background-image: url(img/92bb25dcc8496bf5ffde0bd6b990e09a.jpg);background-repeat: no-repeat;background-size: 100vw 400px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <h2 style="color: black;">cart list</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb part end-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container" id="cart">
      <div class="cart_inner">
        <div class="table-responsive">
          <?php 
          $st=$admin->ret("SELECT * FROM `cart` where cart.c_id='$cid'");
                $num=$st->rowCount();

                if ($num==0) { ?>
                  <h2 class="text-center">Your cart is empty!</h2>

                 <?php } else { ?>
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
                <a href="controller/remove_cart.php?cart_id=<?php echo $ro['cart_id']; ?>" class="btn btn-info">Remove</a>
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
            <a class="btn_1" href="homepage.php">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
          </div>
        <?php } ?>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
   <!--::footer_part start::-->
<?php include 'includes/footer.php'?>
    <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <script>
        function increment(vcart) { //getting from onclick function -can use any variable
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //table id
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "controller/update_cart.php ? cart_id_increment=" + vcart, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function decrement(vcart) { //getting from onclick function -can use any variable

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //table id
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "controller/update_cart.php ? cart_id_decrement=" + vcart, true);
            xmlhttp.send();
        }
    </script>
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