<?php 
	include("layout/header.php");
	include("config/koneksi.php");

	$id = $_GET['id'];
	$kat = $_GET['kat'];
	if($kat == "tempat_makan") {
		$query = mysqli_query($con,"SELECT a.nama_tempat, j.jenis AS nmjenis, d.* 
									FROM detail_tempat_makan d 
									JOIN tempat_makan a ON a.id_tempat = d.id_tempat
									JOIN jenis_tempat j ON a.jenis = j.id_jenis_tempat
									WHERE d.id_dtmakan='$id'");
	} else {
		$query = mysqli_query($con,"SELECT a.*, b.jenis AS nmjenis 
								 FROM $kat a 
								 JOIN jenis_tempat b ON a.jenis = b.id_jenis_tempat
								 WHERE a.id_tempat='$id'");
	}
	
	$res = mysqli_fetch_assoc($query);

	function showData($title,$data) {
		$out = '
		<div class="row">
			<div class="col-lg-4">
				<b>'.$title.'</b>
			</div>
			<div class="col-lg-8">
				<p>'.$data.'</p>
			</div>
		</div>
		';

		return $out;
	}

	function showFoto($data) {
		$urlFoto = 'assets/gis/foto_tempat/';
		$out = '
		<div class="col-lg-4 isotope-item">
			<div class="image-gallery-item">
				<a href="'.$urlFoto.$data.'" class="lightbox-portfolio">
					<span class="thumb-info">
						<span class="thumb-info-wrapper">
							<img src="'.$urlFoto.$data.'" class="img-fluid" alt="">
							<span class="thumb-info-action">
								<span class="thumb-info-action-icon"><i class="fas fa-search"></i></span>
							</span>
						</span>
					</span>
				</a>
			</div>
		</div>
		';

		return $out;
	}
?>

<div role="main" class="main">
	<section class="page-header page-header-custom-background" style="background-image: url(assets/frontend/img/custom-header-bg.jpg);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<h1><?php echo $res['nama_tempat'] ?></h1>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="col">
	                <div style="width: 100%; height: 400px">
	                	<input type="hidden" id="latmap" value="<?php echo $res['latitude'] ?>">
	                	<input type="hidden" id="lngmap" value="<?php echo $res['longitude'] ?>">
	                    <div id="map_detail" style="width: 100%; height: 400px"></div>
	                </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="accordion accordion-primary" id="accordion2Primary">
					<div class="card card-default">
						<div class="card-header">
							<h4 class="card-title m-0">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Primary" href="#collapse2PrimaryOne">
									<i class="fas fa-list"></i> Detail Tempat
								</a>
							</h4>
						</div>
						<div id="collapse2PrimaryOne" class="collapse show">
							<div class="card-body">
								<?php 
									if($kat == "wisata_alam" || $kat == "hotel_penginapan") {
										$showJamop = "";
									} else {
										if($res['jam_buka'] == NULL || $res['jam_tutup'] == NULL) {
											$jamop = "-";
										} else {
											$jamop = $res['jam_buka']." s/d ".$res['jam_tutup'];	
										}

										$showJamop = showData("Jam Operasional", $jamop);
									}

									echo 
										showData("Nama Tempat", $res['nama_tempat']).
										showData("Alamat", $res['alamat']).
										showData("Latitude", $res['latitude']).
										showData("Longitude", $res['longitude']).
										showData("Jarak ke Pusat Kota", $res['jarak_ke_kota']." KM").
										$showJamop.
										showData("Jenis", $res['nmjenis']);
								?>
							</div>
						</div>
					</div>
					<!--
					<div class="card card-default">
						<div class="card-header">
							<h4 class="card-title m-0">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Primary" href="#collapse2PrimaryTwo">
									<i class="fas fa-book"></i> Deskripsi
								</a>
							</h4>
						</div>
						<div id="collapse2PrimaryTwo" class="collapse">
							<div class="card-body">

							</div>
						</div>
					</div>
					-->
				</div>
				<div class="row image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
					<div class="col-lg-12">
						<h5 class="text-uppercase mt-4">Foto Tempat</h5>
					</div>
					<?php 
						if($res['foto_tempat1'] != NULL) {
							echo showFoto($res['foto_tempat1']);
						} 
						
						if($res['foto_tempat2'] != NULL) {
							echo showFoto($res['foto_tempat2']);
						} 

						if($res['foto_tempat3'] != NULL) {
							echo showFoto($res['foto_tempat3']);
						}

						if($res['foto_tempat1'] == NULL && $res['foto_tempat2'] == NULL && $res['foto_tempat3'] == NULL) {
							echo '
							<div class="col-lg-12">
								<p>Foto Tempat Kosong</p>
							</div>
							';
						}
					?>
				</div>
			</div>
		</div>
	</div>

<?php include("layout/footer.php") ?>