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
    $ulasan = $_POST['ulasan'];
    $gambar = $_POST['gambar'];

    $query = "INSERT INTO ulasan_alumni (nama, profesi, ulasan, gambar) 
              VALUES ('$nama', '$profesi', '$ulasan', '$gambar')";
    mysqli_query($koneksi, $query);
    header("Location: kelolamerekaberhasil.php?success=tambah");
    exit();
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $profesi = $_POST['profesi'];
    $ulasan = $_POST['ulasan'];
    $gambar = $_POST['gambar'];

    $query = "UPDATE ulasan_alumni 
              SET nama='$nama', profesi='$profesi', ulasan='$ulasan', gambar='$gambar' 
              WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: kelolamerekaberhasil.php?success=update");
    exit();
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM ulasan_alumni WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: kelolamerekaberhasil.php?success=hapus");
    exit();
}

// READ (Tampilkan semua data)
$result = mysqli_query($koneksi, "SELECT * FROM ulasan_alumni");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Data Review Alumni</title>
    <link
      rel="icon"
      href="../../public/assets/images/logo/LS-logo-master.png"
      type="image/x-icon"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inder&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="container mt-5" style="margin-left: 260px;">
    <center>
        <h3 class="mb-4">Kelola Data Review Alumni</h3>
    </center>

    <!-- Form Tambah Data Baru -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">Tambah Data Baru</div>
        <div class="card-body">
            <form id="tambahForm" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="profesi" class="form-label">Profesi</label>
                    <input type="text" class="form-control" name="profesi" id="profesi" required>
                </div>
                <div class="mb-3">
                    <label for="ulasan" class="form-label">Ulasan</label>
                    <input type="text" class="form-control" name="ulasan" id="ulasan" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">URL Gambar</label>
                    <input type="text" class="form-control" name="gambar" id="gambar" required>
                </div>
                <button type="button" class="btn btn-secondary" onclick="konfirmasiTambah()">Tambah Data</button>
                <input type="hidden" name="tambah">
            </form>
        </div>
    </div>

    <!-- Tabel Data Mereka Berhasil -->
    <table class="table table-striped table-bordered" style="border-radius: 5px;">
        <tr class="bg-dark text-white" style="text-align: center">
            <td>Nama</td>
            <td>Profesi</td>
            <td>Kata Kata</td>
            <td>Gambar</td>
            <td>Aksi</td>
        </tr>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['profesi']; ?></td>
                <td><?php echo $row['ulasan']; ?></td>
                <td><img src="<?php echo $row['gambar']; ?>" width="100" class="img-thumbnail"></td>
                <td style="display: flex; gap: 1rem;">
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $row['id']; ?>">Hapus</button>
                </td>
            </tr>

            <!-- Modal Edit Data -->
            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editForm<?php echo $row['id']; ?>" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Data Mereka Berhasil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="update" value="1">
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
                                    <input type="text" class="form-control" name="ulasan" value="<?php echo $row['ulasan']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">URL Gambar</label>
                                    <input type="text" class="form-control" name="gambar" value="<?php echo $row['gambar']; ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="konfirmasiEdit(<?php echo $row['id']; ?>)">Simpan Perubahan</button>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Notifikasi setelah tambah berhasil
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("success") === "tambah") {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Data berhasil ditambahkan.",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "kelolamerekaberhasil.php";
            });
        }
        
        // Notifikasi setelah update berhasil
        if (urlParams.get("success") === "update") {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Data berhasil diperbarui.",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "kelolamerekaberhasil.php";
            });
        }

        // Notifikasi setelah hapus berhasil
        if (urlParams.get("success") === "hapus") {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Data berhasil dihapus.",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "kelolamerekaberhasil.php";
            });
        }
    });

    // Konfirmasi Tambah Data
    function konfirmasiTambah() {
        let nama = document.getElementById('nama').value;
        let profesi = document.getElementById('profesi').value;
        let ulasan = document.getElementById('ulasan').value;
        let gambar = document.getElementById('gambar').value;

        if (nama === "" || profesi === "" || ulasan === "" || gambar === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap isi semua data terlebih dahulu!'
            });
            return;
        }

        Swal.fire({
            title: 'Apakah data sudah benar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Tambahkan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('tambahForm').submit();
            }
        });
    }

    // Konfirmasi Edit Data
    function konfirmasiEdit(id) {
        Swal.fire({
            title: "Konfirmasi Perubahan",
            text: "Apakah Anda yakin ingin menyimpan perubahan?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, Simpan!",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`editForm${id}`).submit();
            }
        });
    }

    // Konfirmasi Hapus Data
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".delete-btn");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function () {
                const id = this.getAttribute("data-id");

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `kelolamerekaberhasil.php?hapus=${id}`;
                    }
                });
            });
        });
    });
</script>
</body>
</html>
