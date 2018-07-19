<?php
	session_start();
    if(empty($_SESSION['user'])) {
        header("location:login.php");
    }
    
    include("layout/header.php"); 
    include("config/koneksi.php");    
    $wilayah = mysqli_query($con,"SELECT * FROM wilayah");
?>

<main class="main-wrapper clearfix">
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <h4 class="page-title-heading mr-0 mr-r-5">Import Data</h4>
        </div>
    </div>
    <div class="widget-list">
        <div class="row">
            <div class="col-md-8 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h6 class="page-title-heading mr-0 mr-r-5">Import Data</h6>
                        <form class="form-horizontal" method="post" action="config/importData.php" enctype="multipart/form-data" style="margin-top: 20px">
                        	<div class="form-group row">
					            <label class="col-md-3 col-form-label" for="l1">Pilih Kategori</label>
					            <div class="col-md-9">
					            	<select name="kat" class="form-control">
					            		<option value="">Pilih Kategori</option>
					            		<option value="tempat_bermain">Tempat Bermain</option>
					            		<option value="tempat_makan">Tempat Makan</option>
					            		<option value="wisata_alam">Wisata Alam</option>
					            		<option value="hotel_penginapan">Hotel / Penginapan</option>
					            		<option value="tempat_sejarah">Tempat Sejarah</option>
					            		<option value="oleh_oleh">Tempat Oleh-Oleh</option>
					            	</select>
					            </div>
					        </div>
                        	<div class="form-group row">
					            <label class="col-md-3 col-form-label" for="l1">File</label>
					            <div class="col-md-9">
					            	<input id="l39" type="file" name="fileImport">
					            </div>
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