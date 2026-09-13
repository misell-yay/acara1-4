<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Repositories/ProdiRepository.php';

class ProdiController extends Controller {
    private $repository;

    public function __construct(ProdiRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $data_prodi = $this->repository->all();
        $this->view('prodi/index', ['data_prodi' => $data_prodi]);
    }

    public function create() {
        $this->view('prodi/create');
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

        $this->repository->create($data); 
        $_SESSION['flash_message'] = "Data Program Studi berhasil ditambahkan!";
        $this->redirect('/prodi');
    }

    public function edit($id) {
        $prodi = $this->repository->find($id);
        $this->view('prodi/edit', ['prodi' => $prodi]);
    }

    public function update($id) {
        $data = [
            'kode' => $_POST['kode'] ?? '',
            'nama' => $_POST['nama'] ?? ''
        ];

        if (empty($data['kode']) || empty($data['nama'])) {
            $_SESSION['flash_message'] = "Gagal: Data tidak boleh kosong!";
            $this->redirect('/si-akademik/public/prodi/' . $id . '/edit');
            return;
        }

        $this->repository->update($id, $data);
        $_SESSION['flash_message'] = "Data Program Studi berhasil diubah!";
        $this->redirect('/prodi');
    }

    public function delete($id) {
        $this->repository->delete($id);
        $_SESSION['flash_message'] = "Data Program Studi berhasil dihapus!";
        $this->redirect('/prodi');
    }
}