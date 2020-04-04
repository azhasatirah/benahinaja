<?php
session_start();
//$sesi=session_id();
//include "session.php";
include "conf_config.php";
include "conf_dbconnect.php";
include "conf_functions.php";

$username=$_POST['username'];
$passwd=$_POST['password'];

$url="index.php";

opendb();
		
		$jam = date("H:i:s");		
		querydb ("	UPDATE eks_log_akses 
					SET timelogout='$jam', status='2' 
					WHERE user_login = '$_SESSION[user_login]' AND status ='1' ");
					unset($_SESSION['user_login']);
					unset($_SESSION['aksesuser_kodeunit']);
					unset($_SESSION['aksesuser_hakakses']);
		session_destroy();
		redirect($url."");
		
?>