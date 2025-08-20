<?php 

include 'config.php';
include 'cek_session.php';

// Ambil data dari form
$id_penghuni = $_POST['id_penghuni'];
$nama = $_POST['nama'];
$no_ktp = $_POST['no_ktp'];
$no_hp = $_POST['no_hp'];
$status = $_POST['status'];
$username = $_POST['username'];
$password = $_POST['password'];

// Update data di tabel penghuni
$update_penghuni = mysqli_query($conn, "UPDATE penghuni 
    SET nama = '$nama', no_ktp = '$no_ktp', no_hp = '$no_hp', status = '$status' 
    WHERE id_penghuni = '$id_penghuni'");

// Jika update penghuni berhasil, lanjutkan update di tabel user
if ($update_penghuni) {
    $update_user = mysqli_query($conn, "UPDATE user 
        SET username = '$username', password = '$password' 
        WHERE id_penghuni = '$id_penghuni'");

    // Jika update user berhasil
    if ($update_user) {
        echo "<script>
            alert('Data Berhasil Diubah');
            window.location.assign('profil.php');
        </script>";
    } else {
        // Jika update user gagal
        echo "<script>
            alert('Gagal Memperbarui Data User');
            window.location.assign('profil.php');
        </script>";
    }
} else {
    // Jika update penghuni gagal
    echo "<script>
        alert('Data Tidak Valid, Silahkan Isi Data Kembali');
        window.location.assign('profil.php');
    </script>";
}
?>
