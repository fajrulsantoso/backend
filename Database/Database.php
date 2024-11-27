<?php
$serverName = "localhost"; // Nama server
$connectionOptions = array(
    "Database" => "sibeta", // Nama database
    "Uid" => "", // Username
    "PWD" => "" // Password
);

// Koneksi ke SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    echo "Koneksi Berhasil!";
} else {
    echo "Koneksi Gagal!";
    die(print_r(sqlsrv_errors(), true));
}


?>
