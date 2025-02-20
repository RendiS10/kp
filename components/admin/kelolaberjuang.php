<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $profesi = $_POST['profesi'];
    $tempat_kerja = $_POST['tempat_kerja'];
    $gambar = $_POST['gambar'];

    $query = "UPDATE berjuang 
              SET nama='$nama', profesi='$profesi', tempat_kerja='$tempat_kerja', gambar='$gambar' 
              WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: kelolaberjuang.php");
    exit();
}

// READ (Tampilkan semua data untuk diedit)
$result = mysqli_query($koneksi, "SELECT * FROM berjuang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Alumni Yang Berprestasi</title>
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

<?php include 'sidebar.php'; ?>

<div class="container mt-5" style="margin-left: 260px;">
    <h3 class="mb-4">Kelola Alumni Yang Berprestasi</h3>

    <!-- Card untuk Tabel Data Berjuang -->
    <div class="card mb-4 shadow">
        <div class="card-header bg-dark text-white">Daftar Top 4 Alumni Berprestasi </div>
        <div class="card-body">
           <table class="table table-striped table-bordered" style="border-radius: 5px;">
        <tr class="bg-dark text-white" style="text-align: center">
                        <td>Nama</td>
                        <td>Profesi</td>
                        <td>Tempat</td>
                        <td>Gambar</td>
                        <td>Aksi</td>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr style="text-align: center">
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['profesi']; ?></td>
                        <td><?php echo $row['tempat_kerja']; ?></td>
                        <td><img src="<?php echo $row['gambar']; ?>" width="100" class="img-thumbnail"></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                        </td>
                    </tr>

                    <!-- Modal Edit Data Berjuang -->
                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Data Berjuang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Profesi</label>
                                            <input type="text" class="form-control" name="profesi" value="<?php echo $row['profesi']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tempat</label>
                                            <input type="text" class="form-control" name="tempat_kerja" value="<?php echo $row['tempat_kerja']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">URL Gambar</label>
                                            <input type="text" class="form-control" name="gambar" value="<?php echo $row['gambar']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
