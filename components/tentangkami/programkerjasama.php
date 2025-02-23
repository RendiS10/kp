<?php
include 'components/admin/koneksi.php'; // Pastikan koneksi database sudah ada

// Tentukan jumlah item per halaman
$items_per_page = 4;

// Tentukan halaman saat ini
$current_page = isset($_GET['page_kerjasama']) ? (int)$_GET['page_kerjasama'] : 1;

// Hitung offset
$offset = ($current_page - 1) * $items_per_page;

// Query untuk mengambil data proyek dengan limit dan offset
$query = "SELECT * FROM program_kerjasama LIMIT $items_per_page OFFSET $offset";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil semua data sekaligus
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Query untuk menghitung total item
$total_query = "SELECT COUNT(*) as total FROM program_kerjasama";
$total_result = mysqli_query($koneksi, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_items = $total_row['total'];

// Hitung total halaman
$total_pages = ceil($total_items / $items_per_page);
?>

<!-- Section Our Projects -->
<section class="program-section">
    <h1>Program Kerja Sama</h1>
    <p class="program-description">
        Kami bekerja sama dengan berbagai mitra lain yang menawarkan beragam program pembelajaran inovatif yang mencakup
        berbagai bidang, dirancang untuk membantu Anda menguasai keterampilan
        baru dan mencapai potensi terbaik.
    </p>
    <div class="program-cards">
        <?php if (count($data) > 0) : ?>
            <?php foreach ($data as $row) : ?>
                <div class="program-card">
                    <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_program_kerjasama']; ?>" class="program-image" />
                    <h3 class="program-card-title"><?php echo $row['nama_program_kerjasama']; ?></h3>
                    <p class="program-card-description"><?php echo $row['deskripsi']; ?></p>
                    <a href="<?php echo $row['link_program_kerjasama']; ?>" class="program-button">Lihat Detail Project</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Tidak ada project yang tersedia saat ini.</p>
        <?php endif; ?>
    </div>
    <?php if ($total_pages > 1) : ?>
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page_kerjasama=<?php echo $i; ?>" class="<?php echo $i == $current_page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</section>