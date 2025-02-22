<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $nama_program_kerjasama = $_POST['nama_program_kerjasama'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $link_program_kerjasama = $_POST['link_program_kerjasama'];

    $stmt = $koneksi->prepare("INSERT INTO program_kerjasama (nama_program_kerjasama, deskripsi, gambar, link_program_kerjasama) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama_program_kerjasama, $deskripsi, $gambar, $link_program_kerjasama);

    if ($stmt->execute()) {
        header("Location: kelolakerjasama.php?success=tambah");
        exit();
    }
}

// UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_program_kerjasama = $_POST['nama_program_kerjasama'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $link_program_kerjasama = $_POST['link_program_kerjasama'];

    $stmt = $koneksi->prepare("UPDATE program_kerjasama SET nama_program_kerjasama=?, deskripsi=?, gambar=?, link_program_kerjasama=? WHERE id=?");
    $stmt->bind_param("ssssi", $nama_program_kerjasama, $deskripsi, $gambar, $link_program_kerjasama, $id);

    if ($stmt->execute()) {
        header("Location: kelolakerjasama.php?success=update");
        exit();
    }
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $stmt = $koneksi->prepare("DELETE FROM program_kerjasama WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: kelolakerjasama.php?success=hapus");
        exit();
    }
}

// READ
$result = $koneksi->query("SELECT * FROM program_kerjasama");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Program Kerja Sama</title>
    <link
      rel="icon"
      href="../../public/assets/images/logo/LS-logo-master.png"
      type="image/x-icon"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inder&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="container mt-5" style="margin-left: 260px;">
    <center>
        <h3>Kelola Program Kerja Sama</h3>
    </center>
    <br>
    <!-- Form Tambah Project Baru -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">Tambah Proyek Baru</div>
        <div class="card-body">
            <form id="tambahForm" method="POST">
                <div class="mb-3">
                    <label for="nama_program_kerjasama" class="form-label">Nama Proyek</label>
                    <input type="text" class="form-control" name="nama_program_kerjasama" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Proyek</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">URL Gambar</label>
                    <input type="text" class="form-control" name="gambar" required>
                </div>
                <div class="mb-3">
                    <label for="link_program_kerjasama" class="form-label">Link Program Kerja Sama</label>
                    <input type="text" class="form-control" name="link_program_kerjasama" required>
                </div>
                <button type="button" class="btn btn-secondary" onclick="konfirmasiTambah()">Tambah Proyek</button>
                <input type="hidden" name="tambah">
            </form>
        </div>
    </div>

    <!-- Tabel Proyek Kerja Sama -->
    <table class="table table-striped table-bordered" style="border-radius: 5px;">
        <tr class="bg-dark text-white" style="text-align: center">
            <td>Nama Proyek</td>
            <td>Deskripsi</td>
            <td>Gambar</td>
            <td>Aksi</td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $row['nama_program_kerjasama']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><img src="<?php echo $row['gambar']; ?>" width="100" class="img-thumbnail"></td>
            <td>
                <div style="display: flex; gap: 1rem;">
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $row['id']; ?>">Hapus</button>
                </div>
            </td>
        </tr>

        <!-- Modal Edit Project -->
        <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm<?php echo $row['id']; ?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Proyek</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="update" value="1">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="mb-3">
                                <label class="form-label">Nama Proyek</label>
                                <input type="text" class="form-control" name="nama_program_kerjasama" value="<?php echo $row['nama_program_kerjasama']; ?>" required>
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
                                <label class="form-label">Link Program Kerja Sama</label>
                                <input type="text" class="form-control" name="link_program_kerjasama" value="<?php echo $row['link_program_kerjasama']; ?>" required>
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
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("success") === "tambah") {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Proyek berhasil ditambahkan.",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "kelolakerjasama.php";
            });
        }
        
        if (urlParams.get("success") === "update") {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Data berhasil diperbarui.",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "kelolakerjasama.php";
            });
        }

        if (urlParams.get("success") === "hapus") {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Proyek berhasil dihapus.",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "kelolakerjasama.php";
            });
        }
    });

    function konfirmasiTambah() {
        let nama = document.querySelector('input[name="nama_program_kerjasama"]').value;
        let deskripsi = document.querySelector('textarea[name="deskripsi"]').value;
        let gambar = document.querySelector('input[name="gambar"]').value;
        let link = document.querySelector('input[name="link_program_kerjasama"]').value;

        if (nama === "" || deskripsi === "" || gambar === "" || link === "") {
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
                        window.location.href = `kelolakerjasama.php?hapus=${id}`;
                    }
                });
            });
        });
    });
</script>
</body>
</html>
