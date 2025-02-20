<?php
include '../admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Query untuk mengambil data mereka yang berhasil
$query = "SELECT * FROM ulasan_alumni";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

      <!-- Section Mereka Berhasil -->
      <section class="merekaBerhasil">
        <br>
        <h1>Langsung dari Mereka yang Berhasil</h1>
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
                <blockquote>
                  <?php echo $row['ulasan']; ?>
                </blockquote>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <p>Tidak ada data yang tersedia saat ini.</p>
          <?php endif; ?>
        </div>
      </section>