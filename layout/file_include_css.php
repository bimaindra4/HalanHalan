<!-- Favicon -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

<!-- Vendor CSS -->
<link rel="stylesheet" href="assets/frontend/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/frontend/vendor/font-awesome/css/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/frontend/vendor/animate/animate.min.css">
<link rel="stylesheet" href="assets/frontend/vendor/simple-line-icons/css/simple-line-icons.min.css">
<link rel="stylesheet" href="assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="assets/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/frontend/vendor/magnific-popup/magnific-popup.min.css">

<!-- Theme CSS -->
<link rel="stylesheet" href="assets/frontend/css/theme.css">
<link rel="stylesheet" href="assets/frontend/css/theme-elements.css">
<link rel="stylesheet" href="assets/frontend/css/theme-blog.css">
<link rel="stylesheet" href="assets/frontend/css/theme-shop.css">

<!-- Current Page CSS -->
<link rel="stylesheet" href="assets/frontend/vendor/rs-plugin/css/settings.css">
<link rel="stylesheet" href="assets/frontend/vendor/rs-plugin/css/layers.css">
<link rel="stylesheet" href="assets/frontend/vendor/rs-plugin/css/navigation.css">
<link rel="stylesheet" href="assets/frontend/vendor/circle-flip-slideshow/css/component.css">

<!-- Skin CSS -->
<link rel="stylesheet" href="assets/frontend/css/skins/default.css">		
<script src="assets/frontend/master/style-switcher/style.switcher.localstorage.js"></script> 

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="assets/frontend/css/custom.css">

<!-- Head Libs -->
<script src="assets/frontend/vendor/modernizr/modernizr.min.js"></script>

<?php
	function getAddress() {
		$uri = $_SERVER['REQUEST_URI'];
		$exp = explode("/", $uri);
		return $exp[2];
	}

	// Parsing data
	function parseJs($kat,$q="") {
		include("config/koneksi.php");
		$isi = '';
		$que = '';

		if($q == "") {
			if($kat == "tempat_makan") {
				$dtl = "detail_".$kat;
				$que = mysqli_query($con, "SELECT kat.nama_tempat, 
												  dtl.id_dtmakan AS id_tempat, 
												  dtl.latitude, 
												  dtl.longitude, 
												  dtl.foto_tempat1 
										   FROM $kat kat
										   JOIN $dtl dtl ON kat.id_tempat = dtl.id_tempat");
			} else if($kat == "pusat_kota") {
				$que = mysqli_query($con, "SELECT * FROM pusat_kota");
			} else {
				$que = mysqli_query($con, "SELECT id_tempat, nama_tempat, latitude, longitude, foto_tempat1 FROM $kat");
			}
		} else {
			$que = mysqli_query($con,$q);
		}
		
		if($kat == "pusat_kota") {
			while($res = mysqli_fetch_assoc($que)) {
				$isi .= "[
					'".$res['keterangan']."',
					'".$res['latitude']."',
					'".$res['longitude']."'
				],";
			}
		} else {
			while($res = mysqli_fetch_assoc($que)) {
				$isi .= "[
					'".$res['nama_tempat']."',
					'".$res['latitude']."',
					'".$res['longitude']."',
					'".$res['id_tempat']."',
					'".$kat."',
					'".$res['foto_tempat1']."'
				],";
			}
		}
		

		$isi = rtrim($isi,",");
		$out = '['.$isi.']';
		return $out;
	}
?>