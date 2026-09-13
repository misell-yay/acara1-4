<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';
class MahasiswaController extends Controller {
    private $repository;
    public function __construct(MahasiswaRepository $repository) {
        $this->repository = $repository;
    }
    public function index() {
        $keyword = $_GET['keyword'] ?? '';
        $data_mahasiswa = !empty($keyword) ? $this->repository->search($keyword) : $this->repository->allWithProdi();
        $this->view('mahasiswa/index', ['data_mahasiswa' => $data_mahasiswa]);
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
            if (empty($data['nama']) || empty($data['nim'])) {
                throw new Exception("Nama dan NIM tidak boleh kosong!");
            }
            $this->repository->create($data);
            $_SESSION['flash_message'] = "Data mahasiswa berhasil ditambahkan!";
        } catch (Exception $e) {
            $_SESSION['flash_message'] = "Gagal: " . $e->getMessage();
        }
        $this->redirect('/mahasiswa');
    }
    public function delete($id) {
        $this->repository->delete($id);
        $_SESSION['flash_message'] = "Data mahasiswa berhasil dihapus!";
        $this->redirect('/mahasiswa');
    }
    public function create() {
        require_once __DIR__ . '/../Models/Prodi.php';
        $prodiModel = new Prodi();
        $data_prodi = $prodiModel->all();
        $this->view('mahasiswa/create', ['data_prodi' => $data_prodi]);
    }
   public function edit($id) {
        $mahasiswa = $this->repository->find($id);
        require_once __DIR__ . '/../Models/Prodi.php';
        $prodiModel = new Prodi();
        $data_prodi = $prodiModel->all();
        $this->view('mahasiswa/edit', [
            'mahasiswa'  => $mahasiswa,
            'data_prodi' => $data_prodi
        ]);
    }
    public function update($id) {
        try {
            $data = [
                'nim'      => $_POST['nim'] ?? '',
                'nama'     => $_POST['nama'] ?? '',
                'prodi_id' => $_POST['prodi_id'] ?? '',
                'angkatan' => $_POST['angkatan'] ?? '',
                'status'   => $_POST['status'] ?? 'aktif'
            ];
            $this->repository->update($id, $data);

            $_SESSION['flash_message'] = "Data mahasiswa berhasil diubah!";
        } catch (Exception $e) {
            $_SESSION['flash_message'] = "Gagal mengubah data: " . $e->getMessage();
        }

        $this->redirect('/mahasiswa');
    }
}
