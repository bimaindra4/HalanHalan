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
            <h4 class="page-title-heading mr-0 mr-r-5">Dashboard</h4>
        </div>
    </div>
    <div class="widget-list">
        <div class="row">
            <div class="col-md-4">
            </div>
        </div>
    </div>
</main>

<?php include("layout/footer.php"); ?>