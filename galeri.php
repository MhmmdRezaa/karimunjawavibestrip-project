<?php
$base_url = './';
// Hubungkan komponen data konfigurasi
require_once $base_url . 'config.php';

// Judul halaman dinamis untuk SEO
$page_title = "Galeri Dokumentasi Karimunjawa - Karimunjawa Tour";

// Muat komponen header visual
include_once $base_url . 'header.php';
?>

<div class="btn-back-container" style="margin-bottom: 20px;">
    <a href="<?php echo $base_url; ?>index.php" class="btn-back">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Kembali ke Beranda
    </a>
</div>

<!-- Main Gallery Section -->
<main class="container" style="padding-top: 20px;">
    <h1 style="text-align: center; margin-bottom: 8px;">Galeri Keindahan Karimunjawa</h1>
    <p style="text-align: center; color: var(--medium-gray); max-width: 600px; margin: 0 auto 40px auto; font-size: 16px; line-height: 24px;">
        Kumpulan dokumentasi keindahan alam bawah laut, pantai pasir putih, resort romantis, dan momen kebersamaan tak terlupakan di Kepulauan Karimunjawa.
    </p>

    <!-- Gallery Grid -->
    <div class="gallery-grid">
        <?php if (isset($galeri_foto) && is_array($galeri_foto)): ?>
            <?php foreach ($galeri_foto as $foto): 
                // Tentukan tag kategori foto berdasarkan kata kunci di alt
                $tag = "Wisata";
                if (stripos($foto['alt'], 'Terumbu') !== false || stripos($foto['alt'], 'Hiu') !== false || stripos($foto['alt'], 'Menjangan') !== false) {
                    $tag = "Bawah Laut";
                } elseif (stripos($foto['alt'], 'Resort') !== false || stripos($foto['alt'], 'Honeymoon') !== false) {
                    $tag = "Akomodasi";
                } elseif (stripos($foto['alt'], 'Pantai') !== false) {
                    $tag = "Pantai";
                } elseif (stripos($foto['alt'], 'Outbound') !== false || stripos($foto['alt'], 'Gathering') !== false) {
                    $tag = "Aktivitas";
                }
            ?>
                <div class="gallery-card" onclick="bukaModalLightbox('<?php echo $base_url . $foto['file']; ?>', '<?php echo $foto['alt']; ?>')">
                    <img src="<?php echo $base_url . $foto['file']; ?>" 
                         alt="<?php echo $foto['alt']; ?>" 
                         style="object-position: <?php echo !empty($foto['posisi']) ? $foto['posisi'] : 'center center'; ?>;">
                    <div class="gallery-card-info">
                        <span class="gallery-card-tag"><?php echo $tag; ?></span>
                        <h3 class="gallery-card-title"><?php echo $foto['alt']; ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php
// Muat komponen footer dan script
include_once $base_url . 'footer.php';
?>
