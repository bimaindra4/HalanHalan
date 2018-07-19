<?php
	session_start();
    if(empty($_SESSION['user'])) {
        header("location:../login.php");
    }
    
	require("crud.php");
	$crud = new CRUD;

	$kategori = $_GET['kat'];

	$nama = $_POST['nama'];
	$lati = $_POST['lati'];
	$long = $_POST['long'];
	$alamat = $_POST['alamat'];
	$kabkot = $_POST['wilayah'];
	$kecamatan = $_POST['kecamatan'];
	$jarak = $_POST['jkk'];
	$jenis = $_POST['jenis'];

	if($kategori == "main") {
		$jam_buka = $_POST['jamBuka'];
		$jam_tutup = $_POST['jamTutup'];

		if($jam_buka == "") {
			$jam_buka = NULL;
		}

		if($jam_tutup == "") {
			$jam_tutup = NULL;
		}

		$data = array(
			"id_tempat" => "",
			"nama_tempat" => $nama,
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jam_buka" => $jam_buka,
			"jam_tutup" => $jam_tutup,
			"jenis" => $jenis
		);

		$crud->insert_data($data,"tempat_bermain");
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "makan") {
		$data = array(
			"id_tempat" => "",
			"nama_tempat" => $nama,
			"jenis" => $jenis
		);

		$crud->insert_data($data,"tempat_makan");
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "wisalam") {
		$data = array(
			"id_tempat" => "",
			"nama_tempat" => $nama,
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jenis" => $jenis
		);

		$crud->insert_data($data,"wisata_alam");
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "hotel") {
		$data = array(
			"id_tempat" => "",
			"nama_tempat" => $nama,
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jenis" => $jenis
		);

		$crud->insert_data($data,"hotel_penginapan");
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "sejarah") {
		$jam_buka = $_POST['jamBuka'];
		$jam_tutup = $_POST['jamTutup'];

		if($jam_buka == "") {
			$jam_buka = NULL;
		}

		if($jam_tutup == "") {
			$jam_tutup = NULL;
		}

		$data = array(
			"id_tempat" => "",
			"nama_tempat" => $nama,
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jam_buka" => $jam_buka,
			"jam_tutup" => $jam_tutup,
			"jenis" => $jenis
		);

		$crud->insert_data($data,"tempat_sejarah");
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "oleh2") {
		$jam_buka = $_POST['jamBuka'];
		$jam_tutup = $_POST['jamTutup'];

		if($jam_buka == "") {
			$jam_buka = NULL;
		}

		if($jam_tutup == "") {
			$jam_tutup = NULL;
		}

		$data = array(
			"id_tempat" => "",
			"nama_tempat" => $nama,
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jam_buka" => $jam_buka,
			"jam_tutup" => $jam_tutup,
			"jenis" => $jenis
		);

		$crud->insert_data($data,"oleh_oleh");
		header("location:../data_spatial.php?kat=".$kategori);
	} else {
		header("location:404.php");
	}
?>