<?php
session_start();
include 'connection.php';
$orderid = (int)$_POST['orderId'];
echo $orderid;
$sql = "UPDATE `orders` SET `confirm`=1 WHERE id = '".$orderid."'";
$result =$conn->query($sql) or die('error');
$result = mysqli_query($conn,$sql);
?>