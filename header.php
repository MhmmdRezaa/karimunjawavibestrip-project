<?php
if (!isset($base_url)) {
    $base_url = './';
}
?>
<!DOCTYPE html>
<html lang="id" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Karimunjawavibestrip'; ?></title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/assets/css/style.css'); ?>">
</head>
<body>

    <nav class="header-nav">
        <div class="nav-container">
            <div class="logo" style="cursor: pointer; display: flex; align-items: center; gap: 8px;" onclick="window.location.href='<?php echo $base_url; ?>index.php';">
                <img src="<?php echo $base_url; ?>assets/images/logo.png" alt="Karimunjawavibestrip Logo" class="logo-img">
                <span>Karimunjawavibestrip</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="<?php echo $base_url; ?>index.php">Home</a></li>
                
                <li class="nav-item dropdown">
                    <a href="<?php echo $base_url; ?>index.php#paket" class="dropdown-toggle">Paket Wisata ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $base_url; ?>index.php#paket">Semua Paket</a></li>
                        
                        <?php 
                        // Deklarasi global agar Intelephense VS Code tidak memunculkan garis merah
                        global $paket_wisata; 
                        
                        if (isset($paket_wisata) && is_array($paket_wisata)): 
                            foreach ($paket_wisata as $paket): 
                        ?>
                            <li><a href="<?php echo $base_url; ?>detail-page/detail.php?id=<?php echo $paket['id']; ?>"><?php echo $paket['nama']; ?></a></li>
                        <?php 
                            endforeach; 
                        endif; 
                        ?>
                    </ul>
                </li>
                <li class="nav-item"><a href="<?php echo $base_url; ?>galeri.php">Galeri</a></li>
                <li class="nav-item"><a href="<?php echo $base_url; ?>index.php#kontak">Hubungi Kami</a></li>
            </ul>
        </div>
    </nav>