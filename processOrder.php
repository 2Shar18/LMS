<?php
include 'connection.php';
session_start();
if(isset($_POST['placeorder'])){  
    $product = $_POST['productQty'];
    $productQty =unserialize(base64_decode($product));
    $total = $_POST['total'];
    $type = $_POST['type'];
    if($type == 'costw'){
        $type = "Washing";
    }
    if($type == 'costi'){
        $type = "Ironing";
    }
    if($type == 'costd'){
        $type = "Dry Cleaning";
    }
    $id = $_SESSION['id'];
    $quantity = $_POST['quantity'];
    // echo($action);
    $sql = "INSERT INTO `orders`(`user_id`, `product`, `quantity`, `cost`,`type`) VALUES ('".$id."','".$product."','".$quantity."','".$total."','".$type."')";
    // $sql = "Insert into order (products,customer_id,action_id) VALUES ('".$productQty."','".$id."','".$action."')";
    $result =$conn->query($sql) or die('error');
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    header("location:orders.php?OrderSuccess=Your Order has been placed please wait for the Laundry to contact you! Thank You.");
}
else{
    header("location:index.html");
}
?>