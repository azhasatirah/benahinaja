<?php
	require 'partials/head.php';

	switch ($_POST['method']) {
		case 'store':
			if ( !empty($_POST['name']) ) {
				$Kecamatan = $_POST['Kecamatan'];
			    $name = $_POST['name'];
			    $address = $_POST['address'];
			    $latitude = $_POST['latitude'];
			    $longitude = $_POST['longitude'];
			    $email = $_POST['email'];
			    $min_price = $_POST['min_price'];
			    $max_price = $_POST['max_price'];
			    $phone = $_POST['phone'];
			    $website = $_POST['website'];
			    // var_dump($_FILES);
			    $insertKecamatan = "
			        INSERT INTO m_design_category(
			        	m_design_category_id, name, address, latitude, longitude, email, 
			        	min_price, max_price, phone, website, status)
			        VALUES (
			        	'$Kecamatan','$name', '$address', '$latitude', '$longitude', '$email', 
			        	'$min_price', '$max_price', '$phone', '$website', '1')
			    ";
			    // die(var_dump($insertKecamatan));
			    $rs_insertKecamatan = querydb($insertKecamatan);
			} else {
			    echo "";
			}

			redirect('design-category.php');
			break;
		case 'update':
			$updateId = $_GET['id'];
			$kecamatan = $_POST['kecamatan'];
			$kodekelurahan = $_POST['kodekelurahan'];
		    $kodelokasi = $_POST['kodelokasi'];
            $nama = $_POST['nama'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];

            $updateKecamatan = "
		    	UPDATE `master_kelurahan`
		    	SET `idkecamatan` = '{$kecamatan}', `kodekelurahan` = '{$kodekelurahan}', `kodelokasi` = '{$kodelokasi}', `kelurahan` = '{$nama}', `latitude` = '{$latitude}', `longitude` = '{$longitude}'
		    	WHERE `idkelurahan` = '{$updateId}'
		    ";    
		    try {
		    	$rs_updateKecamatan = querydb($updateKecamatan);	
		    } catch (Exception $e) {
		    	die(var_dump($e));
		    }

			redirect('kelurahan.php');
			break;
		case 'delete':
			# code...
			break;
		default:
			// assume default is delete
			$deleteId = $_GET['id'];
		    // var_dump($_FILES);
		    // $deleteKecamatan = "
		    //     DELETE FROM m_design_category
		    //     WHERE id = '$deleteId'
		    // ";
		    $deleteKelurahan = "
		        UPDATE `master_kelurahan`
		        SET `statusdata` = '0'
		        WHERE `idkelurahan` = '{$deleteId}'
		    ";
		    try {
		    	$rs_deleteKelurahan = querydb($deleteKelurahan);	
		    } catch (Exception $e) {
		    	die(var_dump($e));
		    }

			redirect('kelurahan.php');
			// die(var_dump($_POST));
			// redirect('design-category.php');
			break;
	}
?>