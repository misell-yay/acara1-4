<?php
class HomeController {
    public function index() {
        echo "<h1>Selamat Datang di Beranda SI-Akademik</h1>";
        // Link menggunakan format URL bersih
        echo "<a href='/si-akademik/public/mahasiswa'>Lihat Daftar Mahasiswa</a>";
    }
}