<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['sgn'])){
    $n=$_POST['name'];
    $e=$_POST['email'];
    $p=$_POST['phone'];
    $ps=$_POST['password'];
    $a=$_POST['age'];
    $g=$_POST['gender'];
    $ad=$_POST['address'];
    $c=$_POST['city'];
    $pin=$_POST['pincode'];
    $st=$_POST['state'];
    $s="registered";
    
    $st=$admin->cud("INSERT INTO `customer`( `c_name`, `c_age`, `c_gender`, `c_email`, `c_phone`, `c_password`, `c_address`, `c_city`, `c_state`, `c_pin`,`c_created_date`,`c_status`)VALUES ('$n','$a','$g','$e','$p','$ps','$ad',
     '$c','$st','$pin',Now(),'$s')","saved");
    echo "<script>alert(' registered successfully');window.location='../index.php';</script>";
}
