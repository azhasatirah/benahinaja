<?php 
	function opendb(){
		global $host, $user, $pass, $dbname, $dbconnect;
		$host="localhost";
		$user="root";
		$pass="azha321";
		$dbconnect = mysql_connect($host, $user, $pass) or die("Gagal membuka Database");
		$dbselect = mysql_select_db($dbname);	
	} 

	
	function closedb(){
		global $dbcon;   
		mysql_close($dbconnect);
	}
	
	function myerror($er){
		switch($er){
			case '1216':
				echo "<div align=\"center\">Form Tidak Boleh Kosong<br/><a href=\"javascript:history.back(1)\">Kembali</a></div>";
				break;
			case '1062':
				echo "<div align=\"center\">Data Yang Dimasukkan Sudah Ada<br/><a href=\"javascript:history.back(1)\">Kembali</a></div>";
				break;	
			case '1217':
				echo "<div align=\"center\">Data tidak dapat di update atau dihapus, karena dipakai oleh data lain <br/><a href=\"javascript:history.back(1)\">Kembali</a></div>";
				break;	
			case '1452':
				echo "<div align=\"center\">Form Tidak Boleh Kosong<br/><a href=\"javascript:history.back(1)\">Kembali</a></div>";
				break;				
			default:
				echo "";
				break;
		}

	}
	function querydb($query){
		global $dbconnect;
		$result = mysql_query($query) or die("<div align=\"center\"># ".mysql_errno($dbconnect)."</div>".myerror(mysql_errno($dbconnect)).mysql_error($dbconnect)/**/);
		return $result;
	}
	function getOneRecord($sql){		
		$rs = querydb($sql); 
		$dataRec = mysql_fetch_array($rs);
		return $dataRec;
	}
	function isExist($sql){
		$rs = querydb($sql);
		if(mysql_num_rows($rs)>0){ 
			return TRUE;  			
		}else{
			return FALSE;
		}		
	}
	function jmlRecord($sql){
		$rs = querydb($sql);
		$jml = mysql_num_rows($rs);
		return $jml;
	}
	function fetch($rs){
		$fetch=mysql_fetch_array($rs);
		return $fetch;
	}

	
function odbc_RecCount($sql_id, $CurrRow = 0) {
  $NumRecords = 0;

  odbc_fetch_row($sql_id, 0);
  while (odbc_fetch_row($sql_id))
  {
    $NumRecords++;
  }
  odbc_fetch_row($sql_id, $CurrRow);
  return $NumRecords;
} 
?>