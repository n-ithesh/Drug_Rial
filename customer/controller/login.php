<?php
include '../../config.php';
$admin=new Admin();
if(isset($_POST['submit'])){
$cemail=$_POST['email'];
$cpass=$_POST['pass'];

$stmt=$admin->ret("SELECT * FROM `customer` where `c_email`='$cemail' and `c_password`='$cpass'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$num=$stmt->rowCount();
if($num>0){
    $cid=$row['c_id'];
    $_SESSION['c_id']=$cid;
    echo "<script>alert('Login successfull');window.location='../homepage.php';</script>";
} else {
    echo "<script>alert('Login Failed');window.location='../index.php';</script>";
}
}

?>