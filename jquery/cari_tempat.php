<?php 
	include("../config/koneksi.php");

	// FILTER KATEGORI
		$kat = $_GET['kategori'];
		if($kat == "Tempat Bermain") {
			$kat = "tempat_bermain";
		} elseif($kat == "Tempat Makan") {
			$kat = "tempat_makan";
		} elseif($kat == "Wisata Alam") {
			$kat = "wisata_alam";
		} elseif($kat == "Hotel") {
			$kat = "hotel_penginapan";
		} elseif($kat == "Tempat Sejarah") {
			$kat = "tempat_sejarah";
		} elseif($kat == "Oleh Oleh") {
			$kat = "oleh_oleh";
		}

	if($kat == NULL || $kat == "") {
		echo '
		<tr>
			<td colspan="6" align="center">
				<div class="alert alert-secondary">
					<strong>Kategori harus diisi</strong>
				</div>
			</td>
		</tr>';
	} else {
		// FILTER WILAYAH
			$wil = $_GET['wilayah'];
			$kec = $_GET['kecamatan'];

			if($wil == "") {
				$wil_clause = "aa.lokasi_kabkot=ANY(SELECT lokasi_kabkot FROM ".$kat.")";
			} else {
				$wil_clause = "aa.lokasi_kabkot='".$wil."'";
			}

			if($kec == "") {
				$kec_clause = "aa.lokasi_kecamatan=ANY(SELECT lokasi_kecamatan FROM ".$kat.")";
			} else {
				$kec_clause = "aa.lokasi_kecamatan='".$kec."'";
			}

		// FILTER WAKTU
			$wkt_clause = "";

		// FILTER JARAK
			if(isset($_GET['jkpk'])) {
				$jarak = $_GET['jkpk'];
				if($jarak == "less_5") {
					$jrk_clause = "AND aa.jarak_ke_kota < 5";
				} elseif($jarak == "5_25") {
					$jrk_clause = "AND aa.jarak_ke_kota BETWEEN 5 AND 25";
				} elseif($jarak == "25_50") {
					$jrk_clause = "AND aa.jarak_ke_kota BETWEEN 25 AND 50";
				} elseif($jarak == "more_50") {
					$jrk_clause = "AND aa.jarak_ke_kota > 50";
				} elseif($jarak == "all") {
					$jrk_clause = "";
				}
			} else {
				$jrk_clause = "";
			}

		// FILTER JENIS KATEGORI
			if(isset($_GET[$kat])) {
				$jenis = $_GET[$kat];
				$isi_jenis = '';

				for($i=0; $i<count($jenis); $i++) { 
					$que_jen = mysqli_query($con, "SELECT id_jenis_tempat FROM jenis_tempat WHERE jenis='$jenis[$i]'");
					$res_jen = mysqli_fetch_assoc($que_jen);

					$isi_jenis .= '"'.$res_jen['id_jenis_tempat'].'",';
				}

				$isi_jenis = rtrim($isi_jenis,",");
				$jen_clause = "AND aa.jenis IN(".$isi_jenis.")";
			} else {
				$jen_clause = "";	
			}

		// QUERY
			if($kat == "tempat_makan") {
				if($jen_clause == "") {
					$jen_clause = "aa.jenis = ANY(SELECT jenis FROM tempat_makan)";	
				} else {
					$jen_clause = str_replace("AND ","",$jen_clause);
				}
				
				$query = mysqli_query($con, "SELECT aa.*, jn.jenis AS jenisnya FROM $kat aa
											 JOIN jenis_tempat jn ON aa.jenis = jn.id_jenis_tempat
											 WHERE $jen_clause");
			} else {
				$query = mysqli_query($con, "SELECT aa.*, jn.jenis AS jenisnya FROM $kat aa
											 JOIN jenis_tempat jn ON aa.jenis = jn.id_jenis_tempat
											 WHERE $wil_clause AND $kec_clause $wkt_clause $jrk_clause $jen_clause");
			}

			$num = mysqli_num_rows($query);

		// HASIL
			$no = 1;
			if($kat != "tempat_makan") {
				if($num == 0) {
					echo '<tr><td colspan="6" align="center">Data Kosong :(</td></tr>';
				} else {
					while($res = mysqli_fetch_assoc($query)) {
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$res['nama_tempat'].'</td>
							<td>'.$res['latitude'].'</td>
							<td>'.$res['longitude'].'</td>
							<td>'.$res['jenisnya'].'</td>
							<td>
								<a href="detail_tempat.php?id='.$res['id_tempat'].'&kat='.$kat.'" class="btn btn-info btn-sm">Detail</a>
								<button class="btn btn-success btn-sm">Info Map</button>
							</td>
						</tr>
						';

						$no++;
					}
				}
			} else {
				if($num == 0) {
					echo '<tr><td colspan="4" align="center">Data Kosong :(</td></tr>';
				} else {
					while($res = mysqli_fetch_assoc($query)) {
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$res['nama_tempat'].'</td>
							<td>'.$res['jenisnya'].'</td>
							<td>
								<button class="btn btn-info btn-xs">Detail</button>
								<button class="btn btn-danger btn-xs">Feedback</button>
							</td>
						</tr>
						';

						$no++;
					}
				}
			}
	}
?>