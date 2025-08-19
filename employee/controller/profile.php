<?php
include '../../config.php';
$admin=new Admin();
$eid=$_SESSION['e_id'];

if(isset($_POST['ndp'])){
    $pic="upload/".basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$pic);
    $st=$admin->cud("UPDATE `employee` SET `e_dp`='$pic' WHERE `e_id`='$eid'","saved");
    echo "<script>alert('Profile picture updated successfully');window.location='../profile.php';</script>";

}
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $st=$admin->cud("UPDATE `employee` SET  `e_name`='$name',`e_email`='$email',`e_phone`='$phone',`e_address`='$address' WHERE `e_id`='$eid'","saved");
    echo "<script>alert('Profile picture updated successfully');window.location='../profile.php';</script>";

}

if(isset($_POST['up'])){
    $np=$_POST['np'];
    $cp=$_POST['cp'];
    $st=$admin->ret("SELECT * FROM `employee` where `e_id`='$eid'");
    $ro=$st->fetch(PDO::FETCH_ASSOC);
    $p=$ro['e_password'];
    if($np==$cp)
    {
        if($np==$p)
        {
            echo "<script>alert('password can not same as old password!');window.location='../profile.php';</script>";
        } 
        else
         {
        $st=$admin->cud("UPDATE `employee` SET `e_password`='$cp' WHERE `e_id`='$eid'","saved");
        echo "<script>alert('profile  is updated');window.location='../profile.php';</script>";
        } 
    } 
    else
     {
        echo "<script>alert('Passwords are not matchiing');window.location='../profile.php';</script>";

    }
}
?>
