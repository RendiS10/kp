<?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!-- sidebar.php -->
<!-- Link CSS dan Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/sidebar.css">
<link rel="stylesheet" href="../../public/css/admin-style.css">

<!-- Sidebar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 100vh; position: fixed; width: 250px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="sidebarMenu">
        <ul class="navbar-nav flex-column">
            <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'homeadmin.php' ? 'active' : ''; ?>" href="homeadmin.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'kelolaprogram.php' ? 'active' : ''; ?>" href="kelolaprogram.php">
                    <i class="fas fa-chalkboard-teacher"></i> Kelola Program Pelatihan
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'kelolakerjasama.php' ? 'active' : ''; ?>" href="kelolakerjasama.php">
                    <i class="fas fa-chalkboard-teacher"></i> Kelola Program Kerja Sama
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'rekomendasikelas.php' ? 'active' : ''; ?>" href="rekomendasikelas.php">
                    <i class="fas fa-chalkboard-teacher"></i> Kelola Rekomendasi Kelas
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'kelolaberjuang.php' ? 'active' : ''; ?>" href="kelolaberjuang.php">
                    <i class="fas fa-chalkboard-teacher"></i> Kelola Alumni Yang Berprestasi
                </a>
            </li>
              <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'kelolamerekaberhasil.php' ? 'active' : ''; ?>" href="kelolamerekaberhasil.php">
                    <i class="fas fa-chalkboard-teacher"></i> Kelola Data Review Alumi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Tambahkan Bootstrap JS dan jQuery di akhir file -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'controller.php?action=logout';
            }
        });
    }
</script>



