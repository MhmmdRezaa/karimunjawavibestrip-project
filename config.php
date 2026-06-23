<?php
// config.php
$nomor_whatsapp = "62895361870926"; // Ganti dengan nomor WA operasional Anda

$paket_wisata = [
    [
        "id" => "snorkeling-3h2m",
        "nama" => "Paket Snorkeling 3H2M",
        "deskripsi" => "Open trip seru menjelajahi terumbu karang indah dan berenang bersama hiu penjinak.",
        "harga" => "Rp 950.000 / pax",
        "gambar" => "assets/images/paket-snorkeling.jpg",
        "badge" => "Hemat 20%",
        "badge_class" => "",
        "durasi" => "3 Hari 2 Malam",
        "detail_deskripsi" => "Nikmati petualangan laut tak terlupakan di Karimunjawa. Paket snorkeling ini dirancang khusus untuk Anda pecinta dunia bawah laut. Kita akan menjelajahi terumbu karang eksotis di berbagai pulau, bermain dengan ikan warna-warni, serta mengunjungi penangkaran hiu yang menegangkan sekaligus seru.",
        "fasilitas" => [
            "Tiket Kapal Express Bahari (Jepara - Karimunjawa PP)",
            "Transportasi lokal di Karimunjawa (Motor/Mobil)",
            "Penginapan AC (1 Kamar 2 Orang)",
            "Makan prasmanan 6 kali (termasuk BBQ bakar ikan di pulau)",
            "Sewa kapal wisata untuk snorkeling & island hopping",
            "Tiket masuk objek wisata dan retribusi pelabuhan",
            "Alat snorkeling lengkap (Fin, Masker, Snorkel, Life Jacket)",
            "Dokumentasi foto bawah air (GoPro) & udara (Drone opsional)",
            "Tour Guide bersertifikat HPI (Himpunan Pramuwisata Indonesia)",
            "P3K & Asuransi penyeberangan kapal"
        ],
        "tidak_termasuk" => [
            "Transportasi dari kota asal ke Pelabuhan Kartini Jepara",
            "Pengeluaran pribadi (laundry, jajan, mini bar)",
            "Tips Guide & Driver (sukarela)"
        ],
        "itinerary" => [
            [
                "hari" => "Hari 1",
                "judul" => "Kedatangan & Sunset Pantai Tanjung Gelam",
                "kegiatan" => "Penjemputan di Pelabuhan Karimunjawa setelah kapal bersandar, check-in penginapan dan makan siang prasmanan. Perjalanan darat menuju Bukit Love untuk berfoto dengan lanskap pulau dari ketinggian, lalu menuju Pantai Tanjung Gelam untuk menikmati kelapa muda dan menyaksikan matahari terbenam yang romantis di bawah pohon kelapa miring yang ikonik. Kembali ke penginapan, makan malam prasmanan, dan acara bebas."
            ],
            [
                "hari" => "Hari 2",
                "judul" => "Petualangan Snorkeling & BBQ di Pulau",
                "kegiatan" => "Makan pagi di penginapan, menuju dermaga wisata untuk naik kapal snorkeling. Spot pertama adalah snorkeling di Pulau Menjangan Kecil melihat terumbu karang indah dan nemo. Dilanjutkan makan siang BBQ ikan bakar segar di Pulau Cemara Kecil/Geleang yang berpasir putih bersih. Setelah makan siang, snorkeling di Karang Gosong / Gosong Cemara. Sore hari mengunjungi Penangkaran Hiu di Pulau Menjangan Besar untuk berenang bersama hiu jinak (opsional). Kembali ke darat, makan malam, dan belanja oleh-oleh."
            ],
            [
                "hari" => "Hari 3",
                "judul" => "Check-out & Kepulangan",
                "kegiatan" => "Makan pagi di penginapan and check-out. Rombongan ditransfer ke Pelabuhan Karimunjawa untuk melakukan penyeberangan kapal Express Bahari kembali ke Pelabuhan Kartini Jepara. Tour selesai dengan kenangan indah."
            ]
        ]
    ],
    [
        "id" => "private-honeymoon",
        "nama" => "Private Honeymoon",
        "deskripsi" => "Momen romantis privat di pulau terpencil dengan fasilitas premium khusus Anda dan pasangan.",
        "harga" => "Rp 3.500.000 / psg",
        "gambar" => "assets/images/paket-honeymoon.jpg",
        "badge" => "Terpopuler",
        "badge_class" => "orange",
        "durasi" => "3 Hari 2 Malam (Privat)",
        "detail_deskripsi" => "Ciptakan kenangan terindah bersama pasangan dalam paket bulan madu romantis privat kami. Layanan premium dari penjemputan hingga kepulangan, termasuk dekorasi kamar romantis, candle light dinner di tepi pantai berpasir putih, dan tour perahu privat untuk menjaga kenyamanan privasi Anda berdua.",
        "fasilitas" => [
            "Tiket Kapal Express Bahari Kelas VIP (Jepara - Karimunjawa PP)",
            "Transportasi privat mobil AC selama di Karimunjawa",
            "Resort / Hotel romantis tepi pantai pilihan dengan dekorasi honeymoon",
            "Private trip kapal wisata khusus untuk snorkeling & island hopping",
            "Makan romantis (1x Romantic Candlelight Dinner di pantai)",
            "Makan prasmanan/ala carte 6 kali (termasuk BBQ privat di pulau)",
            "Tiket masuk semua objek wisata & retribusi daerah",
            "Alat snorkeling lengkap berkualitas untuk 2 orang",
            "Dokumentasi foto & video profesional (GoPro & Mirrorless)",
            "Dokumentasi udara (Drone) gratis untuk momen romantis Anda",
            "Private Tour Guide HPI ramah dan profesional"
        ],
        "tidak_termasuk" => [
            "Tiket perjalanan dari kota asal ke Jepara",
            "Pengeluaran pribadi & belanja souvenir",
            "Tips Guide & Driver (sukarela)"
        ],
        "itinerary" => [
            [
                "hari" => "Hari 1",
                "judul" => "Welcome Drink, Check-in & Romantic Sunset",
                "kegiatan" => "Sambutan welcome drink di dermaga Karimunjawa, dilanjutkan transfer privat ke resort pantai pilihan. Check-in dan istirahat menikmati keindahan resort yang dihias romantis. Sore hari, perjalanan privat ke Pantai Tanjung Gelam untuk foto berdua dengan latar belakang matahari terbenam. Kembali ke resort untuk istirahat."
            ],
            [
                "hari" => "Hari 2",
                "judul" => "Private Island Snorkeling & Candle Light Dinner",
                "kegiatan" => "Makan pagi di resort, lalu naik private boat dari dermaga resort. Snorkeling intim di spot Nemo pulau terpencil yang sepi pengunjung, dilanjutkan makan siang BBQ privat di pantai pasir putih berdua dibantu kru guide kami. Sore hari, foto romantis di gosong pasir putih di tengah laut. Malam hari: Romantic Candle Light Dinner di tepi pantai dengan iringan deburan ombak dan cahaya lilin/lentera."
            ],
            [
                "hari" => "Hari 3",
                "judul" => "Foto Bukit Love & Kepulangan VIP",
                "kegiatan" => "Sarapan pagi di resort dan check-out. Mengunjungi spot foto romantis Bukit Love / Bukit Joko Tuwo sebelum transfer privat menuju Pelabuhan Karimunjawa. Penyeberangan kapal Express VIP kembali ke Pelabuhan Kartini Jepara. Tour berakhir manis."
            ]
        ]
    ],
    [
        "id" => "family-gathering",
        "nama" => "Family Gathering Custom",
        "deskripsi" => "Paket fleksibel yang dirancang khusus untuk kenyamanan liburan keluarga besar atau instansi Anda.",
        "harga" => "Harga Menyesuaikan",
        "gambar" => "assets/images/paket-family.jpg",
        "badge" => "",
        "badge_class" => "",
        "durasi" => "Customizable",
        "detail_deskripsi" => "Menyatukan keluarga besar atau rekan kerja dalam petualangan seru dan mengakrabkan di Karimunjawa. Kami merancang aktivitas outbound/fun games ringan di pantai, island hopping dengan kapal besar yang nyaman, serta pesta bakar ikan segar untuk menciptakan atmosfer kebersamaan yang hangat.",
        "fasilitas" => [
            "Tiket Kapal Express Bahari / Kapal Cepat Ferry PP (Jepara - Karimunjawa)",
            "Transportasi bus mini / mobil wisata AC di Karimunjawa (tidak digabung grup lain)",
            "Pilihan Hotel / Resort berkapasitas besar sesuai anggaran kelompok",
            "Konsumsi prasmanan lengkap (bisa request menu khusus anak-anak/pantangan)",
            "Kapal wisata besar khusus untuk rombongan gathering Anda",
            "Fun Games & Outbound Ringan di pantai (termasuk MC & properti games)",
            "Dokumentasi dokumenter lengkap (Foto, Video, & Drone)",
            "Banner / Spanduk Gathering desain khusus gratis",
            "P3K Lengkap & Asuransi Penyeberangan",
            "Koordinator tour & Guide bersertifikat HPI siap melayani 24 jam"
        ],
        "tidak_termasuk" => [
            "Transportasi bus/mobil dari kota asal menuju Jepara",
            "Pengeluaran pribadi & tip opsional"
        ],
        "itinerary" => [
            [
                "hari" => "Hari 1",
                "judul" => "Penyambutan, Fun Gathering & Sunset Dinner",
                "kegiatan" => "Penjemputan rombongan di Pelabuhan Karimunjawa dengan armada privat. Check-in penginapan, pembagian kamar, dan makan siang prasmanan. Sore hari menuju pantai pasir putih untuk acara Fun Games / Outbound ringan yang dirancang untuk membangun kebersamaan. Makan malam prasmanan bersama dengan hiburan live music akustik (opsional)."
            ],
            [
                "hari" => "Hari 2",
                "judul" => "Island Hopping, Snorkeling Masal & Pesta BBQ",
                "kegiatan" => "Makan pagi di penginapan, lalu menuju dermaga untuk naik kapal wisata khusus rombongan. Snorkeling bersama di spot karang Menjangan Kecil / Pulau Tengah. Sanding & istirahat di Pulau Cemara/Pulau Cilik untuk menikmati makan siang BBQ ikan bakar segar ala prasmanan pantai. Foto bersama menggunakan spanduk gathering di hamparan pasir putih bersih. Kembali ke darat, bersih-bersih diri, lalu makan malam dan sesi ramah tamah rombongan."
            ],
            [
                "hari" => "Hari 3",
                "judul" => "Belanja Oleh-oleh & Check-out",
                "kegiatan" => "Sarapan pagi dan persiapan check-out. Belanja suvenir khas Karimunjawa (kaos, kerajinan kayu dewandaru, kerupuk atom) sebelum transfer rombongan menuju pelabuhan Karimunjawa. Perjalanan laut kembali ke Jepara. Semoga perjalanan ini mempererat silaturahmi!"
            ]
        ]
    ]
];

