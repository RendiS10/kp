<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Alihkan ke halaman login jika belum login
    exit();
}

include 'koneksi.php'; // Pastikan koneksi database sudah ada

// Menghitung jumlah konten dari setiap tabel
$tables = ['login_admin', 'program', 'project', 'rekomendasi_program', 'berjuang', 'mereka_berhasil'];
$counts = [];

foreach ($tables as $table) {
    $query = "SELECT COUNT(*) as count FROM $table";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $counts[$table] = $row['count'];
    } else {
        $counts[$table] = 0; // Jika query gagal, set count ke 0
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Admin</title>
    <link
      rel="icon"
      href="../../public/assets/images/logo/LS-logo-master.png"
      type="image/x-icon"
    />
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inder&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Panggil Sidebar -->
<?php include 'sidebar.php'; ?>

<div class="content" style="margin-left: 260px; padding: 20px;">
    <hr>
    <center>
        <h2>Dashboard</h2>
    </center>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Jumlah Konten Program</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['program']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Jumlah Konten Project</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['project']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Jumlah Konten Rekomendasi Program</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['rekomendasi_program']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Jumlah Konten Berjuang</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['berjuang']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Jumlah Konten Mereka yang Berhasil</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['mereka_berhasil']; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
