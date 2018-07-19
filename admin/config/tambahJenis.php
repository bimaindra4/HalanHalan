<?php 
    session_start();
    if(empty($_SESSION['user'])) {
        header("location:../login.php");
    }

    include("koneksi.php");
    require("crud.php");
    $crud = new CRUD;

    $nama = $_POST['nama'];
    $kate = $_POST['kategori'];

    // Ambil nilai max untuk id
    $getMax = mysqli_query($con,"SELECT MAX(RIGHT(id_jenis_tempat,2))+1 AS maxjenis FROM jenis_tempat");
    $resMax = mysqli_fetch_assoc($getMax);
    $max = $resMax['maxjenis'];
    $id = "";

    if($max == NULL || $max == 0) {
        $id = "J01";
    } else {
        if(strlen($max) == 1) {
            $id = "J0".$max;
        } else {
            $id = "J".$max;
        }
    }

    $getAv = mysqli_query($con,"SELECT COUNT(*) AS total FROM `jenis_tempat` WHERE jenis LIKE '$nama'");
    $resAv = mysqli_fetch_assoc($getAv);
    $av = $resAv['total'];

    if($av == 0) {
        $data = array(
            "id_jenis_tempat" => $id,
            "jenis" => $nama,
            "kategori" => $kate 
        );

        $crud->insert_data($data, "jenis_tempat");
    }  

    header("location:../jenis_kategori.php");
?>