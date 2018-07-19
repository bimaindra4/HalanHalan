<?php
	session_start();
    if(empty($_SESSION['user'])) {
        header("location:../login.php");
    }
    
	require("crud.php");
	require("koneksi.php");
	$crud = new CRUD;

	$id = $_GET['id'];
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

		$crud->update_data($data,"tempat_bermain",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "makan") {
		$data = array(
			"nama_tempat" => $nama,
			"jenis" => $jenis
		);

		$crud->update_data($data,"tempat_makan",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "wisalam") {
		$data = array(
			"nama_tempat" => $nama,
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jenis" => $jenis
		);

		$crud->update_data($data,"wisata_alam",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "hotel") {
		$data = array(
			"nama_tempat" => $nama,
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jenis" => $jenis
		);

		$crud->update_data($data,"hotel_penginapan",array("id_tempat" => $id));
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

		$crud->update_data($data,"tempat_sejarah",array("id_tempat" => $id));
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

		$crud->update_data($data,"oleh_oleh",array("id_tempat" => $id));
		header("location:../data_spatial.php?kat=".$kategori);
	} elseif($kategori == "detail_tmakan") {
		$query = mysqli_query($con, "SELECT id_tempat FROM detail_tempat_makan WHERE id_dtmakan='$id'");
		$res = mysqli_fetch_assoc($query);
		$id_tempat = $res['id_tempat'];

		$jam_buka = $_POST['jamBuka'];
		$jam_tutup = $_POST['jamTutup'];

		if($jam_buka == "") {
			$jam_buka = NULL;
		}

		if($jam_tutup == "") {
			$jam_tutup = NULL;
		}

		$data = array(
			"latitude" => $lati,
			"longitude" => $long,
			"alamat" => $alamat,
			"lokasi_kabkot" => $kabkot,
			"lokasi_kecamatan" => $kecamatan,
			"jarak_ke_kota" => $jarak,
			"jam_buka" => $jam_buka,
			"jam_tutup" => $jam_tutup,
		);

		$crud->update_data($data,"detail_tempat_makan",array("id_dtmakan" => $id));
		header("location:../detail_tmakan.php?id=".$id);
	} else {
		header("location:404.php");
	}
?>