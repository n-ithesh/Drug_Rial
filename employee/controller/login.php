<?php
include '../../config.php';
$admin=new Admin();
$eemail=$_POST['email'];
$epass=$_POST['pass'];

$stmt=$admin->ret("SELECT * FROM `employee` where `e_email`='$eemail' and `e_password`='$epass'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$num=$stmt->rowCount();
if($num>0){
    $aid=$row['e_id'];
    $_SESSION['e_id']=$aid;
    echo "<script>alert('Login successfull');window.location='../home.php';</script>";
} else {
    echo "<script>alert('Login Failed');window.location='../index.php';</script>";
}
?>