// DATA GALERI: Sudah disisipkan optimasi fokus vertikal untuk gambar portrait Pantai Tanjung Gelam
$galeri_foto = [
    [
        "file" => "assets/images/galeri-1.jpg", 
        "alt" => "Pantai Tanjung Gelam", 
        "posisi" => "center top" // Mengunci bagian atas foto agar pohon kelapa terlihat utuh & eye-catching
    ],
    [
        "file" => "assets/images/galeri-2.jpg", 
        "alt" => "Pulau Menjangan Kecil", 
        "posisi" => "center center"
    ],
    [
        "file" => "assets/images/galeri-3.jpg", 
        "alt" => "Bukit Love Karimunjawa", 
        "posisi" => "left bottom" // Mengunci plang nama agar teks tidak terpotong menjadi "KA"
    ],
    [
        "file" => "assets/images/galeri-4.jpg", 
        "alt" => "Penangkaran Hiu", 
        "posisi" => "center center"
    ],
    [
        "file" => "assets/images/paket-snorkeling.jpg", 
        "alt" => "Spot Terumbu Karang Menawan", 
        "posisi" => "center center"
    ],
    [
        "file" => "assets/images/paket-honeymoon.jpg", 
        "alt" => "Resort Tepi Pantai Romantis", 
        "posisi" => "center center"
    ],
    [
        "file" => "assets/images/paket-family.jpg", 
        "alt" => "Keseruan Outbound di Pantai", 
        "posisi" => "center center"
    ]
];

