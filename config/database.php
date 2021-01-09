<?php 
	$host		= "localhost";
	$username	= "root";
	$pass 		= "";
	$database 	= "cv_zanjabil";
	$connection	= mysqli_connect($host, $username, $pass);
	mysqli_select_db($connection, $database);
?>