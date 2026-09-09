<h1 class="mb-4">Tambah Mata Kuliah</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="/si-akademik/public/matakuliah" method="POST"> 
            <div class="mb-3">
                <label class="form-label">Kode MK</label>
                <input type="text" class="form-control" name="kode" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label class="form-label">SKS</label>
                <input type="number" class="form-control" name="sks" min="1" max="6" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select class="form-select" name="prodi_id" required>
                    <option value="">-- Pilih Prodi --</option>
                    <?php foreach ($data_prodi as $prodi) : ?>
                        <option value="<?= $prodi['id']; ?>"><?= $prodi['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/si-akademik/public/matakuliah" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>