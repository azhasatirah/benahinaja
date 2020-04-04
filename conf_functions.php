<?php

function redirect($url){
	echo "<script language='javascript'>window.location.href='".$url."'</script>";
}

function sc($value)
	{
		 $value = trim($value);
		 
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
		
		$value = strip_tags($value);
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars ($value);
		return $value;
		
	}

function login(){
	global $username,$passwd,$hak_akses;
	$nama=sc($username);
	$passwd=sc($passwd);
	$hak_akses=sc($hak_akses);
	$url="login.php";

	        $query_cekuser = "	SELECT 	login_id,username
				  				FROM  	log_akses
				  				WHERE 	username ='$nama' AND status = '1'
				  				";
			$rs_cekuser=querydb($query_cekuser);
			
			if (mysql_num_rows($rs_cekuser)<0) 				
					{
						echo "<script type ='text/javascript'>alert('Login Gagal, User Anda Tidak Aktif.Hubungi Admin Sistem');</script>"; 
						redirect($url."");
					}
					else
						//if (mysql_num_rows($rs_cekuser)>0) 
					{
						$query_login="	SELECT 	login_id, username
				  						FROM  	master_login
				  						WHERE 	username ='$nama'
						  				AND 	password ='".($passwd)."'
						  				AND 	status = '1' 
						  				AND 	hak_akses='admin'
						  				OR 		hak_akses='supplier'
						  				";
						//echo $query_login;
						//$data = mysqli_fetch_assoc($login)
						$rs_login=querydb($query_login);		
						if (mysql_num_rows($rs_login)>0)				
								{
								$data_login=mysql_fetch_array($rs_login);
								$_SESSION['login_id']=$data_login['login_id'];
								$_SESSION['username']=$data_login['username'];
								$_SESSION['status']=$data_login['status'];
								$_SESSION['hak_akses']=$data_login['hak_akses'];
								$_SESSION['login_id']= $username;
								$jam = date("H:i:s");
								$tgl = date("Y-m-d");
								redirect($url_user="admin/index.php");
								querydb("INSERT INTO log_akses(login_id,username,datelogin,timelogin,timelogout,status,hak_akses)
				                        VALUES('$_SESSION[login_id]','$_SESSION[username]','$tgl','$jam','','1','$_SESSION[hak_akses]')");
								}	
								else
								{
								unset($_SESSION['user_login']);
								unset($_SESSION['aksesuser_kodeunit']);
								unset($_SESSION['aksesuser_hakakses']);
								echo "<script type ='text/javascript'>alert('Login Gagal, Pastikan Username atau Password Anda Sudah Benar. Hubungi Admin Sistem');</script>"; 
								redirect($url."");
								}
					}
					// else
					// {
					// 	$query_login="	SELECT 	login_id, username
	  		// 				FROM  	master_login
	  		// 				WHERE 	username ='$nama'
			  // 				AND 	password ='".($passwd)."'
			  // 				AND 	status = '1' 
			  // 				AND 	hak_akses='supplier'
			  // 				";
					// 	//echo $query_login;
					// 	//$data = mysqli_fetch_assoc($login)
					// 	$rs_login=querydb($query_login);		
					// 	if (mysql_num_rows($rs_login)>0)				
					// 			{
					// 			$data_login=mysql_fetch_array($rs_login);
					// 			$_SESSION['login_id']=$data_login['login_id'];
					// 			$_SESSION['username']=$data_login['username'];
					// 			$_SESSION['status']=$data_login['status'];
					// 			$_SESSION['hak_akses']=$data_login['hak_akses'];
					// 			$_SESSION['login_id']= $username;
					// 			$jam = date("H:i:s");
					// 			$tgl = date("Y-m-d");
					// 			redirect($url_user="supplier/index.php");
					// 			querydb("INSERT INTO log_akses(login_id,username,datelogin,timelogin,timelogout,status,hak_akses)
				 //                        VALUES('$_SESSION[login_id]','$_SESSION[username]','$tgl','$jam','','1','$_SESSION[hak_akses]')");
					// 			}	
					// 			else
					// 			{
					// 			unset($_SESSION['user_login']);
					// 			unset($_SESSION['aksesuser_kodeunit']);
					// 			unset($_SESSION['aksesuser_hakakses']);
					// 			echo "<script type ='text/javascript'>alert('Login Gagal, Pastikan Username atau Password Anda Sudah Benar. Hubungi Admin Sistem');</script>"; 
					// 			redirect($url."");
					// 			}
					// }

}

function rp($angka){
	$number = number_format($angka,2,',','.');
	return $number;
}
function norp($angka){
	$number = number_format($angka,0,',','.');
	return $number;
}

?>