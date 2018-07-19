<?php 
	include("config/koneksi.php");
	include("layout/header.php");
	include("layout/filter_queries.php");

	$wilayah = mysqli_query($con, "SELECT * FROM wilayah");

	// FILTER KATEGORI
		$kat = filterKategori($_POST['kategori']);
		
	if($kat == NULL || $kat == "") {
		echo '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-secondary" style="margin: 0 20px 20px 20px">
					<strong>Kategori harus diisi</strong>
				</div>
			</div>
		</div>
		';
	} else {
		// FILTER WILAYAH
			$wil = fltWilayah($kat,$_POST['wilayah'],$_POST['kecamatan']);
			$wil_clause = $wil[0];
			$kec_clause = $wil[1];

		// FILTER WAKTU
			$jb = ""; $jt = ""; $pjb = ""; $pjt = "";

			if($kat == "tempat_makan" || $kat == "tempat_bermain" || $kat == "tempat_sejarah" || $kat == "oleh_oleh") {
				$jb = $_POST['jam_buka'];
				$jt = $_POST['jam_tutup'];
				$pjb = $_POST['pos_jam_buka'];
				$pjt = $_POST['pos_jam_tutup'];
			}

			$waktu = fltWaktu($kat,$jb,$jt,$pjb,$pjt);
			$wkt_bk_clause = $waktu[0];
			$wkt_tp_clause = $waktu[1];


		// FILTER JARAK
			$jrk_clause = fltJarak($kat,$_POST['jkpk']);
				

		// FILTER JENIS KATEGORI
			if(isset($_POST['jenis'])) {
				$jenis = $_POST['jenis'];
				$isi_jenis = '';

				for($i=0; $i<count($jenis); $i++) { 
					$que_jen = mysqli_query($con, "SELECT id_jenis_tempat FROM jenis_tempat WHERE jenis='$jenis[$i]'");
					$res_jen = mysqli_fetch_assoc($que_jen);

					$isi_jenis .= '"'.$res_jen['id_jenis_tempat'].'",';
				}

				$isi_jenis = rtrim($isi_jenis,",");
				$jen_clause = "AND aa.jenis IN(".$isi_jenis.")";
			} else {
				$jen_clause = "";	
			}

		// QUERY
		if($kat == "tempat_makan") {
			if($jen_clause == "") {
				$jen_clause = "AND aa.jenis = ANY(SELECT jenis FROM tempat_makan)";	
			}
			
			$det = "detail_".$kat;
			$q = "SELECT aa.*, jn.jenis AS jenisnya, dtl.id_dtmakan AS id_tempat, dtl.latitude, dtl.longitude, dtl.alamat, dtl.foto_tempat1 FROM $kat aa
				  JOIN jenis_tempat jn ON aa.jenis = jn.id_jenis_tempat
				  JOIN $det dtl ON aa.id_tempat = dtl.id_tempat
				  WHERE $wil_clause AND $kec_clause $wkt_bk_clause $wkt_tp_clause $jrk_clause $jen_clause";

			$query = mysqli_query($con,$q);
		} else {
			$q = "SELECT aa.*, jn.jenis AS jenisnya FROM $kat aa
				  JOIN jenis_tempat jn ON aa.jenis = jn.id_jenis_tempat
				  WHERE $wil_clause AND $kec_clause $wkt_bk_clause $wkt_tp_clause $jrk_clause $jen_clause";

			$query = mysqli_query($con,$q);
		}

		$num = mysqli_num_rows($query);
		$parseJs = parseJs($kat,$q);
	}
?>

<div role="main" class="main">
	<section class="page-header page-header-custom-background" style="background-image: url(assets/frontend/img/custom-header-bg.jpg);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<h1>Filter Map</h1>
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
								<?php 
									if($kat != "tempat_makan") {
										$colspan = 6;
										echo '
											<th>No</th>
											<th>Nama Tempat</th>
											<th class="tblLat">Latitude</th>
											<th class="tblLong">Longitude</th>
											<th>Jenis</th>
											<th></th>
										';
									} else {
										$colspan = 5;
										echo '
											<th>No</th>
											<th>Nama Tempat</th>
											<th width="300">Alamat</th>
											<th>Jenis</th>
											<th></th>
										';
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no = 1;
								if($num == 0) {
									echo '<tr><td colspan="'.$colspan.'" align="center">Data Kosong :(</td></tr>';
								} else {
									if($kat != "tempat_makan") {
										while($res = mysqli_fetch_assoc($query)) {
											echo '
											<tr>
												<td>'.$no.'</td>
												<td>'.$res['nama_tempat'].'</td>
												<td>'.$res['latitude'].'</td>
												<td>'.$res['longitude'].'</td>
												<td>'.$res['jenisnya'].'</td>
												<td>
													<a href="detail_tempat.php?id='.$res['id_tempat'].'&kat='.$kat.'" class="btn btn-info btn-sm">Detail</a>
												</td>
											</tr>
											';

											$no++;
										}
									} else {
										while($res = mysqli_fetch_assoc($query)) {
											echo '
											<tr>
												<td>'.$no.'</td>
												<td>'.$res['nama_tempat'].'</td>
												<td>'.$res['alamat'].'</td>
												<td>'.$res['jenisnya'].'</td>
												<td>
													<a href="detail_tempat.php?id='.$res['id_tempat'].'&kat='.$kat.'" class="btn btn-info btn-sm">Detail</a>
												</td>
											</tr>
											';

											$no++;
										}
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("layout/footer.php") ?>