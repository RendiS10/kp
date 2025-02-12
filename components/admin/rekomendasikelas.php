<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// CREATE
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $instructor = $_POST['instructor'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO rekomendasi_program (judul, deskripsi, gambar, instructor, harga) 
              VALUES ('$judul', '$deskripsi', '$gambar', '$instructor', '$harga')";
    mysqli_query($koneksi, $query);
    header("Location: rekomendasikelas.php");
    exit();
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $instructor = $_POST['instructor'];
    $harga = $_POST['harga'];

    $query = "UPDATE rekomendasi_program 
              SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar', instructor='$instructor', harga='$harga' 
              WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: rekomendasikelas.php");
    exit();
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM rekomendasi_program WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: rekomendasikelas.php");
    exit();
}

// READ
$result = mysqli_query($koneksi, "SELECT * FROM rekomendasi_program");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Rekomendasi Kelas</title>
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
    <center>
        <h3 class="mb-4">Kelola Rekomendasi Kelas</h3>
    </center>

    <!-- Form Tambah Rekomendasi Kelas -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">Tambah Rekomendasi Baru</div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Program</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Program</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">URL Gambar</label>
                    <input type="text" class="form-control" name="gambar" required>
                </div>
                <div class="mb-3">
                    <label for="instructor" class="form-label">Instruktur</label>
                    <input type="text" class="form-control" name="instructor" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" name="harga" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-secondary">Tambah Rekomendasi</button>
            </form>
        </div>
    </div>

    <!-- Tabel Rekomendasi Kelas -->
   <table class="table table-striped table-bordered" style="border-radius: 5px;">
        <tr class="bg-dark text-white" style="text-align: center">
                <td>Judul Program</td>
                <td>Deskripsi</td>
                <td>Gambar</td>
                <td>Instruktur</td>
                <td>Harga</td>
                <td>Aksi</td>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td><img src="<?php echo $row['gambar']; ?>" width="100" class="img-thumbnail"></td>
                <td><?php echo $row['instructor']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td style="display: flex; gap: 1rem;">
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                    <a href="?hapus=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>

            <!-- Modal Edit Rekomendasi -->
            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Rekomendasi Program</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Judul Program</label>
                                    <input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" rows="3" required><?php echo $row['deskripsi']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">URL Gambar</label>
                                    <input type="text" class="form-control" name="gambar" value="<?php echo $row['gambar']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Instruktur</label>
                                    <input type="text" class="form-control" name="instructor" value="<?php echo $row['instructor']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>" required>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
