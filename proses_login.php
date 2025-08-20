<?php 
    session_start(); // Memulai sesi
    include 'config.php';

    // Tangkap input dari form login
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk mengecek user
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    // Cek apakah username dan password cocok
    if(mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        // Simpan data ke session sesuai dengan peran
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_user'] = $data['id_user']; // ID unik untuk user
        $_SESSION['role'] = $data['role'];

        if($data['role'] == 'admin') {
            header("location:admin/dashboard.php");
            exit;
        } elseif($data['role'] == 'penghuni') {
            $_SESSION['id_penghuni'] = $data['id_penghuni'];
            header("location:home.php");
            exit;
        } else {
            echo "<script>
                alert('Role tidak valid');
                window.location.assign('login.php');
            </script>";
            exit;
        }
    } else {
        // Jika username/password salah
        echo "<script>
            alert('Username atau password salah');
            window.location.assign('login.php');
        </script>";
        exit;
    }
?>
