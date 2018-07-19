<?php
	include("../config/koneksi.php");

	function chkJenis($data) {
		$out = '';

		while($res = mysqli_fetch_assoc($data)) {
			$kat = strtolower(str_replace(" ", "_", $res['kategori']));
			$out .= '
				<div class="checkbox">
					<label>
						<input type="checkbox" value="'.$res['jenis'].'" name="jenis[]"> 
						'.$res['jenis'].'
					</label>
				</div>
			';
		}

		echo '
		<div class="form-group row">
			<div class="col-lg-12">
				<label>Jenis</label>
				'.$out.'
			</div>
		</div>
		';
	}

	function tmeJamBuka() {
		echo '
		<div class="form-group row">
			<div class="col-lg-12">
				<label>Jam Buka</label>
				<div class="row" style="margin-left: 0px">
					<select name="pos_jam_buka" class="form-control col-md-3" style="margin-right: 10px">
						<option value="<"><</option>
						<option value=">">></option>
					</select>
					<input type="time" class="form-control col-md-8" name="jam_buka">
				</div>
			</div>
		</div>
		';
	}

	function tmeJamTutup() {
		echo '
		<div class="form-group row">
			<div class="col-lg-12">
				<label>Jam Tutup</label>
				<div class="row" style="margin-left: 0px">
					<select name="pos_jam_tutup" class="form-control col-md-3" style="margin-right: 10px">
						<option value="<"><</option>
						<option value=">">></option>
					</select>
					<input type="time" class="form-control col-md-8" name="jam_tutup">
				</div>
			</div>
		</div>
		';
	}

	function slcJKPK() {
		echo '
		<div class="form-group row">
			<div class="col-lg-12">
				<label>Jarak ke Pusat Kota</label>
				<select name="jkpk" class="form-control">
					<option value="all">-- Semua --</option>
					<option value="less_5">< 5 km</option>
					<option value="5_25">5 - 25 km</option>
					<option value="25_50">25 - 50 km</option>
					<option value="more_50">> 50 km</option>
				</select>
			</div>
		</div>
		';
	}
?>