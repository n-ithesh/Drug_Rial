<?php
include '../config.php';
$admin = new Admin();
if (!isset($_SESSION['c_id'])) {
    header('Location:index.php');
}
$cid = $_SESSION['c_id'];
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
    <div class="row py-5 px-4 h-100 " style="background-image: url(img/7de965ddeefc07fbdfb012a09caab478.jpg);background-repeat: no-repeat;background-size: 100vw 700px;" >
                <div class="col-md-5 mx-auto mt-5" style="border-radius: 10px; border:1px solid black; background-color:white"> <!-- Profile widget -->
                    <div class="bg-white shadow rounded overflow-hidden" style="background-color: white;">
                        <div class="px-4 pt-0 pb-4 cover">
                            <div class="media align-items-end profile-head">
                            <form class="form-contact contact_form" action="controller/profile.php" method="post" id="contactForm"
                                novalidate="novalidate" enctype="multipart/form-data">
                                <h3 class="" style="text-align:center;
                                border-radius:20px; 
                                padding:2px 2px 2px 2px;
                                 background-image:url(img/cd1d04fd14724c92c4f356aea56e4a99.jpg);
                                 margin: revert;">Edit Profile</h3>
                                <div class="row bg-light">
                                  <div class="col-sm-6 mt-3" >
                                    <div class="form-group">
                                      <label for="">Email</label>
                                      <input class="form-control" name="email" value="<?php echo $row['c_email']; ?>"  type="email" style="border: 1px solid black;" >
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                    <label for="">Password</label>
                                      <input class="form-control" name="pass"  value="<?php echo $row['c_password']; ?>"  type="number"style="border: 1px solid black;" >
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                    <label for="">Phone Number</label>
                                      <input class="form-control" name="phone"  value="<?php echo $row['c_phone']; ?>" type="number"style="border: 1px solid black;" >
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                    <label for="">Address</label>
                                      <input class="form-control" name="address"   value="<?php echo $row['c_address']; ?>"type="text" style="border: 1px solid black;">
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                    <label for="">City</label>
                                      <input class="form-control" name="city"  type="text"  value="<?php echo $row['c_city']; ?>"style="border: 1px solid black;">
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                    <label for="">State</label>
                                      <input class="form-control" name="state"  value="<?php echo $row['c_state']; ?>" type="text"style="border: 1px solid black;">
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                    <label for="">Pin Code</label>
                                      <input class="form-control" name="pin"  type="number" value="<?php echo $row['c_pin']; ?>"style="border: 1px solid black;">
                                    </div>
                                  </div>
                                  <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                      <input class="form-control" name="file" type="file" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'  style="border: 1px solid black;">
                                    </div>
                                  </div>

                                </div>
                                <div class="form-group mt-3">
                                  <button type="submit" name="update" class="btn_3 button-contactForm"style="border: 1px solid white;">Update</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- banner part start-->


    <!--::footer_part start::-->
    
    <?php include 'includes/footer.php'?>
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
    <!-- <script src="js/jquery.ajaxchimp.min.js"></script> -->
    <!-- <script src="js/jquery.form.js"></script> -->
    <script src="js/jquery.validate.min.js"></script>
    <!-- <script src="js/mail-script.js"></script> -->
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>