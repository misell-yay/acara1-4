<?php
require_once __DIR__ . '/../app/Models/Mahasiswa.php';
$page = $_GET['page'] ?? 'index';
if ($page === 'index') {
    $mhs1 = new Mahasiswa("2501001", "Budi Santoso", "Teknik Informatika");
    $mhs2 = new Mahasiswa("2501002", "Siti Aminah", "Sistem Informasi");
    $mhs3 = new Mahasiswa("2501003", "Andi Wijaya", "Manajemen Informatika");
    $data_mahasiswa = [$mhs1, $mhs2, $mhs3];
    $contentView = __DIR__ . '/../app/Views/mahasiswa/index.php';
    require_once __DIR__ . '/../app/Views/layouts/main.php';

} 
elseif ($page === 'create') {
    
    $contentView = __DIR__ . '/../app/Views/mahasiswa/create.php';
    require_once __DIR__ . '/../app/Views/layouts/main.php';

} 
elseif ($page === 'store') {
    echo "<h1>Data berhasil ditangkap!</h1>";
    echo "NIM: " . $_POST['nim'] . "<br>";
    echo "Nama: " . $_POST['nama'] . "<br>";
    echo "Prodi: " . $_POST['prodi'] . "<br><br>";
    echo "<a href='index.php?page=index'>Kembali ke Daftar</a>";

} 
else {
    echo "<h1>404 Not Found</h1>";
}
?>