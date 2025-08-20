<?php 

include '../config.php';
include '../cek_session.php';

        // Ambil data dari form
        $no_kamar = $_POST['no_kamar'];
        $no_ktp = $_POST['no_ktp'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $tgl_masuk = $_POST['tgl_masuk'];
        $status = $_POST['status']; // status penghuni: 'Penghuni' atau 'Bukan Penghuni'
        $username = $_POST['username'];
        $password = $_POST['password']; // Sesuai permintaan, tidak di-hash

        // 1. Insert data penghuni ke tabel penghuni
        $query_penghuni = "INSERT INTO penghuni (no_kamar, no_ktp, nama, no_hp, tgl_masuk, status) 
                        VALUES ('$no_kamar', '$no_ktp', '$nama', '$no_hp', '$tgl_masuk', '$status')";
        $result_penghuni = mysqli_query($conn, $query_penghuni);

        if ($result_penghuni) {
            // Ambil id_penghuni terakhir
            $id_penghuni = mysqli_insert_id($conn);

            // 2. Update status kamar menjadi 'Berpenghuni'
            $query_update_kamar = "UPDATE kamar SET status = 'Berpenghuni' WHERE no_kamar = '$no_kamar'";
            mysqli_query($conn, $query_update_kamar);

            // 3. Insert ke tabel user
            $query_user = "INSERT INTO user (username, password, id_penghuni, role) 
                        VALUES ('$username', '$password', '$id_penghuni', 'penghuni')";
            $result_user = mysqli_query($conn, $query_user);

            if ($result_user) {
                echo "<script>alert('Penghuni berhasil ditambahkan!'); window.location='daftar_penghuni.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan akun pengguna.'); window.location='tambah_penghuni.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal menambahkan data penghuni.'); window.location='tambah_penghuni.php';</script>";
        }

?>
