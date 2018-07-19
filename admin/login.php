<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.html">
    <title>Login</title>

    <!-- CSS -->
    <link href="assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="assets/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- Head Libs -->
    <script src="../../cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page">
    <div id="wrapper" class="row wrapper">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">
            <div class="login-center">
                <div class="navbar-header text-center mt-2 mb-4">
                    <a href="../"><h3>Harap Login Dahulu</h3></a>
                </div>
                <form method="post" action="config/login.php">
                    <div class="form-group">
                        <label for="example-email">Username</label>
                        <input type="text" class="form-control form-control-line" name="username" id="example-email">
                    </div>
                    <div class="form-group">
                        <label for="example-password">Password</label>
                        <input type="password" id="example-password" name="password" class="form-control form-control-line">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-lg btn-primary text-uppercase fs-12 fw-600" type="submit">Login</button>
                    </div>
                </form>
                <hr>
                <footer class="col-sm-12 text-center">
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/material-design.js"></script>
</body>
</html>