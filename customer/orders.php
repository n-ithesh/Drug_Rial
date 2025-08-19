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
    <div class="row py-5 px-4 h-100">
                <div class="col-md-10 mx-auto mt-5"> <!-- Profile widget -->
                <h3 >Order Details</h3>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Medicine</th>
                                    <th>Quanitity</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $st=$admin->ret("SELECT * FROM `order` inner join `medicine` on medicine.m_id=order.m_id where order.c_id='$cid'");
                                    while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                                        $oid=$ro['o_id'];
                                        $st2=$admin->ret("SELECT * FROM `payment` where `o_id`='$oid'");
                                        $ro2=$st2->fetch(PDO::FETCH_ASSOC);
                                    $num=$st2->rowCount();
                                 ?>
                                <tr>
                                    <td><?php echo $ro['o_date'] ?></td>
                                    <td><?php echo $ro['m_title'] ?></td>
                                    <td><?php echo $ro['o_qty'] ?></td>
                                    <td><?php echo $ro['o_total_amount'] ?></td>
                                    <td><?php echo $ro['o_status'] ?></td>
                                    <td><?php if($ro['o_status']=="placed" ){ ?>
                                        <a onclick="return confirm('Are you sure, you want to delete?')" href="controller/cancel_order.php?o_id=<?php echo $ro['o_id']; ?>" class="btn btn-danger">Cancel</a>
                                            <?php } else if ($ro['o_status']=="accepted") {
                                            if ($num>0) { ?>
                                                <div class="d-flex" style="gap:20px">
                                                    <a class="btn btn-success text-light">Done</a>  
                                                    <a href="view_order_status.php?o_id=<?php echo $ro['o_id']; ?>" class="btn btn-warning text-light">View</a>

                                                </div>
                                                <?php } else { ?>
                                                    <a href="pay.php?o_id=<?php echo $ro['o_id']; ?>" class="btn btn-warning text-light">Pay</a>
                                                <?php } } elseif($ro['o_status']=="Picked by courier" || $ro['o_status']=="On the way" || $ro['o_status']=="Delivered" || $ro['o_status']=="accepted"){?>
                                                    <a href="view_order_status.php?o_id=<?php echo $ro['o_id']; ?>" class="btn btn-warning text-light">View</a>
                                                <?php } elseif ($ro['o_status']=="completed" and $ro2['p_status']=="paid")  { ?>
                                                    <a href="feedback.php?o_id=<?php echo $ro['o_id']; ?>" class="btn btn-info">Feedback</a>
                                                    <?php } ?>
                                        </td>


                                        







                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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