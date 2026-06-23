<?php
$base_url = './';
// Hubungkan komponen data konfigurasi
require_once $base_url . 'config.php';

// Memproses input ulasan baru
$review_success = false;
$review_error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'tambah_ulasan') {
    $nama = isset($_POST['nama_review']) ? trim(htmlspecialchars($_POST['nama_review'])) : "";
    $asal = isset($_POST['asal_review']) ? trim(htmlspecialchars($_POST['asal_review'])) : "";
    $bintang = isset($_POST['bintang']) ? intval($_POST['bintang']) : 5;
    $ulasan = isset($_POST['ulasan_review']) ? trim(htmlspecialchars($_POST['ulasan_review'])) : "";

    if (!empty($nama) && !empty($ulasan) && $bintang >= 1 && $bintang <= 5) {
        $reviews_file = __DIR__ . '/reviews.json';
        $current_reviews = [];
        if (file_exists($reviews_file)) {
            $json_data = file_get_contents($reviews_file);
            $current_reviews = json_decode($json_data, true);
            if (!is_array($current_reviews)) {
                $current_reviews = [];
            }
        }

        $new_review = [
            "nama" => $nama,
            "asal" => $asal,
            "bintang" => $bintang,
            "ulasan" => $ulasan,
            "tanggal" => date('Y-m-d')
        ];

        // Tambahkan ulasan baru ke bagian teratas list
        array_unshift($current_reviews, $new_review);

        if (file_put_contents($reviews_file, json_encode($current_reviews, JSON_PRETTY_PRINT))) {
            // Redirect untuk menghindari resubmission saat refresh
            header("Location: index.php?status=success#testimoni");
            exit;
        } else {
            $review_error = "Gagal menyimpan ulasan. Silakan coba lagi.";
        }
    } else {
        $review_error = "Harap lengkapi semua kolom dan bintang rating.";
    }
}

// Muat komponen header visual
include_once $base_url . 'header.php';
?>

<header class="hero" id="home">
    <div class="hero-content">
        <h1>Jelajahi Surga Tropis Karimunjawa</h1>
        <p>Nikmati petualangan laut tak verlupakan dengan layanan tour guide profesional dan terpercaya.</p>
        <a href="#paket" class="btn-primary-large">Lihat Paket Wisata</a>
    </div>
</header>

<section id="paket" class="container">
    <h2>Paket Wisata Pilihan</h2>
    <div class="grid-cards">

        <?php foreach ($paket_wisata as $paket): ?>
            <div class="package-card">
                <?php if (!empty($paket['badge'])): ?>
                    <div class="promotional-badge <?php echo $paket['badge_class']; ?>">
                        <?php echo $paket['badge']; ?>
                    </div>
                <?php endif; ?>

                <div class="card-image-wrapper">
                    <img src="<?php echo $base_url . $paket['gambar']; ?>" alt="<?php echo $paket['nama']; ?>">
                    <div class="image-overlay"><?php echo $paket['nama']; ?></div>
                </div>
                <div class="card-body">
                    <p class="card-description"><?php echo $paket['deskripsi']; ?></p>
                    <div class="price-container">
                        <div class="price-label">
                            <?php echo ($paket['harga'] === 'Harga Menyesuaikan') ? 'Hubungi Kami' : 'Mulai dari'; ?>
                        </div>
                        <div class="price-amount"><?php echo $paket['harga']; ?></div>
                    </div>
                    <a href="<?php echo $base_url; ?>detail-page/detail.php?id=<?php echo $paket['id']; ?>" class="btn-secondary">
                        <?php echo ($paket['harga'] === 'Harga Menyesuaikan') ? 'Minta Penawaran' : 'Detail Paket'; ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<!-- SEKSI GALERI: Menggunakan CSS Grid dengan Aspect Ratio 16:9 (Lanskap Seragam) -->
