<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
        <title>Blank Page</title>

        <!-- CSS -->
        
        <link href="assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
        <link href="assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
        <link href="assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
        <link href="assets/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
        <link href="assets/ajax/libs/ion-rangeslider/2.1.7/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css">
        <link href="assets/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

        <link href="../assets/gis/leaflet/dist/leaflet.css" rel="stylesheet"/>
        <link href="../assets/gis/pancontrol/L.Control.Pan.css" rel="stylesheet"/>

        <!-- Head Libs -->
        <script src="assets/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

        <style type="text/css">
            i.fa {
                width: 10px;
                margin-right: 20px;
            }
        </style>
    </head>

    <body class="sidebar-light sidebar-expand navbar-brand-light">
        <div id="wrapper" class="wrapper">
            <nav class="navbar">
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img class="logo-expand" alt="" src="assets/img/logo-collapse.png">
                        <img class="logo-collapse" alt="" src="assets/img/logo-collapse.png">
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="sidebar-toggle dropdown">
                        <a href="javascript:void(0)" class="ripple">
                            <i class="feather feather-menu list-icon fs-20"></i>
                        </a>
                    </li>
                </ul>
                <div class="spacer"></div>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple" data-toggle="dropdown">
                            <span class="avatar thumb-xs2">
                                <img src="assets/demo/users/user1.jpg" class="rounded-circle" alt="">
                                <i class="feather feather-chevron-down list-icon"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                            <div class="card">
                                <ul class="list-unstyled card-body">
                                    <li>
                                        <a href="logout.php">
                                            <span>
                                                <span class="align-middle">Sign Out</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="content-wrapper">
                <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
                    <div class="side-user d-none">
                        <div class="col-sm-12 text-center p-0 clearfix">
                            <div class="d-inline-block pos-relative mr-b-10">
                                <figure class="thumb-sm mr-b-0 user--online">
                                    <img src="assets/demo/users/user1.jpg" class="rounded-circle" alt="">
                                </figure>
                                <a href="page-profile.html" class="text-muted side-user-link">
                                    <i class="feather feather-settings list-icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <nav class="sidebar-nav">
                        <ul class="nav in side-menu">
                            <li class="current-page">
                                <a href="index.php">
                                    <i class="fa fa-home"></i> 
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-map-marker"></i> 
                                    <span class="hide-menu">Data Spasial</span>
                                </a>
                                <ul class="list-unstyled sub-menu">
                                    <li><a href="data_spatial.php?kat=main">Tempat Bermain</a></li>
                                    <li><a href="data_spatial.php?kat=makan">Tempat Makan</a></li>
                                    <li><a href="data_spatial.php?kat=wisalam">Wisata Alam</a></li>
                                    <li><a href="data_spatial.php?kat=hotel">Hotel</a></li>
                                    <li><a href="data_spatial.php?kat=sejarah">Tempat Bersejarah</a></li>
                                    <li><a href="data_spatial.php?kat=oleh2">Oleh-Oleh</a></li>
                                </ul>
                            </li>
                            <li class="current-page">
                                <a href="jenis_kategori.php">
                                    <i class="fa fa-list"></i> 
                                    <span class="hide-menu">Jenis Kategori</span>
                                </a>
                            </li>
                            <li class="current-page">
                                <a href="import_data.php">
                                    <i class="fa fa-file-o"></i> 
                                    <span class="hide-menu">Import Data</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>