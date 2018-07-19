<?php
    session_start();
    if(empty($_SESSION['user'])) {
        header("location:login.php");
    }
    
	include("config/koneksi.php");
	include("layout/header.php");
    include("layout/form_input.php");

	$kat = $_GET['kat'];
    $id = $_GET['id'];
	$wilayah = mysqli_query($con, "SELECT * FROM wilayah");

    function getQueriesKec($kabkot) {
        $query = "SELECT * FROM kecamatan WHERE lokasi_kabkot=$kabkot";
        return $query;
    }

	if($kat == "main") {
		$jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Tempat Bermain'");
		$data = mysqli_query($con, "SELECT tb.*, jt.jenis AS jenisnya FROM tempat_bermain tb 
									JOIN jenis_tempat jt ON tb.jenis = jt.id_jenis_tempat
									WHERE tb.id_tempat='$id'");
        
        $res = mysqli_fetch_assoc($data);
	} elseif($kat == "makan") {
        $jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Tempat Makan'");
        $data = mysqli_query($con, "SELECT tm.*, jt.jenis AS jenisnya FROM tempat_makan tm 
                                    JOIN jenis_tempat jt ON tm.jenis = jt.id_jenis_tempat
                                    WHERE tm.id_tempat='$id'");
        
        $res = mysqli_fetch_assoc($data);
	} elseif($kat == "wisalam") {
        $jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Wisata Alam'");
        $data = mysqli_query($con, "SELECT wa.*, jt.jenis AS jenisnya FROM wisata_alam wa 
                                    JOIN jenis_tempat jt ON wa.jenis = jt.id_jenis_tempat
                                    WHERE wa.id_tempat='$id'");
        
        $res = mysqli_fetch_assoc($data);
    } elseif($kat == "hotel") {
        $jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Hotel'");
        $data = mysqli_query($con, "SELECT hp.*, jt.jenis AS jenisnya FROM hotel_penginapan hp 
                                    JOIN jenis_tempat jt ON hp.jenis = jt.id_jenis_tempat
                                    WHERE hp.id_tempat='$id'");
        
        $res = mysqli_fetch_assoc($data);
    } elseif($kat == "sejarah") {
        $jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Tempat Sejarah'");
        $data = mysqli_query($con, "SELECT ts.*, jt.jenis AS jenisnya FROM tempat_sejarah ts 
                                    JOIN jenis_tempat jt ON ts.jenis = jt.id_jenis_tempat
                                    WHERE ts.id_tempat='$id'");
        
        $res = mysqli_fetch_assoc($data);
    } elseif($kat == "oleh2") {
        $jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Oleh Oleh'");
        $data = mysqli_query($con, "SELECT oo.*, jt.jenis AS jenisnya FROM oleh_oleh oo 
                                    JOIN jenis_tempat jt ON oo.jenis = jt.id_jenis_tempat
                                    WHERE oo.id_tempat='$id'");
        
        $res = mysqli_fetch_assoc($data);
    } elseif($kat == "detail_tmakan") {
        $data = mysqli_query($con, "SELECT * FROM detail_tempat_makan WHERE id_dtmakan='$id'");
        $res = mysqli_fetch_assoc($data);
    } else {
		header("location:404.php");
	}

    if($kat != "makan") {
        $kec = getQueriesKec($res['lokasi_kabkot']);    
    }
?>

<main class="main-wrapper clearfix">
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <div class="col-md-12">
                <?php 
                    $url = "";
                    if($kat == "detail_tmakan") {
                        $url = "detail_tmakan.php?id=".$res['id_tempat'];
                    } else {
                        $url = "data_spatial.php?kat=".$kat;
                    }
                ?>
                <a class="btn btn-sm" href="<?php echo $url ?>" style="margin-top: -5px">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <h4 class="page-title-heading mr-0 mr-r-5">Edit Data</h4>
            </div>
        </div>
    </div>
    <div class="widget-list">
        <div class="row">
            <div class="col-md-6 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h6 class="page-title-heading mr-0 mr-r-5" style="margin-bottom: 30px !important">Edit Data</h6>
                        <form method="post" action="config/editData.php?id=<?php echo $id ?>&kat=<?php echo $kat ?>">
                            <?php 
                                if($kat == "detail_tmakan") {
                                    txtLati($res['latitude']);
                                    txtLong($res['longitude']);
                                    txaAlamat($res['alamat']);
                                    slcWilayah($wilayah,$res['lokasi_kabkot']);
                                    slcKecamatan($kec,$res['lokasi_kecamatan']);
                                    sldJKPK($res['jarak_ke_kota']);
                                    txtJbuka($res['jam_buka']);
                                    txtJtutup($res['jam_tutup']);
                                } else {
                                    txtNama($res['nama_tempat']);

                                    if($kat != "makan") {
                                        txtLati($res['latitude']);
                                        txtLong($res['longitude']);
                                        txaAlamat($res['alamat']);
                                        slcWilayah($wilayah,$res['lokasi_kabkot']);
                                        slcKecamatan($kec,$res['lokasi_kecamatan']);
                                        sldJKPK($res['jarak_ke_kota']);
                                        if($kat != "wisalam") {
                                            txtJbuka($res['jam_buka']);
                                            txtJtutup($res['jam_tutup']);
                                        }
                                    }

                                    slcJenis($jenis,$res['jenis']);
                                }
                            ?>
                            <div class="form-actions btn-list">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h6 class="page-title-heading mr-0 mr-r-5" style="margin-bottom: 30px !important">Edit Foto</h6>
                        <form class="form-horizontal" method="post" action="config/editFoto.php?id=<?php echo $id ?>&kat=<?php echo $kat ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="l39">Foto Tempat 1</label>
                                <br>
                                <input id="l39" type="file" name="foto1" accept="image/*">
                                <br><small class="text-muted">Ukuran foto maksimal 2 mb</small>
                            </div>
                            <div class="form-group">
                                <label for="l40">Foto Tempat 2</label>
                                <br>
                                <input id="l40" type="file" name="foto2" accept="image/*">
                                <br><small class="text-muted">Ukuran foto maksimal 2 mb</small>
                            </div>
                            <div class="form-group">
                                <label for="l41">Foto Tempat 3</label>
                                <br>
                                <input id="l41" type="file" name="foto3" accept="image/*">
                                <br><small class="text-muted">Ukuran foto maksimal 2 mb</small>
                            </div>
                            <div class="form-actions btn-list">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include("layout/footer.php"); ?>