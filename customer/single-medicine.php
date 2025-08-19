<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['c_id'])){
  header('Location:index.php');
}
$cid=$_SESSION['c_id'];
$mid=$_GET['m_id'];
$stmt=$admin->ret("SELECT * FROM `customer` where `c_id`='$cid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt2=$admin->ret("SELECT * FROM `medicine` where `m_id`='$mid'");
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
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
        <div class="search_input" id="search_input_box" >
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
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container" style="background-color: #ffffff; border-radius:10px">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img justify-content-center d-flex">
              <img src="../employee/controller/<?php echo $row2['m_image']; ?>" alt="#" class="img-fluid" style="width: 500px;">
            </div>
            <div class="single_product_img justify-content-center d-flex">
              <img src="../employee/controller/<?php echo $row2['m_image']; ?>" alt="#" class="img-fluid" style="width: 500px;">
            </div>
            <div class="single_product_img justify-content-center d-flex">
              <img src="../employee/controller/<?php echo $row2['m_image']; ?>" alt="#" class="img-fluid" style="width: 500px;">
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3><?php echo $row2['m_title']; ?></h3>
            <h5>Expiry Date : <?php echo $row2['m_expiry_date']; ?></h5>
            <p>
            <?php echo $row2['m_description']; ?>.
            </p>
            <div class="card_area">
                <!-- <div class="product_count_area">
                    <p>Quantity</p>
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div-->
                    <p>Price : <?php echo $row2['m_mrp']; ?></p>
                </div> 
              <div class="add_to_cart">
                  <a href="controller/add_to_cart.php?m_id=<?php echo $row2['m_id']; ?>" class="btn_3">add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--::footer_part start::-->
  <?php include 'includes/footer.php';?>

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