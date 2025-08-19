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
    <div class="row py-5 px-4 h-100 "style="background-color:#fff0eb ;" >
                <div class="col-md-5 mx-auto mt-5" > <!-- Profile widget -->
                    <div class="bg-white shadow rounded overflow-hidden" style="border: 1px solid black;" >
                        <div class="px-4 pt-0 pb-4 cover">
                            <div class="media align-items-end profile-head" >
                                <div class="profile mr-3 mt-3">
                                    <?php if($row['c_dp']=="" || $row['c_dp']=="upload/"){ ?>
                                    <img src="img/dp.jfif" alt="..." style="height: 150px;width:190px;object-fit:cover;overflow:hidden" class="rounded mb-2 img-thumbnail">
                                    <?php } else { ?>
                                        <img src="controller/<?php echo $row['c_dp']; ?>" alt="profile" style="height: 150px;width:190px;object-fit:cover;overflow:hidden"/>
                                        <?php } ?>
                                    <a href="update_profile.php" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
                                </div>
                                
                                <div class="media-body mb-5 text-white">
                                    <h4 class="mt-0 mb-0"><?php echo $row['c_name']; ?> [ <?php echo $row['c_age']; ?> ]</h4>
                                    <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i><?php echo $row['c_address']; ?>, <?php echo $row['c_city']; ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="px-4 py-3">
                            <h5 class="mb-0">About</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                <p class="font-italic mb-0"> Contact : <?php echo $row['c_phone']; ?> | <?php echo $row['c_email']; ?></p>
                                <p class="font-italic mb-0">Location : <?php echo $row['c_address']; ?>, <?php echo $row['c_city']; ?> - <?php echo $row['c_state']; ?>, <?php echo $row['c_pin']; ?></p>

                            </div>
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