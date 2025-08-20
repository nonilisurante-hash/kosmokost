<?php 

include '../config.php';
include '../cek_session.php';

$no_kamar = $_GET['no_kamar'];

$hapus_kamar = mysqli_query($conn, "DELETE FROM kamar WHERE no_kamar = '$no_kamar'");
// var_dump($id);

    if($hapus_kamar) {
        echo "<script>
            alert('Data Kamar Berhasil Dihapus');
            window.location.assign('daftar_kamar.php');
        </script>";
    } else {
        echo "<script>
            alert('Hapus Data Gagal, Silahkan Coba Lagi!');
            window.location.assign('daftar_kamar.php');
        </script>";
    }

?>