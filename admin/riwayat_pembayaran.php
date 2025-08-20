<?php
require "../config.php";
require "../cek_session.php";

$query = "SELECT * FROM penghuni INNER JOIN pembayaran ON penghuni.id_penghuni = pembayaran.id_penghuni";
$catat = query($query);

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

        <!-- SIDEBAR -->
        <?php include 'layout/sidebar.php'; ?>
        <!-- AKHIR SIDEBAR -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h3>Aplikasi KosmoKost - Riwayat Pembayaran</h3>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <a href="daftar_penghuni.php" class="btn btn-secondary mb-4">Pembayaran</a>

                    <!-- Page Heading -->
                    <div class="mb-4 text-gray-800">
                        <!-- <?= var_dump($catat); ?> -->
                        <div class="card">                           
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No. Kamar</th>
                                            <th>Bulan</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Bayar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($catat as $c) { ?>
                                        <tr>
                                            <td>
                                                <?= $c["nama"]; ?>
                                            </td>
                                            <td>
                                                <?= $c["no_kamar"]; ?>
                                            </td>
                                            <td>
                                                <?= $c["bulan"]; ?>
                                            </td>
                                            <td>
                                                <?= date('d-m-Y', strtotime($c["tanggal_bayar"])); ?>
                                            </td>
                                            <td>
                                                <?= $c["bayar"]; ?>
                                            </td>
                                            <td>
                                                <?= $c["keterangan"]; ?>
                                            </td>
                                            <td>
                                                <a href="form_update_pembayaran.php?id_pembayaran=<?= $c["id_pembayaran"]; ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="hapus_pembayaran.php?id_pembayaran=<?= $c["id_pembayaran"];?>" class="btn btn-danger alert_notif"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
             
            <?php include 'layout/footer.php'; ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>`

     <!-- Page level plugins -->
     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

    <script>
            $('.alert_notif').on('click',function(){
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin Ingin Hapus Data?",            
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"
                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    }
                })
                return false;
            });

            $('.logout_alert_notif').on('click',function(){
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin Ingin Keluar?",            
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"
                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    }
                })
                return false;
            });
    </script>

</body>

</html>