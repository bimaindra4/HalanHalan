<?php
	session_start();
    if(empty($_SESSION['user'])) {
        header("location:../login.php");
    }
    
	require("crud.php");
	$crud = new CRUD;

	$id = $_GET['id'];

	$crud->delete_data("jenis_tempat",array("id_jenis_tempat" => $id));
	header("location:../jenis_kategori.php");
?>