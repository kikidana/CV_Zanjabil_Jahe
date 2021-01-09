<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'database.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
// $data = mysqli_query($connection,"select * from user where email='$email' and password='$password'");
$data1 = mysqli_query($connection,"SELECT * FROM user WHERE email='$email'");
$data2 = mysqli_query($connection,"SELECT * FROM user WHERE email='$email' AND password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek_email = mysqli_num_rows($data1);
$cek_pw = mysqli_num_rows($data2);
 
if($cek_email > 0){
	if ($cek_pw > 0) {
		$user = mysqli_fetch_array($data2); // ngambil data dari tabel
		$_SESSION['user_id'] = $user['user_id'];
		$_SESSION['role_id'] = $user['role_id'];
		$_SESSION['nama'] = $user['nama'];
		header("location:../index.php");
	}else{
		header("location:../login.php?pesan=gagal_pw");	
	}
}else if (($cek_pw > 0) && ($cek_email == 0)) {
	header("location:../login.php?pesan=gagal_email");
}
else{
	header("location:../login.php?pesan=gagal");
}
?>