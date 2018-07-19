<?php
	include("koneksi.php");

	$filename = $_FILES['fileImport']['tmp_name'];
	if($_FILES['fileImport']['size'] > 0) {
		$file = fopen($filename, "r");
		while(($getData = fgetcsv($file, 10000, ",")) !== false) {
			$kat = $_POST['kat'];

			// Generate jenis
			$jenis = $getData[1];
			$sqlJen = mysqli_query($con, "SELECT id_jenis_tempat FROM jenis_tempat WHERE jenis='$jenis'");
			$rowJen = mysqli_fetch_assoc($sqlJen);
			if($rowJen['id_jenis_tempat'] == NULL || $rowJen['id_jenis_tempat'] == "") {
				$idjen = NULL;
			} else {
				$idjen = $rowJen['id_jenis_tempat'];
			}

			if($kat == "tempat_makan") {
				$sql = mysqli_query($con, "INSERT INTO tempat_makan VALUES('','".$getData[0]."','".$idjen."')");
			} elseif($kat == "wisata_alam" || $kat == "hotel_penginapan") {
				$sql = mysqli_query($con, "INSERT INTO $kat ('nama_tempat','latitude','longitude','alamat','jarak_ke_kota','jenis') 
										   VALUES('".$getData[0]."','".$getData[1]."','".$getData[2]."',
										   		  '".$getData[3]."','".$getData[4]."','".$rowJen['id_jenis_tempat']."')");
			} elseif($kat == "tempat_bermain" || $kat == "tempat_sejarah" || $kat == "oleh_oleh") {
				$sql = mysqli_query($con, "INSERT INTO $kat ('nama_tempat','latitude','longitude','alamat','jarak_ke_kota','jam_buka','jam_tutup','jenis') 
										   VALUES('".$getData[0]."','".$getData[1]."','".$getData[2]."',
										   		  '".$getData[3]."','".$getData[4]."','".$getData[5]."',
										   		  '".$getData[6]."','".$rowJen['id_jenis_tempat']."')");
			} else {
				echo '
					<script type="text/javascript">
						alert("Error, invalid process");
						window.location = "../import_data.php";
					</script>
				';
			}

			if(!isset($sql)) {
				echo '
					<script type="text/javascript">
						alert("Error, invalid process!");
						window.location = "../import_data.php";
					</script>
				';
			} else {
				echo '
					<script type="text/javascript">
						alert("CSV file has been successfully imported, dont forget to edit the data region of the place that has been imported");
						window.location = "../import_data.php";
					</script>
				';
			}
		}

		fclose($file);
	}
?>