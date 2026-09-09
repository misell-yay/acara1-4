<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Mahasiswa</h1>
    <a href="/si-akademik/public/mahasiswa/create" class="btn btn-primary">Tambah Mahasiswa</a>
</div>

<form action="/si-akademik/public/mahasiswa" method="GET" class="input-group mb-3">
    <input type="text" class="form-control" name="keyword" placeholder="Cari berdasarkan Nama atau NIM..." value="<?= $_GET['keyword'] ?? ''; ?>">
    <button class="btn btn-outline-primary" type="submit">Cari</button>
    <?php if (!empty($_GET['keyword'])): ?>
        <a href="/si-akademik/public/mahasiswa" class="btn btn-outline-secondary">Reset</a>
    <?php endif; ?>
</form>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $mhs['nim']; ?></td>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['nama_prodi']; ?></td>
            <td><?= $mhs['angkatan']; ?></td> 
            <td>
                <?php 
                    $badgeClass = 'bg-success';
                    
                    if ($mhs['status'] === 'cuti') {
                        $badgeClass = 'bg-warning text-dark'; // Kuning
                    } elseif ($mhs['status'] === 'lulus') {
                        $badgeClass = 'bg-info text-dark'; // Biru Muda
                    }
                ?>
                <span class="badge <?= $badgeClass; ?>"><?= ucfirst($mhs['status']); ?></span>
            </td>
            
            <td>
                <a href="/si-akademik/public/mahasiswa/<?= $mhs['id']; ?>/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/si-akademik/public/mahasiswa/<?= $mhs['id']; ?>/delete" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?');">
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>