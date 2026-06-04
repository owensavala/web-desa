<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];

    $query = "INSERT INTO kritik_saran (nama, komentar) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ss", $nama, $komentar);

    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil, kembali ke halaman form dengan pesan sukses
        header("Location: index.php?page=kritik_saran&status=sukses");
    } else {
        // Jika gagal, bisa ditambahkan penanganan error
        echo "Gagal mengirim masukan.";
    }
    exit();
}
?>