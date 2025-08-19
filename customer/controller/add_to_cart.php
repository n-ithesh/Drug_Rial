<?php
include '../../config.php';
$admin=new Admin();
$cid = $_SESSION['c_id'];
$mid = $_GET['m_id'];


$stmt=$admin->ret("SELECT * FROM `medicine` where `m_id`='$mid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$price=$row['m_mrp'];

$stmt2=$admin->ret("SELECT * FROM `cart` where `m_id`='$mid' and `c_id`='$cid'");
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
$num2=$stmt2->rowCount();
if ($num2>0) {
    echo "<script>alert('Medicine already exists in your cart');window.location='../cart.php';</script>";
} else {

$st=$admin->cud("INSERT INTO `cart`(`cart_date`, `m_id`, `c_id`, `cart_qty`, `cart_total_amount`, `cart_status`) VALUES (Now(),'$mid','$cid',1,'$price','added')","saved");
    echo "<script>alert('Medicine added to cart successfully');window.location='../cart.php';</script>";
}
?>