<?php
// Periksa apakah sesi untuk username atau id_user sudah diatur
if (!isset($_SESSION["username"]) || !isset($_SESSION["id_user"])) {
    echo "
        <script> 
            alert('Silakan login terlebih dahulu');
            window.location.assign('index.php');
        </script>
    ";
    exit; // Hentikan eksekusi script lebih lanjut
}
?>
