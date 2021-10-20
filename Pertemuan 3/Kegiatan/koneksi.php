<?php 
	$host 			= "localhost";
	$username		= "root";
	$password		= "";
	$databasename	= "semester5_pwd_prak_akademik";
	$con 			= @mysqli_connect($host,$username,$password,$databasename);

	if (!$con) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}else{
		echo "Berhasil!";
	}
?>