<?php
  include '../../config.php';
  $admin=new Admin();
  if (isset($_POST['paybycash'])) {
    $oid=$_POST['oid'];
    $totamount=$_POST['totamnt'];

    $st=$admin->ret("SELECT * FROM `payment` WHERE `o_id`='$oid'");
    $r=$st->fetch(PDO::FETCH_ASSOC);
    $n=$st->rowCount();
    if ($n>0) {
      echo "<script>alert('Payment for this order already has been initiated, you can pay the balance amount after the event, Thank you');window.location='../payments.php';</script>";
    } else{
      $stmt=$admin->cud("INSERT INTO `payment`(`p_date`, `o_id`, `p_type`, `p_amount`, `p_status`) VALUES (Now(),'$oid','cash','$totamount','done')","inserted");
      echo "<script>alert('Thank you, your payment has been processed, Happy ordering ');window.location='../payments.php';</script>";
    }
  }
   if (isset($_POST['paybyupi'])) {
    $oid=$_POST['oid'];
    $tid=$_POST['tid'];
    $totamount=$_POST['totamnt'];
    $st=$admin->ret("SELECT * FROM `payment` WHERE `o_id`='$oid'");
    $r=$st->fetch(PDO::FETCH_ASSOC);
    $n=$st->rowCount();
    if ($n>0) {
      echo "<script>alert('Payment for this order already has been initiated, you can pay the balance amount after the event, Thank you');window.location='../payments.php';</script>";
    } else 
    if ($tid=="") {
      echo "<script>alert('Enter the valid transaction ID for upi payment, then proceed');window.location='../payment.php';</script>";
    }else{
      $stmt=$admin->cud("INSERT INTO `payment`(`p_date`, `o_id`, `p_type`, `p_tid`, `p_amount`, `p_status`) VALUES (Now(),'$oid','upi','$tid','$totamount','done')","inserted");
      echo "<script>alert('Thank you, your payment has been processed, Happy booking ');window.location='../payments.php';</script>";
    }
  }

  ?>