<?php 

include '../config.php';
include '../cek_session.php';

$id_penghuni = $_GET['id_penghuni'];


// Ambil nomor kamar berdasarkan id_penghuni
$query_no_kamar = mysqli_query($conn, "SELECT no_kamar FROM penghuni WHERE id_penghuni = '$id_penghuni'");
$data = mysqli_fetch_assoc($query_no_kamar); // Ambil data hasil query

if ($data) {
    $no_kamar = $data['no_kamar']; // Nomor kamar yang terkait

    // Hapus penghuni berdasarkan id_penghuni
    $hapus_penghuni = mysqli_query($conn, "DELETE FROM penghuni WHERE id_penghuni = '$id_penghuni'");

    if ($hapus_penghuni) {
        // Update status kamar menjadi 'Kosong'
        $update_kamar = mysqli_query($conn, "UPDATE kamar SET status = 'Kosong' WHERE no_kamar = '$no_kamar'");

        if ($update_kamar) {
            echo "<script>
                alert('Data Penghuni Berhasil Dihapus dan Status Kamar Diperbarui');
                window.location.assign('daftar_penghuni.php');
            </script>";
        } else {
            echo "<script>
                alert('Hapus Penghuni Berhasil, tetapi Gagal Memperbarui Status Kamar');
                window.location.assign('daftar_penghuni.php');
            </script>";
        }
    } else {
        echo "<script>
            alert('Hapus Data Penghuni Gagal, Silahkan Coba Lagi!');
            window.location.assign('daftar_penghuni.php');
        </script>";
    }
} else {
    echo "<script>
        alert('Data Penghuni Tidak Ditemukan!');
        window.location.assign('daftar_penghuni.php');
    </script>";
}


// $hapus_penghuni = mysqli_query($conn, "DELETE FROM penghuni WHERE id_penghuni = '$id_penghuni'");
// // var_dump($id);

//     if($hapus_penghuni) {
//         echo "<script>
//             alert('Data Penghuni Berhasil Dihapus');
//             window.location.assign('daftar_penghuni.php');
//         </script>";
//     } else {
//         echo "<script>
//             alert('Hapus Data Gagal, Silahkan Coba Lagi!');
//             window.location.assign('daftar_penghuni.php');
//         </script>";
//     }

?>