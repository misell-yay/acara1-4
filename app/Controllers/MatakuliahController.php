<?php
require_once __DIR__ . '/../Models/Matakuliah.php';
require_once __DIR__ . '/../Models/Prodi.php';
class MatakuliahController {
    private $model;
    public function __construct() {
        $this->model = new Matakuliah();
    }
    public function index() {
        $data_matakuliah = $this->model->allWithProdi();
        $contentView = __DIR__ . '/../Views/matakuliah/index.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }
    public function create() {
        $prodiModel = new Prodi();
        $data_prodi = $prodiModel->all();
        $contentView = __DIR__ . '/../Views/matakuliah/create.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }
    public function store() {
        $data = [
            'kode'     => $_POST['kode'] ?? '',
            'nama'     => $_POST['nama'] ?? '',
            'sks'      => $_POST['sks'] ?? '',
            'prodi_id' => $_POST['prodi_id'] ?? ''
        ];
        if (empty($data['kode']) || empty($data['nama']) || empty($data['sks']) || empty($data['prodi_id'])) {
            echo "<script>alert('Semua kolom wajib diisi!'); window.history.back();</script>";
            exit();
        }
        $this->model->create($data);
        $_SESSION['flash_message'] = "Data Mata Kuliah berhasil ditambahkan!";
        header("Location: /si-akademik/public/matakuliah");
        exit();
    }
    public function delete($id) {
        $this->model->delete($id);
        $_SESSION['flash_message'] = "Data Mata Kuliah berhasil dihapus!";
        header("Location: /si-akademik/public/matakuliah");
        exit();
    }
}