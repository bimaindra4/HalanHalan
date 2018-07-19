<?php
	include("config/koneksi.php");

	function filterKategori($kat) {
		$out = NULL;

		if($kat == "Tempat Bermain") {
			$out = "tempat_bermain";
		} elseif($kat == "Tempat Makan") {
			$out = "tempat_makan";
		} elseif($kat == "Wisata Alam") {
			$out = "wisata_alam";
		} elseif($kat == "Hotel") {
			$out = "hotel_penginapan";
		} elseif($kat == "Tempat Sejarah") {
			$out = "tempat_sejarah";
		} elseif($kat == "Oleh Oleh") {
			$out = "oleh_oleh";
		}

		return $out;
	}

	function fltWilayah($kat,$wil,$kec) {
		$prefix = "";

		if($kat == "tempat_makan") {
			$detkat = "detail_".$kat;
			$prefix = "dtl";
		} else {
			$detkat = $kat;
			$prefix = "aa";
		}

		if($wil == "") {
			$wil_clause = $prefix.".lokasi_kabkot=ANY(SELECT lokasi_kabkot FROM ".$detkat.")";
		} else {
			$wil_clause = $prefix.".lokasi_kabkot='".$wil."'";
		}

		if($kec == "") {
			$kec_clause = $prefix.".lokasi_kecamatan=ANY(SELECT lokasi_kecamatan FROM ".$detkat.")";
		} else {
			$kec_clause = $prefix.".lokasi_kecamatan='".$kec."'";
		}

		$output = array($wil_clause,$kec_clause);
		return $output;
	}

	function fltJarak($kat,$jarak) {
		if($kat == "tempat_makan") {
			$prefix = "dtl";
		} else {
			$prefix = "aa";
		}

		if(isset($jarak)) {
			$jarak = $_POST['jkpk'];
			if($jarak == "less_5") {
				$jrk_clause = "AND ".$prefix.".jarak_ke_kota < 5";
			} elseif($jarak == "5_25") {
				$jrk_clause = "AND ".$prefix.".jarak_ke_kota BETWEEN 5 AND 25";
			} elseif($jarak == "25_50") {
				$jrk_clause = "AND ".$prefix.".jarak_ke_kota BETWEEN 25 AND 50";
			} elseif($jarak == "more_50") {
				$jrk_clause = "AND ".$prefix.".jarak_ke_kota > 50";
			} elseif($jarak == "all") {
				$jrk_clause = "";
			}
		} else {
			$jrk_clause = "";
		}

		return $jrk_clause;
	}

	function fltWaktu($kat,$jb,$jt,$pos_jb,$pos_jt) {
		if($kat == "tempat_makan" || $kat == "tempat_bermain" || $kat == "tempat_sejarah" || $kat == "oleh_oleh") {
			if($kat == "tempat_makan") {
				$prefix = "dtl";
			} else {
				$prefix = "aa";
			}
			
			if($_POST['jam_buka'] != "") {
				$wkt_bk_clause = "AND ".$prefix.".jam_buka $pos_jb '".$jb."'";
			} else {
				$wkt_bk_clause = "";
			}

			if($_POST['jam_tutup'] != "") {
				$wkt_tp_clause = "AND ".$prefix.".jam_tutup $pos_jt '".$jt."'";
			} else {
				$wkt_tp_clause = "";
			}
		} else {
			$wkt_bk_clause = "";
			$wkt_tp_clause = "";
		}

		$out = array($wkt_bk_clause,$wkt_tp_clause);
		return $out;
	}
?>