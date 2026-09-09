<?php
require_once __DIR__ . '/../../config/database.php';

class Model {
    protected $db;
    protected $table; // Nama tabel akan diisi oleh class anaknya

    public function __construct() {
        // Ubah dari Database::getConnection() menjadi menggunakan getInstance()
        $this->db = Database::getInstance()->getConnection();
    }

    public function all() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $stmt = $this->db->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        return $stmt->execute(array_values($data));
    }
    public function update($id, $data) {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= "$key = ?, ";
        }
        $fields = rtrim($fields, ", ");
        $stmt = $this->db->prepare("UPDATE {$this->table} SET $fields WHERE id = ?");
        $values = array_values($data);
        $values[] = $id;
        return $stmt->execute($values);
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}