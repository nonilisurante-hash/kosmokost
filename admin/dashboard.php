<?php
    require "../config.php";
    require "../cek_session.php";

    // Query untuk menghitung jumlah kamar
    $query_kamar = "SELECT COUNT(*) as total_kamar FROM kamar";
    $result_kamar = mysqli_query($conn, $query_kamar);
    $data_kamar = mysqli_fetch_assoc($result_kamar);
    $total_kamar = $data_kamar['total_kamar'];

    // Query untuk menghitung jumlah penghuni
    $query_penghuni = "SELECT COUNT(*) as total_penghuni FROM penghuni WHERE status = 'Penghuni'";
    $result_penghuni = mysqli_query($conn, $query_penghuni);
    $data_penghuni = mysqli_fetch_assoc($result_penghuni);
    $total_penghuni = $data_penghuni['total_penghuni'];

    // Query untuk menghitung jumlah admin
    $query_admin = "SELECT COUNT(*) as total_admin FROM user WHERE role = 'admin'";
    $result_admin = mysqli_query($conn, $query_admin);
    $data_admin = mysqli_fetch_assoc($result_admin);
    $total_admin = $data_admin['total_admin'];

    // Query untuk menghitung jumlah pembayaran lunas
    $query_lunas = "SELECT COUNT(*) as total_lunas FROM pembayaran WHERE keterangan = 'Lunas'";
    $result_lunas = mysqli_query($conn, $query_lunas);
    $data_lunas = mysqli_fetch_assoc($result_lunas);
    $total_lunas = $data_lunas['total_lunas'];

    // Query untuk menghitung jumlah pembayaran belum lunas
    $query_belum_lunas = "SELECT COUNT(*) as total_belum_lunas FROM pembayaran WHERE keterangan != 'Lunas'";
    $result_belum_lunas = mysqli_query($conn, $query_belum_lunas);
    $data_belum_lunas = mysqli_fetch_assoc($result_belum_lunas);
    $total_belum_lunas = $data_belum_lunas['total_belum_lunas'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - KosmoKost</title>

    <!-- font-awesome icons -->
    <link href="../css/font-awesome.css" rel="stylesheet" />

    <link href="../fontawesome/css/all.css" rel="stylesheet" />
    <!-- //font-awesome icons -->

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'layout/sidebar.php'; ?> 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kamar</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_kamar; ?></div>
                                    </div>
                                    <i class="fas fa-bed fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghuni</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_penghuni; ?></div>
                                    </div>
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admin</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_admin; ?></div>
                                    </div>
                                    <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pembayaran Lunas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_lunas; ?></div>
                                    </div>
                                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pembayaran Belum Lunas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_belum_lunas; ?></div>
                                    </div>
                                    <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'layout/footer.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
