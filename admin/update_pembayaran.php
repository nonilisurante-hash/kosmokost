<?php 

include '../config.php';
include '../cek_session.php';

$id_pembayaran = $_POST['id_pembayaran'];
$id_penghuni = $_POST['id_penghuni'];
$no_kamar = $_POST['no_kamar'];
$bulan = $_POST['bulan'];
$tanggal_bayar = $_POST['tanggal_bayar'];
$bayar = $_POST['bayar'];
$keterangan = $_POST['keterangan'];

$update_pembayaran = mysqli_query($conn, "UPDATE pembayaran SET id_penghuni = '$id_penghuni', no_kamar = '$no_kamar', bulan = '$bulan', tanggal_bayar = '$tanggal_bayar', bayar = '$bayar', keterangan = '$keterangan' WHERE id_pembayaran = '$id_pembayaran'");
// var_dump($update_pembayaran);

    if($update_pembayaran) {
        echo "<script>
            alert('Data Pembayaran Berhasil Diubah');
            window.location.assign('riwayat_pembayaran.php');
        </script>";
    } else {
        echo "<script>
            alert('Data Tidak Valid, Silahkan Isi Data Kembali');
            window.location.assign('form_update_pembayaran.php');
        </script>";
    }

?>