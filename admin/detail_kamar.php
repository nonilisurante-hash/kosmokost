<?php 

    include '../config.php';
    include '../cek_session.php';

    $no_kamar = $_GET['no_kamar'];

    $query = "SELECT * FROM kamar WHERE no_kamar = $no_kamar";
    $hasil = query($query);

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
                <h3>Aplikasi KosmoKost - Detail Data Kamar</h3>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-4 text-gray-800">
                        <div class="card">
                            <div class="card-header">
                                <a href="daftar_kamar.php" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>

                            <div class="card-body">
                                <form action="update_kamar.php" method="POST">
                                    <div class="form-group">
                                        <label>No. Kamar</label>
                                        <input type="text" name="no_kamar" placeholder="No. Kamar" class="form-control" value="<?= $hasil[0]['no_kamar'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Kamar</label> <br>
                                        <img src="../img/<?= $hasil[0]['gambar'] ?>" alt="Gambar Kamar" style="width: 500px; height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Kamar</label>
                                        <input type="number" name="harga" placeholder="Harga Kamar" class="form-control" value="<?= $hasil[0]['harga'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Kamar</label>
                                        <textarea name="deskripsi" cols="30" rows="5" class="form-control" readonly><?= $hasil[0]['deskripsi'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Kamar</label>
                                        <select name="status" class="form-control" readonly>
                                            <option value="<?= $hasil[0]['status']; ?>"><?= $hasil[0]['status']; ?></option>
                                        </select>
                                    </div>
                                </form>
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
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
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