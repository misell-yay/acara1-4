<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Tambah Data Mahasiswa</h1>
    <a href="/si-akademik/public/mahasiswa" class="btn btn-secondary">Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="/si-akademik/public/mahasiswa" method="POST"> 
            
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="prodi_id" class="form-label">Program Studi</label>
                <select class="form-select" id="prodi_id" name="prodi_id" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <?php foreach ($data_prodi as $prodi) : ?>
                        <option value="<?= $prodi['id']; ?>"><?= $prodi['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan (Tahun)</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" placeholder="Contoh: 2024" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Mahasiswa</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="aktif">Aktif</option>
                    <option value="cuti">Cuti</option>
                    <option value="lulus">Lulus</option>
                </select>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Data Mahasiswa</button>
            </div>
            
        </form>
    </div>
</div>