<?php 
	include("layout/header.php");
	include("config/koneksi.php");

	$wilayah = mysqli_query($con, "SELECT * FROM wilayah");
?>

<div role="main" class="main">
	<section class="page-header page-header-custom-background" style="background-image: url(assets/frontend/img/custom-header-bg.jpg);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<h1>Beranda</h1>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col">
                <div style="width: 100%; height: 400px">
                    <div id="map" style="width: 100%; height: 400px"></div>
                </div>
			</div>
		</div>

		<div class="divider"></div>

		<div class="row">
			<div class="col-lg-3">
				<form class="form-horizontal form-bordered" method="post" action="filter_map.php" style="margin-bottom: 40px">
					<h4>Kategori</h4>
                	<div class="form-group row">
						<div class="col-lg-12">
							<select class="form-control mb-12" name="kategori" id="kategori" onchange="getSubkategori(this.value)">
								<option value="">-- Semua Kategori --</option>
								<option value="Tempat Bermain">Tempat Bermain</option>
								<option value="Tempat Makan">Tempat Makan</option>
								<option value="Wisata Alam">Wisata Alam</option>
								<option value="Hotel">Hotel</option>
								<option value="Tempat Sejarah">Tempat Sejarah</option>
								<option value="Oleh Oleh">Oleh-Oleh</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<select class="form-control mb-12" name="wilayah" onchange="getKecamatan(this.value)">
								<option value="">-- Semua Wilayah --</option>
								<?php while($res_wil = mysqli_fetch_assoc($wilayah)) { ?>
									<option value="<?php echo $res_wil['lokasi_kabkot'] ?>">
										<?php echo $res_wil['nama_lokasi'] ?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<select class="form-control mb-12" name="kecamatan" id="kecamatan">
								<option value="">-- Semua Kecamatan --</option>
							</select>
						</div>
					</div>

                	<h4>Subkategori</h4>
                	<div id="subkategori"></div>
                	<div class="form-group row">
						<div class="col-lg-12">
							<button class="btn btn-primary btn-block" type="submit">
								<i class="fa fa-search"></i> Cari Tempat
							</button>
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-9">
				<h4 style="margin: 0 0 30px 20px">Legend</h4>
				<style type="text/css">
					.logo-legend {
						margin-bottom: 10px
					}
				</style>
				<div class="row" style="margin-left: 10px">
					<div class="row" class="legend" style="text-align: center">
						<div class="col-md-2">
							<img src="assets/gis/markers/bermain.png" class="logo-legend">
							<p>Tempat Bermain</p>
						</div>
						<div class="col-md-2">
							<img src="assets/gis/markers/makan.png" class="logo-legend">
							<p>Tempat Makan</p>
						</div>
						<div class="col-md-2">
							<img src="assets/gis/markers/wisataalam.png" class="logo-legend">
							<p>Wisata Alam</p>
						</div>
						<div class="col-md-2">
							<img src="assets/gis/markers/hotel.png" class="logo-legend">
							<p>Hotel &amp; Penginapan</p>
						</div>
						<div class="col-md-2">
							<img src="assets/gis/markers/sejarah.png" class="logo-legend">
							<p>Tempat Sejarah</p>
						</div>
						<div class="col-md-2">
							<img src="assets/gis/markers/oleholeh.png" class="logo-legend">
							<p>Oleh Oleh</p>
						</div>
					</div>
				</div>

				<div class="divider"></div>

				<div class="row" style="margin-left: 10px">
					<table class="table table-responsive-lg table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Tempat</th>
								<th class="tblLat">Latitude</th>
								<th class="tblLong">Longitude</th>
								<th>Jenis</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="tableQueries">
							<tr><td colspan="6" align="center">Data Kosong :(</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("layout/footer.php") ?>