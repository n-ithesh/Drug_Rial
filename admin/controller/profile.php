<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

if(isset($_POST['ndp'])){
    $pic="upload/".basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$pic);
    $st=$admin->cud("UPDATE `admin` SET `a_dp`='$pic' WHERE `a_id`='$aid'","saved");
    echo "<script>alert('Profile picture updated successfully');window.location='../profile.php';</script>";

}

if(isset($_POST['up'])){
    $np=$_POST['np'];
    $cp=$_POST['cp'];
    $st=$admin->ret("SELECT * FROM `admin` where `a_id`='$aid'");
    $ro=$st->fetch(PDO::FETCH_ASSOC);
    $p=$ro['a_password'];
    if($np==$cp)
    {
        if($np==$p)
        {
            echo "<script>alert('Password is same as old password!');window.location='../profile.php';</script>";
        } 
        else
         {
        $st=$admin->cud("UPDATE `admin` SET `a_password`='$cp' WHERE `a_id`='$aid'","saved");
        echo "<script>alert('Password is updated');window.location='../profile.php';</script>";
        } 
    } 
    else
     {
        echo "<script>alert('Passwords are not matchiing');window.location='../profile.php';</script>";

    }
}
