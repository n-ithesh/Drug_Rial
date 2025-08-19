<?php
include '../../config.php';
$admin=new Admin();
$eid=$_SESSION['e_id'];

if(isset($_POST['sub'])){
    $t=$_POST['Title'];
    $d=$_POST['Description'];
    $p=$_POST['price'];
    $b=$_POST['batch'];
    $m=$_POST['manu'];
    $e=$_POST['expiry'];
    $q=$_POST['quty'];
    $cat=$_POST['cat'];
    $pic="upload/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$pic);
    $s='posted';


   $st=$admin->cud("INSERT INTO `medicine`(`cat_id`, `e_id`, `m_date`, `m_title`, `m_description`, `m_image`, `m_mrp`, `m_batch_no`, `m_manufacture`, `m_expiry_date`, `m_qty`, `m_status`) 
    VALUES ('$cat','$eid',Now(),'$t','$d','$pic','$p','$b','$m','$e','$q','$s')","saved");
    echo "<script>alert('Medicine Added successfully');window.location='../medicine.php';</script>";
}
if(isset($_POST['update'])){
    $mid=$_POST['mid'];
    $t=$_POST['Title'];
    $d=$_POST['Description'];
    $p=$_POST['price'];
    $b=$_POST['batch'];
    $m=$_POST['manu'];
    $e=$_POST['expiry'];
    $q=$_POST['quty'];
    $cat=$_POST['cat'];
    $s=$_POST['status'];
    $pic="upload/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$pic);


   $st=$admin->cud("UPDATE `medicine` SET `cat_id`='$cat',`m_title`='$t',`m_description`='$d',`m_image`='$pic',`m_mrp`='$p',`m_batch_no`='$b',`m_manufacture`='$m',`m_expiry_date`='$e',`m_qty`='$q',`m_updated_date`=Now(),`m_status`='$s' WHERE `m_id`='$mid'","saved");
    echo "<script>alert('Medicine Updates successfully');window.location='../medicine.php';</script>";
}

?>
