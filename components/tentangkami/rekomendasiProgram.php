<?php
include 'components/admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Tentukan jumlah item per halaman
$items_per_page = 4;

// Tentukan halaman saat ini
$current_page = isset($_GET['page_rekomendasi']) ? (int)$_GET['page_rekomendasi'] : 1;

// Hitung offset
$offset = ($current_page - 1) * $items_per_page;

// Query untuk mengambil data rekomendasi program dengan limit dan offset
$query = "SELECT * FROM rekomendasi_program LIMIT $items_per_page OFFSET $offset";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Query untuk menghitung total item
$total_query = "SELECT COUNT(*) as total FROM rekomendasi_program";
$total_result = mysqli_query($koneksi, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_items = $total_row['total'];

// Hitung total halaman
$total_pages = ceil($total_items / $items_per_page);
?>

<!-- section recomendasi program -->
<section class="recommendation-section">
  <h1>Rekomendasi Program</h1>
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
  <?php if ($total_pages > 1) : ?>
  <div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
      <a href="?page_rekomendasi=<?php echo $i; ?>" class="<?php echo $i == $current_page ? 'active' : ''; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
</section>