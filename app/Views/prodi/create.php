<h1 class="mb-4">Tambah Program Studi</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- PASTIKAN TAG FORM INI MEMBUNGKUS SEMUA INPUT -->
        <form action="/si-akademik/public/prodi" method="POST"> 
            
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Prodi (Contoh: TI)</label>
                <!-- Atribut name="kode" WAJIB ADA -->
                <input type="text" class="form-control" id="kode" name="kode" required>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Program Studi</label>
                <!-- Atribut name="nama" WAJIB ADA -->
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="/si-akademik/public/prodi" class="btn btn-secondary">Kembali</a>
            </div>
            
        </form> <!-- TAG PENUTUP HARUS DI SINI (Di Bawah Tombol) -->
    </div>
</div>