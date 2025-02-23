<?php
include 'components/admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Tentukan jumlah item per halaman
$items_per_page = 4;

// Tentukan halaman saat ini
$current_page = isset($_GET['page_tersedia']) ? (int)$_GET['page_tersedia'] : 1;

// Hitung offset
$offset = ($current_page - 1) * $items_per_page;

// Query untuk mengambil data program dengan limit dan offset
$query = "SELECT * FROM program_pelatihan LIMIT $items_per_page OFFSET $offset";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Query untuk menghitung total item
$total_query = "SELECT COUNT(*) as total FROM program_pelatihan";
$total_result = mysqli_query($koneksi, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_items = $total_row['total'];

// Hitung total halaman
$total_pages = ceil($total_items / $items_per_page);
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
                    <a href="<?php echo $row['link_pelatihan']; ?>" class="program-button">Lihat Detail Program</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Tidak ada program yang tersedia saat ini.</p>
        <?php endif; ?>
    </div>
    <?php if ($total_pages > 1) : ?>
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page_tersedia=<?php echo $i; ?>" class="<?php echo $i == $current_page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</section>
