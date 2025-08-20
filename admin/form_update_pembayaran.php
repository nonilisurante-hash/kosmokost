<?php 

    include '../config.php';
    include '../cek_session.php';

    $id_pembayaran = $_GET['id_pembayaran'];

    $query = "SELECT * FROM pembayaran INNER JOIN penghuni ON pembayaran.id_penghuni = penghuni.id_penghuni WHERE id_pembayaran = $id_pembayaran";
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
                <h3>Aplikasi KosmoKost - Update Pembayaran Kamar</h3>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-4 text-gray-800">
                        <!-- <?= var_dump($hasil); ?> -->
                        <div class="card">
                            <div class="card-header">
                                <a href="riwayat_pembayaran.php" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>

                            <div class="card-body">
                                <form action="update_pembayaran.php" method="POST">
                                        <input type="text" name="id_pembayaran" value="<?= $hasil[0]['id_pembayaran']; ?>" hidden>
                                <div class="form-group">
                                        <label>Nama</label>
                                        <select name="id_penghuni" class="form-control" readonly required>
                                            <option value="<?= $hasil[0]['id_penghuni']; ?>"> <?= $hasil[0]['nama']; ?> </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No. Kamar</label>
                                        <input type="text" name="no_kamar" placeholder="No. Kamar" class="form-control" value="<?= $hasil[0]['no_kamar'] ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control" required>
                                            <option value="<?= $hasil[0]['bulan']; ?>" selected><?= $hasil[0]['bulan']; ?></option>
                                            <option value="januari">Januari</option>
                                            <option value="februari">Februari</option>
                                            <option value="maret">Maret</option>
                                            <option value="april">April</option>
                                            <option value="mei">Mei</option>
                                            <option value="juni">Juni</option>
                                            <option value="juli">Juli</option>
                                            <option value="agustus">Agustus</option>
                                            <option value="september">September</option>
                                            <option value="oktober">Oktober</option>
                                            <option value="november">November</option>
                                            <option value="desember">Desember</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Bayar</label>
                                        <input type="datetime-local" name="tanggal_bayar" placeholder="Tanggal Bayar" class="form-control" required value="<?= $hasil[0]['tanggal_bayar'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Bayar</label>
                                        <input type="number" name="bayar" placeholder="Bayar" class="form-control" required value="<?= $hasil[0]['bayar']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <select name="keterangan" class="form-control" required>
                                            <option value="<?= $hasil[0]['keterangan']; ?>" selected><?= $hasil[0]['keterangan']; ?></option>
                                                <?php if($hasil[0]['keterangan']=='Lunas') :?>
                                                    <option value="Belum Lunas">Belum Lunas</option>
                                                <?php else :?>
                                                    <option value="Lunas">Lunas</option>
                                                <?php endif ;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary"><i class="fa fa-save"> Simpan</i></button>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</i></button>
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