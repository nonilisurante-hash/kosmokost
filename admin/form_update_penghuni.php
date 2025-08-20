<?php 

    include '../config.php';
    include '../cek_session.php';

    $id_penghuni = $_GET['id_penghuni'];

    $query = "SELECT * FROM penghuni WHERE id_penghuni = $id_penghuni";
    $query2 = "SELECT * FROM kamar";
    $hasil = query($query);
    $catat = query($query2);

    $query_user = "SELECT * FROM user WHERE id_penghuni = $id_penghuni";
    $user = query($query_user);

    $username = isset($user[0]['username']) ? $user[0]['username'] : '';
    $password = isset($user[0]['password']) ? $user[0]['password'] : '';

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
                <h3>Aplikasi KosmoKost - Update Data Penghuni</h3>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-4 text-gray-800">
                        <div class="card">
                            <div class="card-header">
                                <a href="daftar_penghuni.php" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>

                            <div class="card-body">
                                <form action="update_penghuni.php" method="POST">
                                    <input type="hidden" name="id_penghuni" value="<?=$hasil[0]['id_penghuni'] ?>">
                                    <div class="form-group">
                                        <label>No. Kamar</label>
                                        <select name="no_kamar" class="form-control" >
                                            <option value="<?= $hasil[0]['no_kamar']; ?>"><?= $hasil[0]['no_kamar']; ?></option>
                                            <?php foreach($catat as $kamar): ?>
                                                <?php if($kamar['status']=='Kosong'): ?>
                                                    <option value="<?= $kamar['no_kamar']; ?>"><?= $kamar['no_kamar']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No. KTP</label>
                                        <input type="number" name="no_ktp" placeholder="No. KTP" class="form-control" value="<?= $hasil[0]['no_ktp'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?= $hasil[0]['nama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="number" name="no_hp" placeholder="No. HP" class="form-control" value="<?= $hasil[0]['no_hp'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Registrasi</label>
                                        <input type="date" name="tgl_masuk" placeholder="Tanggal Masuk" class="form-control" value="<?= $hasil[0]['tgl_masuk'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="<?= $hasil[0]['status']; ?>" selected><?= $hasil[0]['status']; ?></option>
                                                <?php if($hasil[0]['status']=='Penghuni') :?>
                                                    <option value="Bukan Penghuni">Bukan Penghuni</option>
                                                <?php else :?>
                                                    <option value="Penghuni">Penghuni</option>
                                                <?php endif ;?>
                                        </select>
                                    </div>
                                    
                                    <hr>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" placeholder="Username" class="form-control" value="<?= $username ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" placeholder="Password" class="form-control" value="<?= $password ?>" required>
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