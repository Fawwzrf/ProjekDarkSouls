<?php
// Koneksi ke database menggunakan mysqli
$host = "localhost";  // Nama host database
$user = "root";       // Username database
$pass = "";           // Password database
$db   = "darksouls";  // Nama database

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>