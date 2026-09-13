<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Data Mahasiswa</h1>
        <a href="/si-akademik/public/mahasiswa" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/si-akademik/public/mahasiswa/<?= $mahasiswa['id']; ?>/update" method="POST">
                
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($mahasiswa['nim']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($mahasiswa['nama']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="prodi_id" class="form-label">Program Studi</label>
                    <select class="form-select" id="prodi_id" name="prodi_id" required>
                        <option value="">Pilih Program Studi</option>
                        <?php foreach ($data_prodi as $prodi): ?>
                            <option value="<?= $prodi['id']; ?>" <?= ($prodi['id'] == $mahasiswa['prodi_id']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($prodi['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan (Tahun)</label>
                    <input type="number" class="form-control" id="angkatan" name="angkatan" value="<?= htmlspecialchars($mahasiswa['angkatan']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Mahasiswa</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Aktif" <?= ($mahasiswa['status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                        <option value="Cuti" <?= ($mahasiswa['status'] == 'Cuti') ? 'selected' : ''; ?>>Cuti</option>
                        <option value="Lulus" <?= ($mahasiswa['status'] == 'Lulus') ? 'selected' : ''; ?>>Lulus</option>
                        <option value="Drop Out" <?= ($mahasiswa['status'] == 'Drop Out') ? 'selected' : ''; ?>>Drop Out</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>