<?php
class Database {
    private static $instance = null;
    private $conn;
    private function __construct() {
        $host = 'localhost';
        $db_name = 'si_akademik';
        $username = 'root';
        $password = '';
        try {
            $this->conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->conn;
    }
}