<?php 
	session_start();
	include 'database.php';

	$id_barang = $_GET['id_barang'];
	$id_user = $_SESSION['user_id'];

	mysqli_query($connection, "DELETE FROM cart WHERE pelanggan='$id_user' AND barang='$id_barang'");
	header("location:../cart.php");
?>