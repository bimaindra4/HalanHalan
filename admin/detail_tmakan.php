<?php
    session_start();
    if(empty($_SESSION['user'])) {
        header("location:login.php");
    }
    
    // File konfigurasi
    include("config/koneksi.php");
    include("layout/header.php");

    $id = $_GET['id'];
    $data = mysqli_query($con,"SELECT * FROM detail_tempat_makan WHERE id_tempat='$id'");
    $num = mysqli_num_rows($data);

    $data2 = mysqli_query($con,"SELECT nama_tempat FROM tempat_makan WHERE id_tempat='$id'");
    $has = mysqli_fetch_assoc($data2);

    $wilayah = mysqli_query($con,"SELECT * FROM wilayah");
?>

<!-- Tampilan -->
<main class="main-wrapper clearfix">
    <div class="row page-title clearfix">
        <div class="page-title-left">
        	<div class="col-md-12">
        		<h4 class="page-title-heading mr-0 mr-r-5">
                    <a class="btn btn-sm" href="data_spatial.php?kat=makan" style="margin-top: -5px">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    Detail Tempat
                    <small style="font-size: 14px">
                        <?php echo $has['nama_tempat'] ?>
                    </small>
                </h4>
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
                        <h5 class="box-title mr-b-0" style="margin-bottom: 20px !important; font-size: 18px">Data Cabang</h5>	
                        <table class="table" data-toggle="datatables">
                            <thead>
                                <tr class="thead-inverse bg-primary">
                                    <th>ID</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Jarak ke PK</th>
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
		                                    <td><?php echo $res['latitude'] ?></td>
		                                    <td><?php echo $res['longitude'] ?></td>
		                                    <td><?php echo $res['jarak_ke_kota']." KM" ?></td>
		                                    <td>
		                                    	<a href="edit_data.php?id=<?php echo $res['id_dtmakan'] ?>&kat=detail_tmakan" class="btn btn-xs btn-warning">Edit</a>
		                                    	<a href="config/hapusData.php?id=<?php echo $res['id_dtmakan'] ?>&kat=detail_tmakan" class="btn btn-xs btn-danger">Hapus</a>
		                                    </td>
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
        	<form method="post" action="config/tambahDetailMakan.php?id=<?php echo $id ?>">
                <div class="modal-header text-inverse">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myMediumModalLabel2">Tambah Data</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l1">Latitude</label>
                        <div class="col-md-9">
                            <input class="form-control" name="lati" id="l1" placeholder="Latitude" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l2">Longitude</label>
                        <div class="col-md-9">
                            <input class="form-control" name="long" id="l2" placeholder="Longitude" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div id="map_bermain" style="width:100%; height: 250px"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l3">Alamat</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="alamat" id="l3" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l6">Wilayah</label>
                        <div class="col-md-9">
                            <select class="form-control" name="wilayah" id="wilayah">
                            	<option value="">-- Wilayah --</option>
                            	<?php while($res = mysqli_fetch_assoc($wilayah)) { ?> 
                            	<option value="<?php echo $res['lokasi_kabkot'] ?>"><?php echo $res['nama_lokasi'] ?></option>
                            	<?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="kec">
                    	
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l4">Jarak ke Kota</label>
                        <div class="col-md-9">
                            <input type="text" name="jkk" id="l4" data-toggle="rangeslider" data-from="0" data-min="0" data-max="100" data-force-edges="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l5">Jam Buka</label>
                        <div class="col-md-9">
                            <input class="form-control" name="jamBuka" id="l5" type="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l6">Jam Tutup</label>
                        <div class="col-md-9">
                            <input class="form-control" name="jamTutup" id="l6" type="time">
                        </div>
                    </div>
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