<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Alihkan ke halaman login jika belum login
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Halaman Tentang Kami</title>
    <link rel="stylesheet" href="../../css/sidebar.css">
</head>
<body>

<!-- Panggil Sidebar -->
<?php include 'sidebar.php'; ?>

<div class="content" style="margin-left: 260px; padding: 20px;">
    <h1>Kelola Halaman Tentang Kami</h1>
    <p>Ini adalah konten untuk mengelola halaman tentang kami.</p>
    <!-- Tambahkan konten pengelolaan halaman di sini -->
</div>

</body>
</html>
