<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['sub'])){
    $n=$_POST['name'];
    $s="Active";
    
    $st=$admin->cud("INSERT INTO `category`(`cat_name`, `cat_posted_-date`, `cat_status`) VALUES ('$n',Now(),'$s')","saved");
    echo "<script>alert('Category posted successfully');window.location='../categories.php';</script>";
}
if(isset($_POST['update'])){
    $id=$_POST['catid'];
    $n=$_POST['name'];
    $s=$_POST['status'];
    
    $st=$admin->cud("UPDATE `category` SET `cat_name`='$n',`cat_updated_date`=Now(),`cat_status`='$s' WHERE `cat_id`='$id'","saved");
    echo "<script>alert('Category Updated successfully');window.location='../categories.php';</script>";
}


?>