<section id="galeri" class="container">
    <h2>Keindahan Karimunjawa</h2>
    <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px; margin-top: 32px;">
        <?php if (isset($galeri_foto) && is_array($galeri_foto)): ?>
            <?php foreach (array_slice($galeri_foto, 0, 4) as $foto): ?>
                <!-- Mengunci bentuk kontainer kotak menjadi lanskap persegi panjang (16:9) -->
                <div style="cursor: pointer; overflow: hidden; height: auto; aspect-ratio: 16 / 9; border: 1px solid var(--very-light-gray);"
                    onclick="bukaModalLightbox('<?php echo $foto['file']; ?>', '<?php echo $foto['alt']; ?>')">
                    <!-- Menggunakan object-fit: cover dan memanggil koordinat posisi dari config.php secara dinamis -->
                    <img src="<?php echo $base_url . $foto['file']; ?>" alt="<?php echo $foto['alt']; ?>"
                        style="width: 100%; height: 100%; object-fit: cover; object-position: <?php echo !empty($foto['posisi']) ? $foto['posisi'] : 'center center'; ?>; transition: transform 0.3s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div style="text-align: center; margin-top: 32px;">
        <a href="galeri.php" class="btn-secondary">Lihat Semua Foto (Galeri)</a>
    </div>
</section>

