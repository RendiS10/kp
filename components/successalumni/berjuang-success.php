<?php
include '../admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Query untuk mengambil data top_alumni
$query = "SELECT * FROM top_alumni";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

      <!-- Section Berjuang -->
      <section class="achievement-section">
        <h1>Dari Berjuang Hingga Berprestasi</h1>
        <div class="cards-container">
          <?php if (count($data) > 0) : ?>
            <?php foreach ($data as $row) : ?>
              <div class="card">
                <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>" />
                <div class="card-content">
                  <h3><?php echo $row['nama']; ?></h3>
                  <p>Profesi: <?php echo $row['profesi']; ?></p>
                  <p>Tempat: <?php echo $row['tempat_kerja']; ?></p>
                  <div class="sosmedtim">
                    <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <p>Tidak ada data yang tersedia saat ini.</p>
          <?php endif; ?>
        </div>
      </section>