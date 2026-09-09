<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Mata Kuliah</h1>
    <a href="/si-akademik/public/matakuliah/create" class="btn btn-primary">Tambah Mata Kuliah</a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Program Studi</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_matakuliah as $mk) : ?>
        <tr>
            <td><?= $mk['kode']; ?></td>
            <td><?= $mk['nama']; ?></td>
            <td><?= $mk['sks']; ?></td>
            <td><?= $mk['nama_prodi']; ?></td>
            <td>
                <form action="/si-akademik/public/matakuliah/<?= $mk['id']; ?>/delete" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');">
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>