<?php 
	session_start();
	include 'database.php';

	$id_pesanan = $_POST['id_pesanan'];
	$status = $_POST['status'];

	$data = mysqli_query($connection,"SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");

	if (mysqli_num_rows($data) > 0) {
		mysqli_query($connection, "UPDATE pesanan SET status='$status' WHERE id_pesanan='$id_pesanan'");
	}
	header("location:../list_pesanan.php");
?>