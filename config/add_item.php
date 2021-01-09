<?php 
	session_start();
	include 'database.php';

	$nama_barang = $_POST['nama_barang'];
	$harga_barang = $_POST['harga_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];
	$deskripsi_barang = $_POST['deskripsi_barang'];

	$data = mysqli_query($connection,"SELECT * FROM barang WHERE nama_barang='$nama_barang'");

	if (mysqli_num_rows($data) > 0) {
		header("location:../tambah_item.php?pesan=gagal_itemtersedia");			
	}else{
		mysqli_query($connection, "INSERT INTO barang (nama_barang, harga_barang, jumlah_barang, deskripsi_barang) VALUES('$nama_barang', '$harga_barang', '$jumlah_barang', '$deskripsi_barang')");

		$data = mysqli_query($connection,"SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1");
		$barang = mysqli_fetch_array($data);
		$id_barang = $barang['id_barang'];

		$ekstensi_diperbolehkan = array('png', 'jpg');
		$fileName = $_FILES['gambar_barang']['name'];
		$x = explode('.', $fileName);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES['gambar_barang']['size'];
		$file_tmp = $_FILES['gambar_barang']['tmp_name'];
		$lokasi = "../img/barang/";
		$nama_baru = $id_barang . '.' . $ekstensi;

		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
		    if ($ukuran < 10044070) {
		        move_uploaded_file($file_tmp, $lokasi . $nama_baru);
		        mysqli_query($connection, "UPDATE barang SET gambar_barang='$nama_baru' WHERE id_barang='$id_barang'");
		    }
		}

		header("location:../index.php");
	}
?>
