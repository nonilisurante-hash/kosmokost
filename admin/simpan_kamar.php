<?php 

include '../config.php';
include '../cek_session.php';

$no_kamar = $_POST['no_kamar'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_POST['gambar'];

$tambah_kamar = mysqli_query($conn, "INSERT INTO kamar(no_kamar, harga, deskripsi, gambar) VALUES('$no_kamar', '$harga', '$deskripsi', '$gambar')");

    if($tambah_kamar) {
        echo "<script>
            alert('Kamar Berhasil Ditambahkan');
            window.location.assign('daftar_kamar.php');
        </script>";
    } else {
        echo "<script>
            alert('Data Tidak Valid, Silahkan Isi Data Kembali');
            window.location.assign('tambah_kamar.php');
        </script>";
    }

?>