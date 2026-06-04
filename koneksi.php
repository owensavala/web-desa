<?php
// Pengaturan untuk koneksi ke database
$host = "localhost"; // Nama host database
$user = "root";      // Username database (default XAMPP adalah "root")
$pass = "";          // Password database (default XAMPP kosong)
$db   = "desa_kupal"; // Nama database yang sudah kita buat

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>