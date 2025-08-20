<?php 
include '../config.php';
include '../cek_session.php';


$id_penghuni = $_POST['id_penghuni'];
$no_kamar = $_POST['no_kamar'];
$no_ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$tgl_masuk = $_POST['tgl_masuk'];
$status = $_POST['status'];
$username = $_POST['username'];
$password = $_POST['password']; // Tidak di-hash, sesuai permintaan

// Update data penghuni
$update_penghuni = mysqli_query($conn, "UPDATE penghuni 
    SET no_kamar = '$no_kamar', no_ktp = '$no_ktp', nama = '$nama', no_hp = '$no_hp', tgl_masuk = '$tgl_masuk', status = '$status' 
    WHERE id_penghuni = '$id_penghuni'");

if ($update_penghuni) {
    // Cek apakah data user sudah ada
    $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE id_penghuni = '$id_penghuni'");

    if (mysqli_num_rows($cek_user) > 0) {
        // Sudah ada → update
        $update_user = mysqli_query($conn, "UPDATE user 
            SET username = '$username', password = '$password' 
            WHERE id_penghuni = '$id_penghuni' AND role = 'penghuni'");
    } else {
        // Belum ada → insert
        $update_user = mysqli_query($conn, "INSERT INTO user (id_penghuni, username, password, role) 
            VALUES ('$id_penghuni', '$username', '$password', 'penghuni')");
    }

    if (!$update_user) {
        echo "<script>
            alert('Penghuni berhasil diubah, tetapi gagal mengubah/menambahkan data akun.');
            window.location.assign('daftar_penghuni.php');
        </script>";
        exit;
    }

    // Jika status penghuni "Bukan Penghuni", update status kamar menjadi "Kosong"
    if ($status == 'Bukan Penghuni') {
        // Ambil no_kamar lama
        $kamar_lama_q = mysqli_query($conn, "SELECT no_kamar FROM penghuni WHERE id_penghuni = '$id_penghuni'");
        $kamar_lama = mysqli_fetch_assoc($kamar_lama_q)['no_kamar'];

        // Jika kamar lama berbeda dengan kamar yang baru, update status kamar lama menjadi 'Kosong'
        if ($kamar_lama != $no_kamar) {
            mysqli_query($conn, "UPDATE kamar SET status = 'Kosong' WHERE no_kamar = '$kamar_lama'");
        }

        // Update status kamar baru menjadi 'Berpenghuni'
        $update_kamar = mysqli_query($conn, "UPDATE kamar SET status = 'Berpenghuni' WHERE no_kamar = '$no_kamar'");

        if ($update_kamar) {
            echo "<script>
                alert('Data Penghuni, Akun, dan Status Kamar Berhasil Diubah');
                window.location.assign('daftar_penghuni.php');
            </script>";
        } else {
            echo "<script>
                alert('Data Penghuni dan Akun Berhasil Diubah, tetapi Gagal Memperbarui Status Kamar');
                window.location.assign('daftar_penghuni.php');
            </script>";
        }
    } else {
        echo "<script>
            alert('Data Penghuni dan Akun Berhasil Diubah');
            window.location.assign('daftar_penghuni.php');
        </script>";
    }
} else {
    echo "<script>
        alert('Data Tidak Valid, Silahkan Isi Data Kembali');
        window.location.assign('form_update_penghuni.php?id_penghuni=$id_penghuni');
    </script>";
}




// $id_penghuni = $_POST['id_penghuni'];
// $no_kamar = $_POST['no_kamar'];
// $nama = $_POST['nama'];
// $no_hp = $_POST['no_hp'];
// $tgl_masuk = $_POST['tgl_masuk'];
// $status = $_POST['status'];

// $update_penghuni = mysqli_query($conn, "UPDATE penghuni SET no_kamar = '$no_kamar', nama = '$nama', no_hp = '$no_hp', tgl_masuk = '$tgl_masuk', status = '$status' WHERE id_penghuni = '$id_penghuni'");

//     if($update_penghuni) {
//         echo "<script>
//             alert('Data Penghuni Berhasil Diubah');
//             window.location.assign('daftar_penghuni.php');
//         </script>";
//     } else {
//         echo "<script>
//             alert('Data Tidak Valid, Silahkan Isi Data Kembali');
//             window.location.assign('form_update_penghuni.php');
//         </script>";
//     }

?>