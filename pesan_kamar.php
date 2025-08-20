<?php
include 'config.php';

$no_kamar = isset($_GET['no_kamar']) ? $_GET['no_kamar'] : null;

// Cek kamar valid
if (!$no_kamar) {
    echo "<script>alert('Nomor kamar tidak valid!'); window.location = 'kamar.php';</script>";
    exit;
}

$query_kamar = mysqli_query($conn, "SELECT * FROM kamar WHERE no_kamar = '$no_kamar'");
$kamar = mysqli_fetch_assoc($query_kamar);

if (!$kamar || $kamar['status'] !== 'Kosong') {
    echo "<script>alert('Kamar tidak tersedia!'); window.location = 'kamar.php';</script>";
    exit;
}

// Proses jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_ktp = $_POST['no_ktp'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $tgl_masuk = date("Y-m-d"); // otomatis tanggal hari ini
    $status_penghuni = 'Penghuni';

    $username = $_POST['username'];
    $password = $_POST['password']; // Menggunakan password tanpa hashing

    // Simpan ke tabel penghuni
    $query_penghuni = "INSERT INTO penghuni (no_kamar, no_ktp, nama, no_hp, tgl_masuk, status)
                       VALUES ('$no_kamar', '$no_ktp', '$nama', '$no_hp', '$tgl_masuk', '$status_penghuni')";
    $hasil_penghuni = mysqli_query($conn, $query_penghuni);
    $id_penghuni = mysqli_insert_id($conn);

    if ($hasil_penghuni) {
        // Simpan ke tabel user tanpa hash password
        $query_user = "INSERT INTO user (username, password, id_penghuni, role)
        VALUES ('$username', '$password', '$id_penghuni', 'penghuni')";
        $hasil_user = mysqli_query($conn, $query_user);

        // Update status kamar
        mysqli_query($conn, "UPDATE kamar SET status = 'Berpenghuni' WHERE no_kamar = '$no_kamar'");

        echo "<script>alert('Pemesanan berhasil!'); window.location = 'kamar.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan data!');</script>";
    }
}
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
        <div style="min-height: auto;" class="wrapper">

            <!-- HEADER -->
            <div class="header">

                    <!-- Header Nav & Brand -->
                    <?php 
                        if (!isset($_SESSION["username"]) || !isset($_SESSION["id_user"])) {
                            include 'layout/header.php'; // Untuk header tanpa login
                        } else {
                            include 'layout/header_user.php'; // Untuk header setelah login
                        }
                    ?>
                    <!-- AKHIR Header Nav -->

            </div>
            <!-- AKHIR HEADER -->

            <!-- CONTENT -->
            <div class="container mt-5 mb-5" style="background-color: #f8f9fa; border-radius: 10px; padding: 20px;">

                <h3 class="mb-4">Form Pemesanan Kamar No. <?= $no_kamar; ?></h3>

                <form method="POST">
                
                    <h5 class="mt-4">Buat Akun Pengguna</h5>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label>No. KTP</label>
                        <input type="text" name="no_ktp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>No. HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>


                    <a href="kamar.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan & Pesan</button>
                </form>
                <!-- AKHIR CONTENT -->
            


            </div>

            <!-- FOOTER -->
            <div class="footer">
                    
                <?php include 'layout/footer.php'; ?>
                    
            </div>
            <!-- AKHIR FOOTER -->

        </div>

    

  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</html>