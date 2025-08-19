<?php
include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];
if(isset($_POST['order'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pin=$_POST['pin'];
    $stmtt=$admin -> ret("SELECT * from `cart` inner join `medicine` on medicine.m_id=cart.m_id where cart.c_id='$cid'");
    while($r= $stmtt->fetch(PDO::FETCH_ASSOC)){
        $mid=$r['m_id'];
        $qty=$r['cart_qty'];
        $price=$r['m_mrp'];
        $total=$price*$qty;
        $stmt1=$admin->cud("INSERT INTO `order`(`o_date`, `c_id`, `m_id`, `o_qty`, `o_total_amount`, `o_name`, `o_phone`, `o_email`, `o_address`, `o_city`, `o_pin`, `o_state`, `o_status`) VALUES (Now(),'$cid','$mid','$qty','$total','$name','$phone','$email','$address','$city','$pin','$state','placed')","saved");

        $stmt3=$admin->cud("DELETE FROM `cart` WHERE `c_id`='$cid'","deleted");
    echo "<script>alert('Your Order has been placed!!!');window.location='../orders.php';</script>";
}
}
if(isset($_POST['update'])){
    $id=$_POST['oid'];
    $sts=$_POST['status'];
    $stmt = $admin->cud("UPDATE `order` SET `o_status`='$sts' where `o_id`='$id'","deleted");
    echo "<script>alert('Order status has been modified!!!');window.location='../order.php';</script>";
}

?>