<?php
	include("../layout/form_input.php");

	$kat = $_GET['kat'];
	$jenis = mysqli_query($con,"SELECT * FROM jenis_tempat WHERE kategori='$kat'");

	if($kat == "Tempat Makan" || $kat == "Tempat Bermain" || $kat == "Tempat Sejarah" || $kat == "Oleh Oleh") {
		chkJenis($jenis);
		tmeJamBuka();
		tmeJamTutup();
		slcJKPK();
	} elseif($kat == "Wisata Alam" || $kat == "Hotel") {
		chkJenis($jenis);
		slcJKPK();
	} else {

	}
?>