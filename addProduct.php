<?php

// header("location: products.php");
include 'connection.php';

if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['costw']) && isset($_POST['costi']) && isset($_POST['costd'])){
	$name = $_POST['name'];
	$type = $_POST['type'];
	$costw = $_POST['costw'];
	$costi = $_POST['costi'];
	$costd = $_POST['costd'];
	$sql = "SELECT * FROM product WHERE name = '$name' AND type = '$type'";
	$result =$conn->query($sql) or die('error1');
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		header("Location: products.php");
	}
	else{
		$sql = "INSERT INTO product VALUES (NULL, '$name', '$type', $costw, $costd, $costi)";
		$result =$conn->query($sql) or die('error');
		$result = mysqli_query($conn,$sql);
		header("Location: products.php");
	}
}
else
	echo "entry error";
?>