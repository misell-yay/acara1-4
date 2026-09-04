<?php
// 1. Memanggil Header (Berisi tag <head> dan link CSS Bootstrap)
require_once __DIR__ . '/../partials/header.php';

// 2. Memanggil Navbar (Berisi menu navigasi)
require_once __DIR__ . '/../partials/navbar.php';
?>

<!-- 3. Membungkus konten utama dengan Container Bootstrap -->
<div class="container mt-4">
    <?php 
    // Variabel $contentView ini dikirim dari public/index.php
    // Isinya bisa berupa file index.php (tabel) ATAU create.php (form)
    if (isset($contentView)) {
        require_once $contentView; 
    }
    ?>
</div>

<?php
// 4. Memanggil Footer (Berisi tag penutup </body></html> dan JS Bootstrap)
require_once __DIR__ . '/../partials/footer.php';
?>