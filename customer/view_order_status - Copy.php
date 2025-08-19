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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <link rel="stylesheet" href="css/order.css">

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
        
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <div class="container">
<?php 
  
  $stmt1=$admin->ret("SELECT * FROM `order` WHERE `c_id`='$cid' and `o_id`='$oid' GROUP BY order.c_id");
 while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
  $cid=$row1['c_id'];
  $odate = $row1['o_date'];
    $o_stutus = $row1['o_status'];
    $date = date_create($odate);
    date_add($date, date_interval_create_from_date_string('3 days'));
    $estdate = date_format($date, 'Y-m-d');
    $bstmt = $admin -> ret("SELECT `p_type` FROM `payment` WHERE `o_id` = '$oid'");
    $brow = $bstmt -> fetch(PDO::FETCH_ASSOC);
    $pmethod = $brow['p_type'];
      ?>
    <article class="card">
        <header class="card-header d-flex">
        
             My Orders / Tracking  
             
             <div style="margin-left: 800px;">
            <?php if($row1['o_status']=='canceled') {?> <button class="btn btn-danger">Your Order Has Been Canceled</button>
                <?php } ?>
            </div>
          
        </header>
       
        <div class="card-body">
            <article class="card">
                <div class="card-body row">
                <div class="col"> <strong> Ordered Date:</strong> <br><?php echo $odate?> </div>
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $estdate?></div>
                    <div class="col"> <strong>Status:</strong> <br> <?php echo  $row1['o_status']?> </div>
                    <div class="col"> <strong>Payment</strong> <br> <?php echo  $pmethod?>  </div>
                    
                </div>
            </article>
            <?php if($row1['o_status']=='accepted'){?>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
            </div>
            <?php }elseif($row1['o_status']=='Picked by courier'){ ?>
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
            </div>
            <?php }elseif($row1['o_status']=='On the way'){ ?>
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
            </div>
           
            <?php }elseif($row1['o_status']=='Delivered'){ ?>
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
            </div>
         
            <?php } ?>
            <hr>
            <ul class="row">
            <?php 
$total=0;
$g_total=0;
$stmt=$admin->ret("SELECT * FROM `order` INNER JOIN `medicine` ON medicine.m_id=order.m_id WHERE `c_id`='$cid' AND `o_id`='$oid'");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $price=$row['m_mrp'];
    $qty=$row['o_qty'];
    $total=$price*$qty;
    $g_total=$g_total+$total;
?>
                <li class="col-md-4 ">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="../employee/controller/<?php echo $row['m_image']?>" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title"><?php echo $row['m_title']?><br> Quantity: <?php echo $row['o_qty']?> <br>Price: ₹<?php echo $row['m_mrp']?></p> <h6 class="">Total: ₹<?php echo $total?></h6>
                            
                        </figcaption>
                    </figure>
                </li>
              <?php } ?>
              
            </ul>
            <hr>
            <div class="row">
            <div>
            <a href="orders.php" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back</a>
            </div>
            <div style="margin-left:750px">
                <h4>Total: ₹ <?php echo $g_total?>.00</h4>
            </div>
            </div>
        </div>
    </article>
    <?php } ?>
</div>
<!-- Button trigger modal -->


<!-- Modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller/feedback.php" method="POST">
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" name="msg"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="feed">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <!-- banner part start-->


    <!--::footer_part start::-->
   <?php include 'includes/footer.php'  ?>
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