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
        <div class="container mt-5 mb-5" style="background-color: #f8f9fa; border-radius: 10px; padding: 20px;">
            <h3 class="border-bottom pb-3">Edit Profil Penghuni</h3>
            <div class="card">
                <div class="card-body">
                    <!-- Form Data Diri -->
                    <form action="proses_update_profil.php" method="POST">
                        <!-- ID Penghuni (Hidden) -->
                        <input type="hidden" name="id_penghuni" value="<?= $penghuni['id_penghuni']; ?>">

                        <!-- Nomor Kamar -->
                        <div class="mb-3">
                            <label for="no_kamar" class="form-label">Nomor Kamar</label>
                            <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="<?= $penghuni['no_kamar']; ?>" readonly>
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $penghuni['nama']; ?>" required>
                        </div>

                        <!-- Nomor KTP -->
                        <div class="mb-3">
                            <label for="no_ktp" class="form-label">Nomor KTP</label>
                            <input type="number" class="form-control" id="no_ktp" name="no_ktp" value="<?= $penghuni['no_ktp']; ?>" required>
                        </div>

                        <!-- Nomor HP -->
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $penghuni['no_hp']; ?>" required>
                        </div>

                        <!-- Tanggal Masuk -->
                        <div class="mb-3">
                            <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= $penghuni['tgl_masuk']; ?>" readonly>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="<?= $penghuni['status']; ?>" readonly>
                        </div>

                        <p class="border-bottom pb-3"></p>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $penghuni['username']; ?>" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $penghuni['password']; ?>" required>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                        </div>
                    </form>
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
