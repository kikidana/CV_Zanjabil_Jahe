<?php 
	session_start();
	include 'database.php';

	$role = 3;
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];

	$data = mysqli_query($connection,"SELECT * FROM user WHERE email= '$email'");

	if (mysqli_num_rows($data) > 0) {
		header("location:../tambah_item.php?pesan=gagal_emailterpakai");
	}else{
		mysqli_query($connection, "INSERT INTO user (role_id, nama, email, password, no_telp, alamat) VALUES('$role', '$nama', '$email', '$password', '$no_telp', '$alamat')");

		header("location:../index.php");
	}
?>