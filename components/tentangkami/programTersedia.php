<?php
include 'components/admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Query untuk mengambil data program
$query = "SELECT * FROM program";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<section class="program-tersedia">

        <h1>Program Pelatihan</h1>
        <div class="program-cards">
            <?php if (count($data) > 0) : ?>
                <?php foreach ($data as $row) : ?>
                    <div class="program-card">
                        <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_program']; ?>" class="program-image2" />
                        <h3 class="program-card-title"><?php echo $row['nama_program']; ?></h3>
                        <p class="program-card-description"><?php echo $row['deskripsi']; ?></p>
                        <a href="<?php echo $row['link_program']; ?>" class="program-button">Lihat Detail Program</a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada program yang tersedia saat ini.</p>
            <?php endif; ?>
        </div>
</section>