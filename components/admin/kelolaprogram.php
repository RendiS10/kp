<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// CREATE
if (isset($_POST['tambah'])) {
    $nama_program = $_POST['nama_program'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $link_pelatihan = $_POST['link_pelatihan'];

    $query = "INSERT INTO program_pelatihan (nama_program, deskripsi, gambar, link_pelatihan) VALUES ('$nama_program', '$deskripsi', '$gambar', '$link_pelatihan')";
    mysqli_query($koneksi, $query);
    header("Location: kelolaprogram.php");
    exit();
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_program = $_POST['nama_program'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $link_pelatihan = $_POST['link_pelatihan'];

    $query = "UPDATE program_pelatihan SET nama_program='$nama_program', deskripsi='$deskripsi', gambar='$gambar', link_pelatihan='$link_pelatihan' WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: kelolaprogram.php");
    exit();
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM program_pelatihan WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: kelolaprogram.php");
    exit();
}

// READ
$result = mysqli_query($koneksi, "SELECT * FROM program_pelatihan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Program Magang</title>
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
         <h3>Kelola Program Tersedia</h3>
    </center>
    <br>
        <!-- Form Tambah Program -->
        <div class="card mb-4">
        <div class="card-header bg-dark text-white">Tambah Program Baru</div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama_program" class="form-label">Nama Program</label>
                    <input type="text" class="form-control" name="nama_program" required>
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
                    <label for="link_pelatihan" class="form-label">Link Program</label>
                    <input type="text" class="form-control" name="link_pelatihan" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-secondary">Tambah Program</button>
            </form>
        </div>
    </div>

    <!-- Tabel Program -->
    <table class="table table-striped table-bordered" style="border-radius: 5px;">
        <tr class="bg-dark text-white" style="text-align: center">
                <td>Nama Program</td>
                <td>Deskripsi</td>
                <td>Gambar</td>
                <td>Aksi</td>
        </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['nama_program']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td><img src="<?php echo $row['gambar']; ?>" width="100" class="img-thumbnail"></td>
                <td>
                    <div style="display: flex; gap: 1rem;">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                        <a href="?hapus=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </div>
                </td>
            </tr>

            <!-- Modal Edit Program -->
            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Program</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Nama Program</label>
                                    <input type="text" class="form-control" name="nama_program" value="<?php echo $row['nama_program']; ?>" required>
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
                                    <label class="form-label">Link Program</label>
                                    <input type="text" class="form-control" name="link_pelatihan" value="<?php echo $row['link_pelatihan']; ?>" required>
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
