<?php
include '../config.php';
$admin = new Admin();
if (!isset($_SESSION['c_id'])) {
    header('Location:index.php');
}
$cid = $_SESSION['c_id'];
$oid = $_GET['o_id'];
$stmt = $admin->ret("SELECT * FROM `customer` where `c_id`='$cid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Drug Rial</title>
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

    <!-- banner part start-->
    <div class="row py-5 px-4 h-100">
        <div class="col-md-10 mx-auto mt-5"> <!-- Profile widget -->
            <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Submit your feedback</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="controller/feedback.php" method="post">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <input type="hidden" name="oid" value="<?php echo $oid; ?>">

                  <textarea class="form-control w-100" name="message" cols="30" rows="9"
                    placeholder='Enter Message' required style="border:1px solid black;"></textarea>
                </div>
              </div>
              
            </div>
            <div class="form-group mt-3">
              <button name="submit" class="btn_3 button-contactForm">Send Message</button>
            </div>
          </form>
        </div>
        
      </div>
        </div>
    </div>
    <!-- banner part start-->


    <!--::footer_part start::-->
     <!--::footer_part start::-->
     <?php include 'includes/footer.php'?>
    <!--::footer_part end::-->
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific popup js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- carousel js -->
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