<?php 

include '../config.php';
include '../cek_session.php';

$no_kamar = $_POST['no_kamar'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$gambar_lama = $_POST['gambar_lama'];

// Cek apakah ada file gambar baru yang diunggah
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    // Jika ada gambar baru, proses unggahan
    $target_dir = "../img/";
    $gambar_baru = basename($_FILES['gambar']['name']);
    $target_file = $target_dir . $gambar_baru;

    // Validasi file upload (opsional)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageFileType, $allowed_types)) {
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            // Jika berhasil mengunggah, gunakan gambar baru
            $gambar = $gambar_baru;

            // Hapus gambar lama jika berbeda dan masih ada
            if ($gambar_lama && file_exists($target_dir . $gambar_lama)) {
                unlink($target_dir . $gambar_lama);
            }
        } else {
            echo "<script>
                alert('Gagal mengunggah gambar baru.');
                window.location.assign('form_update_kamar.php');
            </script>";
            exit;
        }
    } else {
        echo "<script>
            alert('Format file gambar tidak valid. Hanya JPG, JPEG, PNG, GIF yang diperbolehkan.');
            window.location.assign('form_update_kamar.php');
        </script>";
        exit;
    }
} else {
    // Jika tidak ada gambar baru, gunakan gambar lama
    $gambar = $gambar_lama;
}

// Lakukan update data ke database
$update_catatan = mysqli_query($conn, "UPDATE kamar SET harga = '$harga', deskripsi = '$deskripsi', status = '$status', gambar = '$gambar' WHERE no_kamar = '$no_kamar'");

if ($update_catatan) {
    echo "<script>
        alert('Data Kamar Berhasil Diubah');
        window.location.assign('daftar_kamar.php');
    </script>";
} else {
    echo "<script>
        alert('Data Tidak Valid, Silahkan Isi Data Kembali');
        window.location.assign('form_update_kamar.php');
    </script>";
}

?>
