<?php
	session_start();
    if(empty($_SESSION['user'])) {
        header("location:../login.php");
    }
    
	require("crud.php");
	$crud = new CRUD;

	$id = $_GET['id'];
	$kategori = $_GET['kat'];

	if($kategori == "main") {
		$crud->delete_data("tempat_bermain",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "makan") {
		$crud->delete_data("detail_tempat_makan",array("id_tempat" => $id));
		$crud->delete_data("tempat_makan",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "wisalam") {
		$crud->delete_data("wisata_alam",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "hotel") {
		$crud->delete_data("hotel_penginapan",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "sejarah") {
		$crud->delete_data("tempat_sejarah",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "oleh2") {
		$crud->delete_data("oleh_oleh",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "detail_tmakan") {
		$crud->delete_data("detail_tempat_makan",array("id_dtmakan" => $id));
	} else {
		header("location:404.php");
	}
?>