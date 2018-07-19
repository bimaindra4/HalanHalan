<?php
	session_start();
	ob_start();
    if(empty($_SESSION['user'])) {
        header("location:../login.php");
    }
    
	include("koneksi.php");
	include("crud.php");
	
	$id = $_GET['id'];
	$kat = $_GET['kat'];

	$foto1 = 'foto1';
	$foto2 = 'foto2';
	$foto3 = 'foto3';

	function upload_file($var,$kat,$id) {
		$crud = new CRUD;

		// table_db
		$table = '';
		if($kat == "main") {
			$table = 'tempat_bermain';
		} elseif($kat == "detail_tmakan") {
			$table = 'detail_tempat_makan';
		} elseif($kat == "wisalam") {
			$table = 'wisata_alam';
		} elseif($kat == "hotel") {
			$table = 'hotel_penginapan';
		} elseif($kat == "sejarah") {
			$table = 'tempat_sejarah';
		} elseif($kat == "oleh2") {
			$table = 'oleh_oleh';
		}

		// field_db
		$field = '';
		if($var == 'foto1') {
			$field = 'foto_tempat1';
		} elseif($var == 'foto2') {
			$field = 'foto_tempat2';
		} elseif($var == 'foto3') {
			$field = 'foto_tempat3';
		}


		// upload process
		if($_FILES[$var]['name'] != "") {
			$errors = array();
			$file_name = $_FILES[$var]['name'];
			$file_size = $_FILES[$var]['size'];
			$file_tmp = $_FILES[$var]['tmp_name'];
			$file_type = $_FILES[$var]['type'];
			$tmp = explode(".",$_FILES[$var]['name']);
			$file_ext = end($tmp);

			$ext = array("jpg", "jpeg", "png");
			if(in_array($file_ext, $ext) === false){
				$errors[] = "ekstensi pada foto 1 tidak diperbolehkan, pilih ekstensi .jpg .jpeg dan .png";
			}

			if($file_size > 2097152) {
				$errors[] = 'File size must be excately 2 MB';
			}

			if(empty($errors) == true) {
				move_uploaded_file($file_tmp, "../../assets/gis/foto_tempat/".$file_name);
				$data = array(
					$field => $file_name
				);

				if($table == "detail_tempat_makan") {
					$crud->update_data($data, $table, array("id_dtmakan" => $id));
				} else {
					$crud->update_data($data, $table, array("id_tempat" => $id));
				}
				
				header("location:../edit_data.php?id=".$id."&kat=".$kat);
			} else {
				//print_r($errors);
				header("location:../edit_data.php?id=".$id."&kat=".$kat);
			}
		}
	}

	upload_file($foto1,$kat,$id);
	upload_file($foto2,$kat,$id);
	upload_file($foto3,$kat,$id);

	ob_end_flush();
?>