<?php
require_once __DIR__ . '/../Models/Prodi.php';
class ProdiController {
    private $model;
    public function __construct() {
        $this->model = new Prodi();
    }
    public function index() {
        $data_prodi = $this->model->all();
        $contentView = __DIR__ . '/../Views/prodi/index.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }
    public function create() {
        $contentView = __DIR__ . '/../Views/prodi/create.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }
   public function store() {
        $data = [
            'kode' => $_POST['kode'] ?? '',
            'nama' => $_POST['nama'] ?? ''
        ];
        if (empty($data['kode']) || empty($data['nama'])) {
            echo "<script>
                    alert('Data tidak boleh kosong! Pastikan form terisi dengan benar.');
                    window.history.back();
                  </script>";
            exit();
        }
        $this->model->create($data); 
        $_SESSION['flash_message'] = "Data Program Studi berhasil ditambahkan!";
        header("Location: /si-akademik/public/prodi");
        exit();
    }
    public function delete($id) {
        $this->model->delete($id);
        $_SESSION['flash_message'] = "Data Program Studi berhasil dihapus!";
        header("Location: /si-akademik/public/prodi");
        exit();
    }
}