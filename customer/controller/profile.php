<?php
include '../../config.php';
$admin=new Admin();
$cid = $_SESSION['c_id'];

if(isset($_POST['update'])){
    $e=$_POST['email'];
    $p=$_POST['phone'];
    $ps=$_POST['pass'];
    $ad=$_POST['address'];
    $c=$_POST['city'];
    $pin=$_POST['pin'];
    $st=$_POST['state'];
    $pic="upload/".basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$pic);    
    // echo $pic;
    $st=$admin->cud("UPDATE `customer` SET `c_email`='$e',`c_phone`='$p',`c_password`='$ps',`c_address`='$ad',`c_city`='$c',`c_state`='$st',`c_pin`='$pin',`c_dp`='$pic',`c_updated_date`=Now(),`c_status`='updated' WHERE `c_id`='$cid'","saved");
    echo "<script>alert('Profile updated successfully');window.location='../profile.php';</script>";
}
