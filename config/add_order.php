<?php 
	session_start();
	include 'database.php';

	$id_barang = $_POST['id_barang'];
	$user_id = $_SESSION['user_id'];
	$jumlah_barang = $_POST['qty'];

	$qty = 0;
	foreach ($jumlah_barang as $q) {
		$qty += $q;
	}

	mysqli_query($connection, "INSERT INTO pesanan (user_id, qty) VALUES('$user_id', '$qty')");

	$data = mysqli_query($connection,"SELECT * FROM pesanan WHERE user_id = '$user_id' ORDER BY id_pesanan DESC LIMIT 1");
	$pesanan = mysqli_fetch_array($data);
	$id_pesanan = $pesanan['id_pesanan'];

	mysqli_query($connection, "INSERT INTO pembayaran (id_pesanan) VALUES('$id_pesanan')");

	foreach ($id_barang as $key => $value) {
		$temp = $jumlah_barang[$key];
		mysqli_query($connection, "INSERT INTO barang_pesanan (id_barang, id_pesanan, qty) VALUES('$value','$id_pesanan', '$temp')");
		mysqli_query($connection,"DELETE FROM cart WHERE pelanggan='$user_id' AND barang =  $value");
	}

	header("location:../pesanan.php");
?>