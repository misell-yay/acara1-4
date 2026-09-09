<?php
// Wajib memanggil Core Model agar bisa mewarisi fitur CRUD
require_once __DIR__ . '/../Core/Model.php';

class Prodi extends Model {
    // Memberi tahu Core Model bahwa class ini terhubung ke tabel 'prodi'
    protected $table = 'prodi'; 
}