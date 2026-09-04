<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Mahasiswa</h1>
    <a href="index.php?page=create" class="btn btn-primary">Tambah Mahasiswa</a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th> <!-- Tambahan Kolom Angkatan -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $mhs->getNim(); ?></td>
            <td><?= $mhs->getNama(); ?></td>
            <td><?= $mhs->getProdi(); ?></td>
            
            <!-- Memanggil method baru getAngkatan() dari class Mahasiswa -->
            <td><?= $mhs->getAngkatan(); ?></td> 
            
            <td>
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>