// DATA TESTIMONI PELANGGAN (Dinamis dari reviews.json)
$reviews_file = __DIR__ . '/reviews.json';
if (file_exists($reviews_file)) {
    $testimoni_pelanggan = json_decode(file_get_contents($reviews_file), true);
    if (!is_array($testimoni_pelanggan)) {
        $testimoni_pelanggan = [];
    }
} else {
    $testimoni_pelanggan = [
        [
            "nama" => "Andi Wijaya", 
            "asal" => "Semarang", 
            "bintang" => 5, 
            "ulasan" => "Pelayanan ramah banget! Tour guidenya tahu spot snorkeling terbaik yang sepi pengunjung.",
            "tanggal" => "2026-06-18"
        ],
        [
            "nama" => "Siti Rahma", 
            "asal" => "Jakarta", 
            "bintang" => 5, 
            "ulasan" => "Honeymoon di sini berkesan banget. Fasilitas kapal privatnya bersih dan makan siangnya enak.",
            "tanggal" => "2026-06-18"
        ],
        [
            "nama" => "Rian Utama", 
            "asal" => "Surabaya", 
            "bintang" => 5, 
            "ulasan" => "Sangat puas dengan paket family gathering-nya. Semua jadwal tepat waktu dan fleksibel.",
            "tanggal" => "2026-06-18"
        ]
    ];
    file_put_contents($reviews_file, json_encode($testimoni_pelanggan, JSON_PRETTY_PRINT));
}
?>