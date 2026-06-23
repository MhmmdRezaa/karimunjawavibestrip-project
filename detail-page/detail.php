<?php
$base_url = '../';
// Hubungkan komponen data konfigurasi
require_once $base_url . 'config.php';

// Validasi parameter ID paket
$package_id = isset($_GET['id']) ? trim(htmlspecialchars($_GET['id'])) : '';
$paket = null;

if (!empty($package_id)) {
    foreach ($paket_wisata as $p) {
        if ($p['id'] === $package_id) {
            $paket = $p;
            break;
        }
    }
}

// Judul halaman dinamis untuk SEO
$page_title = $paket ? $paket['nama'] . " - Karimunjawa Tour" : "Paket Tidak Ditemukan - Karimunjawa Tour";

// Muat komponen header visual
include_once $base_url . 'header.php';
?>

<div class="btn-back-container">
    <a href="<?php echo $base_url; ?>index.php#paket" class="btn-back">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Kembali ke Semua Paket
    </a>
</div>

<?php if ($paket): ?>
    <!-- Subpage Hero Banner -->
    <header class="detail-hero" style="background-image: url('<?php echo $base_url . $paket['gambar']; ?>');">
        <div class="detail-hero-content">
            <?php if (!empty($paket['badge'])): ?>
                <div class="promotional-badge <?php echo $paket['badge_class']; ?>" style="position: static; display: inline-block; margin-bottom: 12px; transform: none;">
                    <?php echo $paket['badge']; ?>
                </div>
            <?php endif; ?>
            <h1><?php echo $paket['nama']; ?></h1>
            <div class="detail-meta-badges">
                <span class="meta-badge">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <?php echo $paket['durasi']; ?>
                </span>
                <span class="meta-badge">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></svg>
                    Layanan Terbaik
                </span>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="container" style="padding-top: 30px;">
        <div class="detail-grid">
            
            <!-- Left Column: Content -->
            <div class="detail-main">
                
                <!-- Deskripsi Paket -->
                <section class="detail-section-card">
                    <h2>Tentang Paket</h2>
                    <p class="detail-desc-text"><?php echo $paket['detail_deskripsi']; ?></p>
                </section>

                <!-- Fasilitas Termasuk / Tidak Termasuk -->
                <section class="detail-section-card">
                    <h2>Fasilitas Detail</h2>
                    <div class="facilities-grid">
                        
                        <!-- Inclusions (Termasuk) -->
                        <div class="facility-list-box inclusions">
                            <h3>
                                <span style="background-color: rgba(28, 187, 180, 0.1); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px;">✓</span>
                                Termasuk (Inclusions)
                            </h3>
                            <ul class="custom-list list-inclusions">
                                <?php foreach ($paket['fasilitas'] as $fasilitas): ?>
                                    <li><?php echo $fasilitas; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <!-- Exclusions (Tidak Termasuk) -->
                        <div class="facility-list-box exclusions">
                            <h3>
                                <span style="background-color: rgba(224, 79, 103, 0.1); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px;">✗</span>
                                Tidak Termasuk (Exclusions)
                            </h3>
                            <ul class="custom-list list-exclusions">
                                <?php foreach ($paket['tidak_termasuk'] as $tidak): ?>
                                    <li><?php echo $tidak; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                    </div>
                </section>

                <!-- Rencana Perjalanan (Itinerary) -->
                <section class="detail-section-card">
                    <h2>Rencana Perjalanan</h2>
                    <div class="itinerary-timeline">
                        <?php foreach ($paket['itinerary'] as $index => $hari): ?>
                            <div class="timeline-item">
                                <div class="timeline-node"></div>
                                <div class="timeline-content">
                                    <div class="timeline-day"><?php echo $hari['hari']; ?></div>
                                    <h4 class="timeline-title"><?php echo $hari['judul']; ?></h4>
                                    <p class="timeline-desc"><?php echo $hari['kegiatan']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

            </div>

            <!-- Right Column: Sidebar / Booking -->
            <aside class="detail-sidebar">
                <div class="sticky-booking-card">
                    <div class="booking-card-price-box">
                        <div class="booking-card-price-label">Biaya Paket</div>
                        <div class="booking-card-price"><?php echo $paket['harga']; ?></div>
                    </div>
                    
                    <div class="booking-card-details">
                        <div class="booking-card-detail-item">
                            <span class="booking-card-detail-label">Durasi</span>
                            <span class="booking-card-detail-val"><?php echo $paket['durasi']; ?></span>
                        </div>
                        <div class="booking-card-detail-item">
                            <span class="booking-card-detail-label">Lokasi</span>
                            <span class="booking-card-detail-val">Karimunjawa</span>
                        </div>
                        <div class="booking-card-detail-item">
                            <span class="booking-card-detail-label">Metode Booking</span>
                            <span class="booking-card-detail-val">Deposit / DP</span>
                        </div>
                    </div>

                    <?php
                    // Bikin pesan custom WA terenkripsi yang estetik
                    $pesan_wa = "Halo Karimunjawa Tour, saya tertarik dengan *" . $paket['nama'] . "* (" . $paket['durasi'] . ").%0A%0AMohon info lebih lanjut mengenai ketersediaan tanggal dan tata cara pemesanan. Terima kasih!";
                    ?>
                    <a href="https://api.whatsapp.com/send?phone=<?php echo $nomor_whatsapp; ?>&text=<?php echo $pesan_wa; ?>" target="_blank" rel="noopener noreferrer" class="btn-booking-wa">
                        <!-- Ikon WhatsApp SVG -->
                        <svg viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.457L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.588 1.978 14.12 1.01 11.5 1.017c-5.439 0-9.863 4.372-9.867 9.8-.002 1.73.458 3.41 1.332 4.927l-.975 3.56 3.657-.96zm12.186-6.683c-.266-.134-1.58-.78-1.822-.867-.243-.088-.419-.133-.596.134-.176.265-.685.867-.839 1.045-.156.177-.311.2-.577.067-.266-.134-1.127-.417-2.148-1.329-.794-.709-1.329-1.587-1.485-1.854-.156-.265-.017-.409.117-.541.12-.12.266-.31.399-.464.133-.155.177-.266.266-.443.089-.177.044-.332-.022-.465-.067-.134-.596-1.439-.817-1.97-.215-.519-.432-.447-.597-.456-.153-.008-.33-.009-.507-.009-.177 0-.465.067-.708.333-.243.265-.929.907-.929 2.21 0 1.303.948 2.563 1.08 2.74.133.177 1.865 2.85 4.52 3.996.633.273 1.127.436 1.513.559.636.202 1.213.174 1.67.106.509-.076 1.58-.646 1.801-1.24.22-.593.22-1.102.155-1.21-.067-.107-.243-.173-.509-.307z"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>

                    <div class="quick-help-box">
                        <div class="quick-help-title">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            Butuh Bantuan?
                        </div>
                        Silakan hubungi kami untuk kustomisasi paket, konsultasi jadwal kapal, penginapan alternatif, atau penawaran khusus rombongan.
                    </div>
                </div>
            </aside>

        </div>
    </main>

<?php else: ?>
    <!-- Error Not Found State -->
    <main class="container" style="text-align: center; padding: 120px 16px;">
        <div style="font-size: 80px; color: var(--coral-red); margin-bottom: 24px;">☹</div>
        <h1 style="margin-bottom: 16px;">Paket Tidak Ditemukan</h1>
        <p style="margin-bottom: 32px; font-size: 16px; color: var(--medium-gray);">Maaf, paket wisata yang Anda cari tidak tersedia atau telah dihapus.</p>
        <a href="<?php echo $base_url; ?>index.php" class="btn-primary-large">Kembali ke Beranda</a>
    </main>
<?php endif; ?>

<?php
// Muat komponen footer dan script
include_once $base_url . 'footer.php';
?>
