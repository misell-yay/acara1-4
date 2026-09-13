<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Program Studi</h1>
        <a href="/si-akademik/public/prodi" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/si-akademik/public/prodi/<?= $prodi['id']; ?>/update" method="POST">
                
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Prodi</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= htmlspecialchars($prodi['kode']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Program Studi</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($prodi['nama']); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>