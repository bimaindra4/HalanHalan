<?php 
	include("../config/koneksi.php");

	$id = $_GET['id'];
	$query = mysqli_query($con, "SELECT * FROM kecamatan WHERE lokasi_kabkot='$id'");
?>

<label class="col-md-3 col-form-label" for="l7">Kecamatan</label>
<div class="col-md-9">
    <select class="form-control" name="kecamatan" id="l7">
		<option value="">-- Kecamatan --</option>
		<?php while($res = mysqli_fetch_assoc($query)) { ?> 
		<option value="<?php echo $res['lokasi_kecamatan'] ?>"><?php echo $res['nama_lokasi'] ?></option>
		<?php } ?>
	</select>
</div>