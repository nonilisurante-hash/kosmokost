<?php
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "kosmokost");

// Periksa koneksi
if (!$conn) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows   = [];

    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    
    return $rows;
}

// function query($query) {
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }


?>