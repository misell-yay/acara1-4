<?php
// Memanggil Header dan Navbar
require_once __DIR__ . '/../partials/header.php';

// Jangan tampilkan navbar jika sedang di halaman login
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (strpos($uri, '/login') === false) {
    require_once __DIR__ . '/../partials/navbar.php';
}
?>

<div class="container mt-4">
    <?php if (isset($_SESSION['flash_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['flash_message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
        unset($_SESSION['flash_message']); 
        ?>
    <?php endif; ?>
    <?php 
    // Menampilkan isi konten utama (Form/Tabel)
    if (isset($contentView)) {
        require_once $contentView; 
    }
    ?>
</div>

<?php
// Memanggil Footer
require_once __DIR__ . '/../partials/footer.php';
?>