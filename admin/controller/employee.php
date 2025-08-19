<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

if(isset($_POST['sub'])){
    $n=$_POST['name'];
    $e=$_POST['email'];
    $p=$_POST['phone'];
    $ps=$_POST['password'];
    $ad=$_POST['add'];
    $s="registered";


    $st=$admin->cud("INSERT INTO `employee`(`e_name`, `e_email`, `e_password`, `e_phone`, `e_address`, `e_created_date`, `e_status`) 
    VALUES ('$n','$e','$ps','$p','$ad',Now(),'$s')","saved");
    echo "<script>alert('Employee registered successfully');window.location='../employees.php';</script>";
}
else{
    echo "<script>alert('canceled');window.location='../employees.php';</script>";


}
