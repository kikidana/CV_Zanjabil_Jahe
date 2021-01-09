<?php
	session_start();
	include 'database.php';

	$count_barang = $_POST['count_barang'];
	$id_barang = $_POST['id_barang'];
	$id_user = $_SESSION['user_id'];

	$data = mysqli_query($connection,"SELECT * FROM cart WHERE pelanggan='$id_user' AND barang='$id_barang'");
	if (mysqli_num_rows($data) > 0) {
		$cart = mysqli_fetch_array($data);
		$qty = $cart['qty'] + $count_barang; 
		mysqli_query($connection, "UPDATE cart SET qty='$qty' WHERE pelanggan='$id_user' AND barang='$id_barang'");			
	}else{
		mysqli_query($connection, "INSERT INTO cart (pelanggan, barang, qty) VALUES('$id_user', '$id_barang', '$count_barang')");
	}
	header("location:../cart.php");	
?>