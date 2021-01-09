<?php 
	session_start();
	include 'database.php';

	$id_bank = $_POST['bank_id'];
	$id_pesanan = $_POST['id_pesanan'];
	$id_user = $_SESSION['user_id']; 

	$ekstensi_diperbolehkan = array('png', 'jpg');
	$fileName = $_FILES['bukti_transfer']['name'];
	$x = explode('.', $fileName);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['bukti_transfer']['size'];
	$file_tmp = $_FILES['bukti_transfer']['tmp_name'];
	$lokasi = "../img/bukti/".$id_user."/";
	$nama_baru = $id_pesanan . '.' . $ekstensi;

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
	    if ($ukuran < 10044070) {
	    	if (!file_exists($lokasi)) {
			    mkdir($lokasi, 0777, true);
			}
	        move_uploaded_file($file_tmp, $lokasi . $nama_baru);
	        mysqli_query($connection, "UPDATE pembayaran SET bukti_transfer='$nama_baru', id_bank='$id_bank' WHERE id_pesanan='$id_pesanan'");
	    }
	}

	header("location:../detail_pesanan.php");
?>