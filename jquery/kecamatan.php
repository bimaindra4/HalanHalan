<?php 
	include("../config/koneksi.php");

	$id = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM kecamatan WHERE lokasi_kabkot='$id'");
?>

<option value="">-- Semua Kecamatan --</option>
<?php while($res = mysqli_fetch_assoc($query)) { ?> 
	<option value="<?php echo $res['lokasi_kecamatan'] ?>">
		<?php echo $res['nama_lokasi'] ?>
	</option>
<?php } ?>