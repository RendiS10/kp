<?php
include 'components/admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Query untuk mengambil data rekomendasi program
$query = "SELECT * FROM rekomendasi_program"; // Ganti dengan nama tabel yang sesuai
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- section recomendasi program -->
<section class="recommendation-section">
  <h1>Rekomendasi Program Kelas</h1>
  <p class="recommendation-description">
    Maksimalkan potensi belajar dengan program teratas kami, materi
    relevan, dan instruktur berpengalaman untuk hasil luar biasa dan
    tujuan tercapai.
  </p>
  <div class="recommendation-cards">
    <?php if (count($data) > 0) : ?>
        <?php foreach ($data as $row) : ?>
            <div class="recommendation-card">
                <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" class="card-image" />
                <div class="card-header webinar">Webinar</div>
                <h3 class="card-title"><?php echo $row['judul']; ?></h3>
                <p class="card-instructor"><?php echo $row['instructor']; ?></p>
                <p class="card-description"><?php echo $row['deskripsi']; ?></p>
                <p class="card-price"><?php echo $row['harga']; ?></p>
                <a href="<?php echo $row['selengkapnya'] ?>" class="card-button">Selengkapnya →</a>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Tidak ada program yang tersedia saat ini.</p>
    <?php endif; ?>
  </div>
</section>