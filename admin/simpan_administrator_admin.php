<?php 

include '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$query_validasi = "SELECT*FROM user WHERE username='$username'";
$query = mysqli_query($conn,$query_validasi);

// var_dump(mysqli_num_rows($query));

if(mysqli_num_rows($query)==0) {
    $query_register = mysqli_query($conn, "INSERT INTO user(username, password, role) VALUES('$username', '$password', '$role')");
    if($query_register) { ?>
        <script>
            alert("Data Sudah Berhasil Ditambahkan");
            window.location.assign("administrator.php");
        </script>
    <?php }
    } else { ?>
        <script>
            alert("Data Yang Anda Gunakan Sudah Terdaftar");
            window.location.assign("administrator.php");
        </script>
        <?php
}


?>