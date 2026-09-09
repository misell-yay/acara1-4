<?php
require_once __DIR__ . '/../Core/Model.php';

class Matakuliah extends Model {
    protected $table = 'matakuliah';

    // Method khusus untuk mengambil data matakuliah beserta nama prodinya
    public function allWithProdi() {
        $query = "
            SELECT mk.*, p.nama AS nama_prodi 
            FROM {$this->table} mk 
            LEFT JOIN prodi p ON mk.prodi_id = p.id
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}