<?php 
	session_start();
	include 'database.php';

	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$harga_barang = $_POST['harga_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];
	$deskripsi_barang = $_POST['deskripsi_barang'];
	$fileName = $_FILES['gambar_barang']['name'];

	$data = mysqli_query($connection,"SELECT * FROM barang WHERE nama_barang='$nama_barang'");
	$data2 = mysqli_query($connection,"SELECT * FROM barang WHERE id_barang='$id_barang'");
	$barang = mysqli_fetch_array($data2);

	if ((mysqli_num_rows($data) > 0) && ($nama_barang != $barang['nama_barang'])) {
		header("location:../edit_item.php?pesan=gagal_itemtersedia&id_barang=$id_barang");	
	}else{
		if ($fileName == null) {
		    mysqli_query($connection, "UPDATE barang SET nama_barang='$nama_barang', harga_barang='$harga_barang', jumlah_barang='$jumlah_barang', deskripsi_barang='$deskripsi_barang' WHERE id_barang='$id_barang'");
		} else {
		    $ekstensi_diperbolehkan = array('png', 'jpg');
		    $x = explode('.', $fileName);
		    $ekstensi = strtolower(end($x));
		    $ukuran = $_FILES['gambar_barang']['size'];
		    $file_tmp = $_FILES['gambar_barang']['tmp_name'];
		    $lokasi = "../img/barang/";
		    $nama_baru = $id_barang . '.' . end($x);

		    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
		        if ($ukuran < 10044070) {
		            $target = "../img/barang/" . $barang['gambar_barang'];
		            unlink($target);

		            move_uploaded_file($file_tmp, $lokasi . $nama_baru);
		            mysqli_query($connection, "UPDATE barang SET nama_barang='$nama_barang', harga_barang='$harga_barang', jumlah_barang='$jumlah_barang', deskripsi_barang='$deskripsi_barang', gambar_barang='$nama_baru' WHERE id_barang='$id_barang'");
		        }
		    }
		}
		header("location:../index.php");
	}
?>