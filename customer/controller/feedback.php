<?php
include '../../config.php';
$admin=new Admin();
$cid = $_SESSION['c_id'];
if(isset($_POST['submit'])){
    $oid=$_POST['oid'];
    $msg=$_POST['message'];
    
    $st=$admin->cud("INSERT INTO `feedback`(`f_date`, `o_id`, `f_message`) VALUES (Now(),'$oid','$msg')","saved");
    echo "<script>alert('Your feedback has been submitted successfully');window.location='../orders.php';</script>";
}
