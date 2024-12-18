<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Jenis Obat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Kadaluwarsa</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($obat as $o) : ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $o['nama_obat']; ?></td>
                            <td><?= $o['nama_jenis_obat']; ?></td>
                            <td><?= $o['harga']; ?></td>
                            <td><?= $o['stok']; ?></td>
                            <td><?= $o['tanggal_kadaluwarsa']; ?></td>
                            <td>
                                <a href="<?= base_url('obat/detailObat/') . $o['id']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                    <i class="fas fa-fw fa-search"></i>
                                </a>
                                <a href="<?= base_url('obat/ubahObat/') . $o['id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('obat/hapusObat/') . $o['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Kamu yakin akan menghapus <?= $o['nama_obat']; ?> ?');">
                                    <i class="fas fa-fw fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->