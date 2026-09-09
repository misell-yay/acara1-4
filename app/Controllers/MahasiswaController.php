<?php
require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';

class MahasiswaController {
    private $repository;

    // Constructor Injection untuk Repository
    public function __construct(MahasiswaRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $keyword = $_GET['keyword'] ?? '';
        if (!empty($keyword)) {
            $data_mahasiswa = $this->repository->search($keyword);
        } else {
            $data_mahasiswa = $this->repository->allWithProdi();
        }

        $contentView = __DIR__ . '/../Views/mahasiswa/index.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }

    public function store() {
        try {
            $data = [
                'nim'      => $_POST['nim'] ?? '',
                'nama'     => $_POST['nama'] ?? '',
                'prodi_id' => $_POST['prodi_id'] ?? '',
                'angkatan' => $_POST['angkatan'] ?? '',
                'status'   => $_POST['status'] ?? 'aktif'
            ];

            // Validasi sederhana langsung di controller
            if (empty($data['nim']) || empty($data['nama']) || !is_numeric($data['nim'])) {
                throw new Exception("NIM harus berupa angka dan Nama tidak boleh kosong!");
            }

            $this->repository->create($data);
            $_SESSION['flash_message'] = "Data mahasiswa berhasil ditambahkan!";
        } catch (Exception $e) {
            $_SESSION['flash_message'] = "Gagal: " . $e->getMessage();
        }

        header("Location: /si-akademik/public/mahasiswa");
        exit();
    }

    public function create() {
        // Memuat data prodi untuk pilihan dropdown di form
        require_once __DIR__ . '/../Models/Prodi.php';
        $prodiModel = new Prodi();
        $data_prodi = $prodiModel->all();
        
        $contentView = __DIR__ . '/../Views/mahasiswa/create.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }

    public function delete($id) {
        $this->repository->delete($id);
        $_SESSION['flash_message'] = "Data mahasiswa berhasil dihapus!";
        header("Location: /si-akademik/public/mahasiswa");
        exit();
    }
}