<section id="testimoni"
    style="background-color: #F9F9F9; border-top: 1px solid var(--very-light-gray); border-bottom: 1px solid var(--very-light-gray);">
    <div class="container" style="max-width: 900px;">
        <h2>Apa Kata Wisatawan?</h2>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="review-alert review-alert-success"
                style="max-width: 600px; margin: 0 auto 20px auto; text-align: center;">
                <strong>Berhasil!</strong> Ulasan Anda telah berhasil disimpan dan diterbitkan.
            </div>
        <?php endif; ?>

        <?php if (!empty($review_error)): ?>
            <div class="review-alert review-alert-danger"
                style="max-width: 600px; margin: 0 auto 20px auto; text-align: center;">
                <strong>Error:</strong> <?php echo $review_error; ?>
            </div>
        <?php endif; ?>

        <?php
        // Hitung Rating Rata-rata
        $total_bintang = 0;
        $jumlah_ulasan = count($testimoni_pelanggan);
        foreach ($testimoni_pelanggan as $testi) {
            $total_bintang += isset($testi['bintang']) ? intval($testi['bintang']) : 5;
        }
        $rating_rata_rata = $jumlah_ulasan > 0 ? round($total_bintang / $jumlah_ulasan, 1) : 0;
        $bintang_bulat = round($rating_rata_rata);
        ?>

        <!-- Summary Rating -->
        <div class="rating-summary-wrapper">
            <div class="rating-summary-number"><?php echo $rating_rata_rata; ?></div>
            <div class="rating-summary-stars">
                <div class="stars-gold">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $bintang_bulat) {
                            echo "&#9733;";
                        } else {
                            echo "<span class='stars-gray'>&#9733;</span>";
                        }
                    }
                    ?>
                </div>
                <div style="font-size: 14px; color: var(--medium-gray);">
                    Berdasarkan <?php echo $jumlah_ulasan; ?> ulasan wisatawan
                </div>
            </div>
        </div>

        <!-- Grid Ulasan Wisatawan -->
        <div class="reviews-grid-list">
            <?php if (isset($testimoni_pelanggan) && is_array($testimoni_pelanggan)): ?>
                <?php foreach ($testimoni_pelanggan as $idx => $testi):
                    $is_hidden = $idx >= 3;
                    $hidden_class = $is_hidden ? 'review-item-card-hidden' : '';
                    $hidden_style = $is_hidden ? 'display: none;' : '';
                    ?>
                    <div class="review-item-card <?php echo $hidden_class; ?>" style="<?php echo $hidden_style; ?>">
                        <div class="review-card-header">
                            <div class="review-card-stars">
                                <?php
                                $bintang_ulasan = isset($testi['bintang']) ? intval($testi['bintang']) : 5;
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $bintang_ulasan) {
                                        echo "&#9733;";
                                    } else {
                                        echo "<span class='stars-gray' style='color:#DDDDDD;'>&#9733;</span>";
                                    }
                                }
                                ?>
                            </div>
                            <div class="review-card-date">
                                <?php echo isset($testi['tanggal']) ? $testi['tanggal'] : date('Y-m-d'); ?>
                            </div>
                        </div>
                        <p class="review-card-text">"<?php echo $testi['ulasan']; ?>"</p>

                        <div
                            style="display: flex; align-items: center; gap: 12px; margin-top: 12px; border-top: 1px solid #F0F0F0; padding-top: 12px;">
                            <div class="review-avatar-circle"
                                style="width: 32px; height: 32px; border-radius: 50%; background-color: var(--primary-teal); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 13px; text-transform: uppercase; flex-shrink: 0; box-shadow: 0 2px 4px rgba(28, 187, 180, 0.2);">
                                <?php echo substr($testi['nama'], 0, 1); ?>
                            </div>
                            <div class="review-card-author">
                                <?php echo $testi['nama']; ?> <span
                                    style="display: block; font-size: 12px; font-weight: normal; color: var(--light-gray); margin-top: 2px;"><?php echo $testi['asal']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Tombol Aksi Ulasan (Lihat Semua & Tulis Baru) -->
        <div class="review-actions-container">
            <?php if ($jumlah_ulasan > 3): ?>
                <button id="toggleMoreReviewsBtn" class="btn-review-secondary" onclick="toggleMoreReviews()">Lihat Semua
                    Ulasan (<?php echo $jumlah_ulasan; ?>)</button>
            <?php endif; ?>
            <button id="toggleReviewBtn" class="btn-review-primary" onclick="toggleReviewForm()">Tulis Ulasan
                Baru</button>
        </div>

        <!-- Form Tambah Ulasan (Toggled) -->
        <div id="reviewFormContainer" class="review-form-box" style="display: none;">
            <h3 style="margin-bottom: 20px; border-bottom: 1px solid var(--very-light-gray); padding-bottom: 10px;">
                Berikan Ulasan Anda</h3>
            <form action="index.php" method="POST">
                <input type="hidden" name="action" value="tambah_ulasan">

                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label" for="nama_review">Nama Lengkap</label>
                    <input class="text-input" type="text" id="nama_review" name="nama_review"
                        placeholder="Contoh: Sarah Aulia" required style="width: 100%;">
                </div>

                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label" for="asal_review">Asal Kota</label>
                    <input class="text-input" type="text" id="asal_review" name="asal_review"
                        placeholder="Contoh: Bandung" required style="width: 100%;">
                </div>

                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label">Rating Pelayanan</label>
                    <div class="rating-input-group">
                        <div class="star-rating-form">
                            <input type="radio" id="bintang5" name="bintang" value="5" required />
                            <label for="bintang5" title="Sangat Puas">&#9733;</label>
                            <input type="radio" id="bintang4" name="bintang" value="4" />
                            <label for="bintang4" title="Puas">&#9733;</label>
                            <input type="radio" id="bintang3" name="bintang" value="3" />
                            <label for="bintang3" title="Cukup Puas">&#9733;</label>
                            <input type="radio" id="bintang2" name="bintang" value="2" />
                            <label for="bintang2" title="Kurang Puas">&#9733;</label>
                            <input type="radio" id="bintang1" name="bintang" value="1" />
                            <label for="bintang1" title="Sangat Kecewa">&#9733;</label>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="form-label" for="ulasan_review">Komentar Ulasan</label>
                    <textarea class="text-input" id="ulasan_review" name="ulasan_review"
                        placeholder="Bagikan pengalaman Anda menggunakan jasa layanan kami..." required
                        style="width: 100%; height: 100px; resize: vertical; padding: 12px; font-family: Tahoma, sans-serif;"></textarea>
                </div>

                <div class="form-review-actions">
                    <button type="button" class="btn-review-secondary" onclick="toggleReviewForm()">Batal</button>
                    <button type="submit" class="btn-review-primary">Kirim Ulasan</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section id="kontak" class="booking-section">
    <div class="container">
        <h2>Konsultasi Liburan Anda</h2>
        <form class="form-grid" onsubmit="kirimKeWhatsApp(event)">
            <div class="form-group">
                <label class="form-label" for="nama">Nama Lengkap</label>
                <input class="text-input" type="text" id="nama" placeholder="Contoh: Budi Santoso" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="paket_pilihan">Pilih Paket</label>
                <select class="text-input" id="paket_pilihan" required style="height: 40px; padding: 0 12px;">
                    <option value="">-- Pilih Paket Wisata --</option>
                    <?php foreach ($paket_wisata as $paket): ?>
                        <option value="<?php echo $paket['nama']; ?>"><?php echo $paket['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary-large">Hubungi Tour Guide via WA</button>
            </div>
        </form>
    </div>
</section>

<?php
// Muat komponen footer dan script
include_once $base_url . 'footer.php';
?>