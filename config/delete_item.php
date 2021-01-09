<?php 
	session_start();
	include 'database.php';

	$id_barang = $_GET['id_barang'];

	$barang = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM barang WHERE id_barang='$id_barang'"));
	$target = "../img/barang/" . $barang['gambar_barang'];

	mysqli_query($connection, "DELETE FROM barang WHERE id_barang='$id_barang'");
	unlink($target);

	header("location:../index.php");
?>