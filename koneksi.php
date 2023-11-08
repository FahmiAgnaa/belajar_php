<?php
	//persiapan identitas server
	$server 	= "localhost";	//nama server
	$user		= "root";		//nama database server
	$pass		= "";			//password database server
	$database	= "db_belajar";	//nama database

	//koneksi database
	$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

?>