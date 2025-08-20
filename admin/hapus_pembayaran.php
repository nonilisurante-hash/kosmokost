<?php 

include '../config.php';
include '../cek_session.php';

$id_pembayaran = $_GET['id_pembayaran'];

$hapus_pembayaran = mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'");
// var_dump($id);

    if($hapus_pembayaran) {
        echo "<script>
            alert('Data Pembayaran Berhasil Dihapus');
            window.location.assign('riwayat_pembayaran.php');
        </script>";
    } else {
        echo "<script>
            alert('Hapus Data Gagal, Silahkan Coba Lagi!');
            window.location.assign('riwayat_pembayaran.php');
        </script>";
    }

?>