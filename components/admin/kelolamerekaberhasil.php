<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// CREATE
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $profesi = $_POST['profesi'];
    $katakata = $_POST['katakata'];
    $gambar = $_POST['gambar'];

    $query = "INSERT INTO mereka_berhasil (nama, profesi, katakata, gambar) 
              VALUES ('$nama', '$profesi', '$katakata', '$gambar')";
    mysqli_query($koneksi, $query);
    header("Location: kelolamerekaberhasil.php");
    exit();
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $profesi = $_POST['profesi'];
    $katakata = $_POST['katakata'];
    $gambar = $_POST['gambar'];

    $query = "UPDATE mereka_berhasil 
              SET nama='$nama', profesi='$profesi', katakata='$katakata', gambar='$gambar' 
              WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: kelolamerekaberhasil.php");
    exit();
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM mereka_berhasil WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: kelolamerekaberhasil.php");
    exit();
}

// READ (Tampilkan semua data)
$result = mysqli_query($koneksi, "SELECT * FROM mereka_berhasil");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Mereka Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/sidebar.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="container mt-5" style="margin-left: 260px;">
    <h1 class="mb-4">Kelola Data Mereka Berhasil</h1>

    <!-- Form Tambah Data Baru -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Tambah Data Baru</div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="profesi" class="form-label">Profesi</label>
                    <input type="text" class="form-control" name="profesi" required>
                </div>
                <div class="mb-3">
                    <label for="katakata" class="form-label">katakata</label>
                    <input type="text" class="form-control" name="katakata" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">URL Gambar</label>
                    <input type="text" class="form-control" name="gambar" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
            </form>
        </div>
    </div>

    <!-- Tabel Data Mereka Berhasil -->
    <h2>Daftar Mereka Berhasil</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Profesi</th>
                <th>Kata Kata</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['profesi']; ?></td>
                <td><?php echo $row['katakata']; ?></td>
                <td><img src="<?php echo $row['gambar']; ?>" width="100" class="img-thumbnail"></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                    <a href="?hapus=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>

            <!-- Modal Edit Data -->
            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Data Mereka Berhasil</h5>
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
                                    <label class="form-label">Kata Kata</label>
                                    <input type="text" class="form-control" name="katakata" value="<?php echo $row['katakata']; ?>" required>
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
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
