<?php
    session_start();
    if(empty($_SESSION['user'])) {
        header("location:login.php");
    }
    
	include("config/koneksi.php");
	include("layout/header.php");

    $data = mysqli_query($con,"SELECT * FROM jenis_tempat");
    $num = mysqli_num_rows($data);
?>

<main class="main-wrapper clearfix">
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <div class="col-md-12">
                <h4 class="page-title-heading mr-0 mr-r-5">Jenis Kategori</h4>
            </div>
        </div>
    </div>
    <div class="widget-list">
        <div class="row">
            <div class="col-md-6 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h6 class="page-title-heading mr-0 mr-r-5" style="margin-bottom: 30px !important">Tambah Data</h6>
                        <form method="post" action="config/tambahJenis.php">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="l0">Nama Jenis</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="nama" id="l0" type="text" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="l0">Kategori</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="kategori">
                                        <option value="Tempat Bermain">Tempat Bermain</option>
                                        <option value="Tempat Makan">Tempat Makan</option>
                                        <option value="Wisata Alam">Wisata Alam</option>
                                        <option value="Hotel">Hotel</option>
                                        <option value="Tempat Sejarah">Tempat Sejarah</option>
                                        <option value="Oleh Oleh">Oleh Oleh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions btn-list">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h6 class="page-title-heading mr-0 mr-r-5" style="margin-bottom: 20px !important">Jenis Kategori</h6>
                        <table class="table" data-toggle="datatables" data-plugin-options='{"searching": false}'>
                            <thead>
                                <tr class="thead-inverse bg-primary">
                                    <th>ID</th>
                                    <th>Jenis</th>
                                    <th>Kategori</th>
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
                                            <td><?php echo $res['jenis'] ?></td>
                                            <td><?php echo $res['kategori'] ?></td>
                                            <td>
                                                <a href="config/hapusJenis.php?id=<?php echo $res['id_jenis_tempat'] ?>" class="btn btn-xs btn-danger">Hapus</a>
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

<?php include("layout/footer.php"); ?>