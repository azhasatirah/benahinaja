<?php	
	if(preg_match("/config.php/", $_SERVER['PHP_SELF'])){
		header("Location: login.php");
		die;
	}		
	$host = 'localhost'; 				
	$dbname = 'benahinaja';			
	$user = 'root'; //diganti sesuai user phpmyadmin 					
	$pass = 'azha321'; //diganti sesuai password phpmyadmin			
	ini_set("display_errors", "0");
?>