<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Program Studi Akademik</h1>
    <h2>Teks Contoh</h2>
    <a href="/si-akademik/public/prodi/create" class="btn btn-primary">Tambah Prodi</a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th width="5%">No</th>
            <th width="15%">Kode</th>
            <th>Nama Program Studi</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        foreach ($data_prodi as $prodi) : 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $prodi['kode']; ?></td>
            <td><?= $prodi['nama']; ?></td>
            <td>
                <!-- Tombol Edit (bisa dikembangkan nanti) -->
                <a href="/si-akademik/public/prodi/<?= $prodi['id']; ?>/edit" class="btn btn-sm btn-warning">Edit</a>
                
                <!-- Form Hapus dengan Konfirmasi JS -->
                <form action="/si-akademik/public/prodi/<?= $prodi['id']; ?>/delete" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Prodi <?= $prodi['nama']; ?>?');">
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>