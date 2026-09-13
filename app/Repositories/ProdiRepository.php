<?php
class ProdiRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function all() {
        $query = "SELECT * FROM prodi";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = "SELECT * FROM prodi WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = "UPDATE prodi SET nama = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nama'], $id]);
    }
}