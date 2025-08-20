<?php
    require "../config.php";
    require "../cek_session.php";

    $query = "SELECT * FROM penghuni WHERE status='Penghuni'";
    $hasil = query("$query");

    // var_dump($hasil);
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

    <!-- <link href="../fontawesome/css/all.css" rel="stylesheet" /> -->
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
                <h3>Aplikasi KosmoKost - Administrator</h3>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-4 text-gray-800">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="text-align: center;">Administrator Penghuni</h2>
                            </div>

                            <div class="card-body">
                                <form action="simpan_administrator.php" method="POST">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" placeholder="Username" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" placeholder="Password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <select name="id_penghuni" class="form-control" required>
                                            <?php foreach($hasil as $nama): ?>
                                            <option value="<?= $nama['id_penghuni']; ?>"> <?= $nama['nama']; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <input type="text" name="role" placeholder="Password" class="form-control" value="penghuni" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="administrator.php" type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</i></a>
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

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

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