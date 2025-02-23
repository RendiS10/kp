<?php
include '../admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Tentukan jumlah item per halaman
$items_per_page = 4;

// Tentukan halaman saat ini
$current_page = isset($_GET['page_berhasil']) ? (int)$_GET['page_berhasil'] : 1;

// Hitung offset
$offset = ($current_page - 1) * $items_per_page;

// Query untuk mengambil data mereka yang berhasil dengan limit dan offset
$query = "SELECT * FROM ulasan_alumni LIMIT $items_per_page OFFSET $offset";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Query untuk menghitung total item
$total_query = "SELECT COUNT(*) as total FROM ulasan_alumni";
$total_result = mysqli_query($koneksi, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_items = $total_row['total'];

// Hitung total halaman
$total_pages = ceil($total_items / $items_per_page);
?>

      <!-- Section Mereka Berhasil -->
      <section class="merekaBerhasil">
        <br>
        <h1>Review Alumni</h1>
        <div class="testimonials-container">
          <?php if (count($data) > 0) : ?>
            <?php foreach ($data as $row) : ?>
              <div class="testimonial-card">
                <div class="atas">
                  <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>" />
                  <div class="atas-kanan">
                    <h3><?php echo $row['nama']; ?></h3>
                    <p><?php echo $row['profesi']; ?></p>
                  </div>
                </div>
                <blockquote id="review-<?php echo $row['id']; ?>" data-full-text="<?php echo htmlspecialchars($row['ulasan']); ?>">
                  <?php
                  $ulasan = $row['ulasan'];
                  if (strlen($ulasan) > 200) {
                    echo substr($ulasan, 0, 200) . '... <a href="javascript:void(0);" onclick="showFullReview(' . $row['id'] . ')">Lihat Selengkapnya</a>';
                  } else {
                    echo $ulasan;
                  }
                  ?>
                </blockquote>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <p>Tidak ada data yang tersedia saat ini.</p>
          <?php endif; ?>
        </div>
        <?php if ($total_pages > 1) : ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a href="?page_berhasil=<?php echo $i; ?>" class="<?php echo $i == $current_page ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
      </section>

<script>
function showFullReview(id) {
    const reviewElement = document.getElementById('review-' + id);
    const fullText = reviewElement.getAttribute('data-full-text');
    reviewElement.innerHTML = fullText;
    reviewElement.classList.add('focus-animation');
}
</script>
