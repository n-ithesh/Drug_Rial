
<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['c_id'])){
  header('Location:index.php');
}
$cid=$_SESSION['c_id'];
$catid=$_GET['cat_id'];
$stmt=$admin->ret("SELECT * FROM `customer` where `c_id`='$cid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$st=$admin->ret("SELECT * FROM `cart` inner join `medicine` on medicine.m_id=cart.m_id where `cat_id`='$catid'");
$ro=$st->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DRUG RIAL</title>
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
    <section class="breadcrumb_part" style="background-image: url(img/417c2fdaa640b1fbff25c2660c770ad8.jpg);background-repeat: no-repeat;background-size: 100vw 400px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2 style="color: black;">Medicine list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container" id="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product_sidebar" >
                        <div class="single_sedebar">

                            <!-- <form action="view_medicine.php?cat_id=$catid"> -->
                                <input type="text" id="searchInput" onkeyup="loadDoc(this.value,<?php echo $catid ?>)" placeholder="Search Medicines here">
                                <i class="ti-search"></i>
                            <!-- </form> -->
                        </div>

                        <script>
function loadDoc(q,catid) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "searchmed.php?q="+q+"&catid="+catid, true);
  xhttp.send();
}
</script>
                        
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="product_list">
                        <div class="row">
                            <div  id="demo"></div>




                        <?php 
                        if(isset($_GET['cat_id'])){
                            $catid=$_GET['cat_id'];
                                        $st=$admin->ret("SELECT * FROM `medicine` where `cat_id`='$catid'");
                                        while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                            <div class="col-lg-4 col-sm-4 d-flex justify-content-center" >
                                <div class="single_product_item">
                                    <img src="../employee/controller/<?php echo $ro['m_image']; ?>" alt="#" class="img-fluid mt-3" style="width: 350px;height: 300px;overflow: hidden;object-fit: cover;">
                                    <h3> <a href="single-medicine.php?m_id=<?php echo $ro['m_id']; ?>"><?php echo $ro['m_title']; ?></a> </h3>
                                    <p>MRP ₹<?php echo $ro['m_mrp']; ?></p>
                                </div>
                            </div>
                            <?php } }
                            ?>
                           
                            
                        </div>
                        <!-- <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!--::footer_part start::-->
    <?php  include 'includes/footer.php'  ?>
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