<?php
	session_start();
    if(empty($_SESSION['user'])) {
        header("location:login.php");
    }
    
	// File konfigurasi
	include("config/koneksi.php");
	include("layout/header.php");
    include("layout/form_input.php");

	$kat = $_GET['kat'];
	$wilayah = mysqli_query($con, "SELECT * FROM wilayah");

	// IF untuk query nya
	if($kat == "main") {
		$judul = "Tempat Bermain";
		$jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Tempat Bermain'");
		$data = mysqli_query($con, "SELECT tb.*, jt.jenis AS jenisnya FROM tempat_bermain tb 
									JOIN jenis_tempat jt ON tb.jenis = jt.id_jenis_tempat
									ORDER BY tb.id_tempat ASC");
		$num = mysqli_num_rows($data);
	} elseif($kat == "makan") {
		$judul = "Tempat Makan";
		$jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Tempat Makan'");
		$data = mysqli_query($con, "SELECT tm.*, jt.jenis AS jenisnya, COUNT(dtm.id_dtmakan) AS jumlah_cb FROM tempat_makan tm 
									JOIN jenis_tempat jt ON tm.jenis = jt.id_jenis_tempat
									JOIN detail_tempat_makan dtm ON tm.id_tempat = dtm.id_tempat
									GROUP BY tm.nama_tempat
									ORDER BY tm.id_tempat ASC");
		$num = mysqli_num_rows($data);
	} elseif($kat == "wisalam") {
		$judul = "Wisata Alam";
		$jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Wisata Alam'");
		$data = mysqli_query($con, "SELECT wa.*, jt.jenis AS jenisnya FROM wisata_alam wa 
									JOIN jenis_tempat jt ON wa.jenis = jt.id_jenis_tempat
									ORDER BY wa.id_tempat ASC");
		$num = mysqli_num_rows($data);
	} elseif($kat == "hotel") {
		$judul = "Hotel";
		$jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Hotel'");
		$data = mysqli_query($con, "SELECT hp.*, jt.jenis AS jenisnya FROM hotel_penginapan hp 
									JOIN jenis_tempat jt ON hp.jenis = jt.id_jenis_tempat
									ORDER BY hp.id_tempat ASC");
		$num = mysqli_num_rows($data);
	} elseif($kat == "sejarah") {
		$judul = "Tempat Sejarah";
		$jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Tempat Sejarah'");
		$data = mysqli_query($con, "SELECT ts.*, jt.jenis AS jenisnya FROM tempat_sejarah ts 
									JOIN jenis_tempat jt ON ts.jenis = jt.id_jenis_tempat
									ORDER BY ts.id_tempat ASC");
		$num = mysqli_num_rows($data);
	} elseif($kat == "oleh2") {
		$judul = "Tempat Oleh-Oleh";
		$jenis = mysqli_query($con, "SELECT * FROM jenis_tempat WHERE kategori='Oleh Oleh'");
		$data = mysqli_query($con, "SELECT oo.*, jt.jenis AS jenisnya FROM oleh_oleh oo 
									JOIN jenis_tempat jt ON oo.jenis = jt.id_jenis_tempat
									ORDER BY oo.id_tempat ASC");
		$num = mysqli_num_rows($data);
	} else {
		header("location:404.php");
	}
?>

<!-- Tampilan -->
<main class="main-wrapper clearfix">
    <div class="row page-title clearfix">
        <div class="page-title-left">
        	<div class="col-md-12">
        		<h4 class="page-title-heading mr-0 mr-r-5"><?php echo $judul ?></h4>
	            <div class="pull-right">
	            	<button class="btn btn-outline-primary ripple" data-toggle="modal" data-target=".tambah-data" style="margin-left: 5px">Tambah Data</button>
	            </div>
        	</div>
        </div>
    </div>
    <div class="widget-list">
        <div class="row">
            <div class="col-md-12 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h5 class="box-title mr-b-0" style="margin-bottom: 20px !important; font-size: 18px">Data <?php echo $judul ?></h5>	
                        <table class="table" data-toggle="datatables">
                            <thead>
                                <tr class="thead-inverse bg-primary">
                                    <th>ID</th>
                                    <th>Nama Tempat</th>
                                    <?php if($kat != "makan") { ?>
	                                    <th>Latitude</th>
	                                    <th>Longitude</th>
	                                    <th>Jarak ke PK</th>
                                	<?php } else { ?>
                                		<th>Jumlah Cb.</th>
                                	<?php } ?>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            		if($num != 0) {
                            			$no = 1; 
                            			while($res = mysqli_fetch_assoc($data)) { ?>
                            			<tr>
		                                    <td><?php echo $no ?></td>
		                                    <td><?php echo $res['nama_tempat'] ?></td>
		                                    <?php if($kat != "makan") { ?>
			                                    <td><?php echo $res['latitude'] ?></td>
			                                    <td><?php echo $res['longitude'] ?></td>
			                                    <td><?php echo $res['jarak_ke_kota']." KM" ?></td>
			                                    <td><?php echo $res['jenisnya'] ?></td>
			                                    <td>
			                                    	<a href="edit_data.php?id=<?php echo $res['id_tempat'] ?>&kat=<?php echo $kat ?>" class="btn btn-xs btn-warning">Edit</a>
			                                    	<a href="config/hapusData.php?id=<?php echo $res['id_tempat'] ?>&kat=<?php echo $kat ?>" class="btn btn-xs btn-danger">Hapus</a>
			                                    </td>
			                                <?php } elseif($kat == "makan") { ?>
			                                	<td><?php echo $res['jumlah_cb'] ?></td>
			                                    <td><?php echo $res['jenisnya'] ?></td>
			                                    <td>
			                                    	<a href="detail_tmakan.php?id=<?php echo $res['id_tempat'] ?>" class="btn btn-xs btn-info">Detail</a>
			                                    	<a href="edit_data.php?id=<?php echo $res['id_tempat'] ?>&kat=<?php echo $kat ?>" class="btn btn-xs btn-warning">Edit</a>
			                                    	<a href="config/hapusData.php?id=<?php echo $res['id_tempat'] ?>&kat=<?php echo $kat ?>" class="btn btn-xs btn-danger">Hapus</a>
			                                    </td>
			                                <?php } ?>
		                                </tr>
		                                <?php $no++; }  
		                            } 
		                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal tambah data -->
<div class="modal modal-info fade tambah-data" tabindex="-1" role="dialog" style="display: none">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        	<form method="post" action="config/tambahData.php?kat=<?php echo $kat ?>">
                <div class="modal-header text-inverse">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myMediumModalLabel2">Tambah Data</h5>
                </div>
                <div class="modal-body">
                	<?php 
                        txtNama(); 
                        
                        if($kat != "makan") { 
                            txtLati();
                            txtLong();
                            txaAlamat();
                            slcWilayah($wilayah); 
                        ?>
                        <div class="form-group row" id="kecamatan"></div>
                    <?php
                            sldJKPK();
                            txtJbuka();
                            txtJtutup();
                        }

                        slcJenis($jenis);
                    ?>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-danger btn-rounded ripple text-left" data-dismiss="modal">Tutup</button>
                	<button type="submit" class="btn btn-info btn-rounded ripple text-left">Tambah</button> 
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("layout/footer.php"); ?>