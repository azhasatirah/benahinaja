<?php
session_start();
//$sesi=session_id();
//include "session.php";
include "conf_config.php";
include "conf_dbconnect.php";
include "conf_functions.php";

$username=$_POST['username'];
$passwd=$_POST['passwd'];

$url="login.php";


opendb();

$login = mysqli_query($koneksi,"select * from master_login where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['hak_akses']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	// cek jika user login sebagai tukang
	}else if($data['hak_akses']=="tukang"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "tukang";
		// alihkan ke halaman dashboard tukang
		header("location:tukang/index.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}

	
}else{
	header("location:login.php?pesan=gagal");
}



?>