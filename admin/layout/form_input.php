<?php
	function txtNama($isi='') {
        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l0">Nama Tempat</label>
            <div class="col-md-9">
                <input class="form-control" name="nama" id="l0" value="'.$isi.'" type="text" autocomplete="off">
            </div>
        </div>';
    }

    function txtLati($isi='') {
        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l1">Latitude</label>
            <div class="col-md-9">
                <input class="form-control" name="lati" id="l1" value="'.$isi.'" type="text" autocomplete="off">
            </div>
        </div>
        ';
    }

    function txtLong($isi='') {
        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l2">Longitude</label>
            <div class="col-md-9">
                <input class="form-control" name="long" id="l2" value="'.$isi.'" type="text" autocomplete="off">
            </div>
        </div>
        ';
    }

    function txaAlamat($isi='') {
        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l3">Alamat</label>
            <div class="col-md-9">
                <textarea class="form-control" name="alamat" id="l3" rows="3">'.$isi.'</textarea>
            </div>
        </div>
        ';
    }

    function slcWilayah($data,$isi='') {
        $out = '';
        while($wil = mysqli_fetch_assoc($data)) {
            if($wil['lokasi_kabkot'] == $isi) { 
                $select = "selected"; 
            } else {
                $select = "";
            }

            $out .= '<option value="'.$wil['lokasi_kabkot'].'" '.$select.'>'.$wil['nama_lokasi'].'</option>';
        }

        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l4">Wilayah</label>
            <div class="col-md-9">
                <select class="form-control" name="wilayah" id="wilayah" onchange="chKecamatan(this.value)">
                    <option value="">-- Wilayah --</option>
                    '.$out.'
                </select>
            </div>
        </div>
        ';
    }

    function slcKecamatan($data,$isi='') {
        include("config/koneksi.php");
        $data = mysqli_query($con, $data);

        if($isi == '') {
            echo '<div class="form-group row" id="kecamatan"></div>';
        } else {
            $out = '';
            while($kec = mysqli_fetch_assoc($data)) {
                if($kec['lokasi_kecamatan'] == $isi) { 
                    $select = "selected"; 
                } else {
                    $select = "";
                }

                $out .= '<option value="'.$kec['lokasi_kecamatan'].'" '.$select.'>'.$kec['nama_lokasi'].'</option>';
            }

            echo '
            <div class="form-group row" id="kecamatan">
                <label class="col-md-3 col-form-label" for="l7">Kecamatan</label>
                <div class="col-md-9">
                    <select class="form-control" name="kecamatan" id="l7">
                        <option value="">-- Kecamatan --</option>
                        '.$out.'
                    </select>
                </div>
            </div>
            ';
        }
    }

    function sldJKPK($isi='') {
        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l5">Jarak ke Kota</label>
            <div class="col-md-9">
                <input type="text" name="jkk" id="l5" data-toggle="rangeslider" data-from="'.$isi.'" data-min="0" data-max="100" data-force-edges="true">
            </div>
        </div>
        ';
    }

    function txtJbuka($isi='') {
        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l6">Jam Buka</label>
            <div class="col-md-9">
                <input class="form-control" name="jamBuka" id="l6" type="time" value="'.$isi.'">
            </div>
        </div>
        ';
    }

    function txtJtutup($isi='') {
        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l7">Jam Tutup</label>
            <div class="col-md-9">
                <input class="form-control" name="jamTutup" id="l7" type="time" value="'.$isi.'">
            </div>
        </div>
        ';
    }

    function slcJenis($data,$isi='') {
        $out = '';
        $select = "";
        while($ress = mysqli_fetch_assoc($data)) {
            if($ress['id_jenis_tempat'] == $isi) { 
                $select = "selected"; 
            } else {
                $select = "";
            }

            $out .= '<option value="'.$ress['id_jenis_tempat'].'" '.$select.'>'.$ress['jenis'].'</option>';
        }

        echo '
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="l8">Jenis</label>
            <div class="col-md-9">
                <select class="form-control" name="jenis" id="l8">
                    '.$out.'
                </select>
            </div>
        </div>
        ';
    }

    function showMap() {
    	echo '
    	<div class="form-group row">
            <div id="map_bermain" style="width:100%; height: 250px"></div>
        </div>
    	';
    }
?>