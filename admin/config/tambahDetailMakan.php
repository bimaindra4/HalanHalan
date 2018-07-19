<?php
	session_start();
    if(empty($_SESSION['user'])) {
        header("location:../login.php");
    }
    
	require("crud.php");
	$crud = new CRUD;

	$id = $_GET['id'];
	$lati = $_POST['lati'];
	$long = $_POST['long'];
	$alamat = $_POST['alamat'];
	$kabkot = $_POST['wilayah'];
	$kecamatan = $_POST['kecamatan'];
	$jarak = $_POST['jkk'];
	$jam_buka = $_POST['jamBuka'];
	$jam_tutup = $_POST['jamTutup'];

	if($jam_buka == "") {
		$jam_buka = NULL;
	}

	if($jam_tutup == "") {
		$jam_tutup = NULL;
	}

	$data = array(
		"id_dtmakan" => '',
		"id_tempat" => $id,
		"latitude" => $lati,
		"longitude" => $long,
		"alamat" => $alamat,
		"lokasi_kabkot" => $kabkot,
		"lokasi_kecamatan" => $kecamatan,
		"jarak_ke_kota" => $jarak,
		"jam_buka" => $jam_buka,
		"jam_tutup" => $jam_tutup,
	);

	$crud->insert_data($data,"detail_tempat_makan");
	header("location:../detail_tmakan.php?id=".$id);
?>