<?php 

include '../config.php';
include '../cek_session.php';

$id_user = $_GET['id_user'];

$hapus_user = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");
// var_dump($id);

    if($hapus_user) {
        echo "<script>
            alert('Data Berhasil Dihapus');
            window.location.assign('administrator.php');
        </script>";
    } else {
        echo "<script>
            alert('Hapus Data Gagal, Silahkan Coba Lagi!');
            window.location.assign('administrator.php');
        </script>";
    }

?>