<?php
require_once __DIR__ . '/../../config/database.php';

class MahasiswaRepository {
    private $db;

    // Constructor Injection untuk Database
    public function __construct($db) {
        $this->db = $db;
    }

    public function allWithProdi() {
        $query = "SELECT m.*, p.nama AS nama_prodi FROM mahasiswa m LEFT JOIN prodi p ON m.prodi_id = p.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO mahasiswa (nim, nama, prodi_id, angkatan, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            $data['nim'],
            $data['nama'],
            $data['prodi_id'],
            $data['angkatan'],
            $data['status']
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM mahasiswa WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    public function search($keyword) {
        $query = "SELECT m.*, p.nama AS nama_prodi FROM mahasiswa m LEFT JOIN prodi p ON m.prodi_id = p.id WHERE m.nim LIKE ? OR m.nama LIKE ?";
        $stmt = $this->db->prepare($query);
        $term = "%" . $keyword . "%";
        $stmt->execute([$term, $term]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id) {
        $query = "SELECT * FROM mahasiswa WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = "UPDATE mahasiswa SET nim = ?, nama = ?, prodi_id = ?, angkatan = ?, status = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            $data['nim'],
            $data['nama'],
            $data['prodi_id'],
            $data['angkatan'],
            $data['status'],
            $id
        ]);
    }
}