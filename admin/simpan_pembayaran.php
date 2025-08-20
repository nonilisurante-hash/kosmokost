<?php 

include '../config.php';
include '../cek_session.php';

$id_penghuni = $_POST['id_penghuni'];
$no_kamar = $_POST['no_kamar'];
$bulan = $_POST['bulan'];
$tanggal_bayar = $_POST['tanggal_bayar'];
$bayar = $_POST['bayar'];
$keterangan = $_POST['keterangan'];

$tambah_pembayaran = mysqli_query($conn, "INSERT INTO pembayaran(id_penghuni,no_kamar,bulan,tanggal_bayar, bayar, keterangan) VALUES('$id_penghuni', '$no_kamar', '$bulan', '$tanggal_bayar', '$bayar', '$keterangan')");

    if($tambah_pembayaran) {
        echo "<script>
            alert('Pembayaran Berhasil Ditambahkan');
            window.location.assign('riwayat_pembayaran.php');
        </script>";
    } else {
        echo "<script>
            alert('Data Tidak Valid, Silahkan Isi Data Kembali');
            window.location.assign('pembayaran.php');
        </script>";
    }

?>