<?php
include '../../config.php';
$admin=new Admin();
$bemail=$_POST['email'];
$bpass=$_POST['pass'];

$stmt=$admin->ret("SELECT * FROM `admin` where `a_email`='$bemail' and `a_password`='$bpass'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$num=$stmt->rowCount();
if($num>0){
    $aid=$row['a_id'];
    $_SESSION['a_id']=$aid;
    echo "<script>alert('Login successfull');window.location='../home.php';</script>";
} else {
    echo "<script>alert('Login Failed');window.location='../index.php';</script>";
}
?>