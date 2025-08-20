<?php
    require "config.php";
    require "cek_session.php";

    // Ambil ID Penghuni dari sesi
    $id_penghuni = $_SESSION['id_penghuni'];

    // Ambil data penghuni dari database
    // $query = "SELECT * FROM penghuni WHERE id_penghuni = '$id_penghuni'";
    // $penghuni = query($query)[0]; // Asumsikan fungsi query sudah didefinisikan

    $query = "SELECT penghuni.*, user.username, user.password 
          FROM penghuni 
          INNER JOIN user ON penghuni.id_penghuni = user.id_penghuni 
          WHERE penghuni.id_penghuni = '$id_penghuni'";

    $penghuni = query($query)[0];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KosmoKost</title>

    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="fontawesome/css/all.css" rel="stylesheet" />
    <!-- //font-awesome icons -->

     <!-- Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- // Footer -->

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">

        <!-- HEADER -->
        <div class="header">
            <!-- Header Nav & Brand -->
            <?php include 'layout/header_user.php'; ?>
            <!-- AKHIR Header Nav -->
        </div>
        <!-- AKHIR HEADER -->

        <!-- CONTENT -->
        <div class="container mt-5 mb-5" style="max-width: 600px;">
            <h3 class="border-bottom pb-3">Profil Penghuni</h3>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <!-- Profile Picture -->
                        <div class="me-3">
                            <i class="fa-regular fa-user fa-3x rounded-circle" style="background-color: #f8f9fa; padding: 20px; border: 2px solid #ddd;"></i>
                            <!-- <img src="https://via.placeholder.com/80" alt="Profile Picture" class="rounded-circle" style="width: 80px; height: 80px;"> -->
                        </div>
                        <!-- Informasi Profil -->
                        <div>
                            <h5 class="mb-1"><?= $penghuni['nama']; ?></h5>
                            <p class="text-muted mb-0">Hai, lihat profil mu</p>
                        </div>
                    </div>
                    <!-- Informasi Profil -->
                    <div class="mb-3">
                        <label class="fw-bold">Nomor Kamar</label>
                        <p><?= $penghuni['no_kamar']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Nama</label>
                        <p><?= $penghuni['nama']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Nomor KTP</label>
                        <p><?= $penghuni['no_ktp']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Nomor HP</label>
                        <p><?= $penghuni['no_hp']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Tanggal Masuk</label>
                        <p><?= date("d F Y", strtotime($penghuni['tgl_masuk'])); ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Status</label>
                        <p><?= $penghuni['status']; ?></p>
                    </div>
                    <p class="border-bottom pb-3"></p>
                    <div class="mb-3">
                        <label class="fw-bold">Username</label>
                        <p><?= $penghuni['username']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Password</label>
                        <p><?= $penghuni['password']; ?></p>
                    </div>

                    <!-- Tombol Edit -->
                    <div class="text-end">
                        <a href="edit_profil.php" class="btn btn-info">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- AKHIR CONTENT -->

        <!-- FOOTER -->
        <div class="footer">
            <?php include 'layout/footer.php'; ?>
        </div>
        <!-- AKHIR FOOTER -->

    </div>

    <script>
        document.getElementById("filterStatus").addEventListener("change", function () {
            const status = this.value.toLowerCase(); // Ambil nilai dari dropdown
            const rows = document.querySelectorAll("tbody tr"); // Ambil semua baris tabel

            rows.forEach(row => {
                const rowStatus = row.querySelector("td:nth-child(6)").textContent.toLowerCase();
                if (status === "all" || rowStatus.includes(status)) {
                    row.style.display = "table-row"; // Tampilkan baris yang sesuai
                } else {
                    row.style.display = "none"; // Sembunyikan baris yang tidak sesuai
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
