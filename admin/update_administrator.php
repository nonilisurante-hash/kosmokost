<?php 

include '../config.php';
include '../cek_session.php';

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$update_user = mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password' WHERE id_user = '$id_user'");

    if($update_user) {
        echo "<script>
            alert('Data User Berhasil Diubah');
            window.location.assign('administrator.php');
        </script>";
    } else {
        echo "<script>
            alert('Data Tidak Valid, Silahkan Isi Data Kembali');
            window.location.assign('form_update_administrator.php');
        </script>";
    }

?>