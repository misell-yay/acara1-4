<h1 class="mb-4">Tambah Data Mahasiswa</h1>

<!-- Action diarahkan ke routing MVC: index.php?page=store -->
<form action="index.php?page=store" method="POST"> 
  
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
  </div>
  
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
  </div>
  
  <div class="mb-3">
    <label for="prodi" class="form-label">Program Studi</label>
    <select class="form-select" id="prodi" name="prodi" required>
      <option value="" disabled selected>Pilih Program Studi...</option>
      <option value="Teknik Informatika">Teknik Informatika</option>
      <option value="Sistem Informasi">Sistem Informasi</option>
      <option value="Manajemen Informatika">Manajemen Informatika</option>
    </select>
  </div>
  
  <div class="mt-4">
    <button type="submit" class="btn btn-primary">Simpan Data</button>
    <!-- Link kembali diarahkan ke routing halaman utama -->
    <a href="index.php?page=index" class="btn btn-secondary">Kembali</a>
  </div>
  
</form>