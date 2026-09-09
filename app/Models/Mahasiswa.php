<?php
class MahasiswaModel {
    private $id;
    private $nim;
    private $nama;
    private $prodi_id;
    private $angkatan;
    private $status;
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNim() { return $this->nim; }
    public function setNim($nim) {
        if (!is_numeric($nim)) {
            throw new Exception("NIM harus berupa angka!");
        }
        $this->nim = $nim;
    }
    public function getNama() { return $this->nama; }
    public function setNama($nama) {
        if (empty(trim($nama))) {
            throw new Exception("Nama mahasiswa tidak boleh kosong!");
        }
        $this->nama = $nama;
    }
    public function getProdiId() { return $this->prodi_id; }
    public function setProdiId($prodi_id) { $this->prodi_id = $prodi_id; }

    public function getAngkatan() { return $this->angkatan; }
    public function setAngkatan($angkatan) { $this->angkatan = $angkatan; }
    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
}