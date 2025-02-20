<?php
include 'components/admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Query untuk mengambil data proyek
$query = "SELECT * FROM project"; // Ganti dengan nama tabel yang sesuai
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- Section Our Projects -->
<section class="program-section">
    <h1>Program Kerja Sama</h1>
    <p class="program-description">
        Kami menawarkan beragam program pembelajaran inovatif yang mencakup
        berbagai bidang, dirancang untuk membantu Anda menguasai keterampilan
        baru dan mencapai potensi terbaik.
    </p>
    <div class="program-cards">
        <?php if (count($data) > 0) : ?>
            <?php foreach ($data as $row) : ?>
                <div class="program-card">
                    <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_project']; ?>" class="program-image" />
                    <h3 class="program-card-title"><?php echo $row['nama_project']; ?></h3>
                    <p class="program-card-description"><?php echo $row['deskripsi']; ?></p>
                    <a href="<?php echo $row['link_program_kerjasama']; ?>" class="program-button">Lihat Detail Project</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Tidak ada project yang tersedia saat ini.</p>
        <?php endif; ?>
    </div>
</section>