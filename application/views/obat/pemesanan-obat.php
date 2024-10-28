<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('pesan'); ?>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Nama Pemesan</th>
                        <th scope="col" class="text-center">Obat</th>
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" class="text-center">Pembayaran</th>
                        <th scope="col" class="text-center">Pengiriman</th>
                        <th scope="col" class="text-center">Waktu Pesan</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($pemesanan_obat as $po) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $a++; ?></th>
                            <td class="text-center"><?= $po['nama_pemesan']; ?></td>
                            <td class="text-center"><?= $po['nama_obat']; ?></td>
                            <td class="text-center"><?= $po['jumlah']; ?></td>
                            <td class="text-center"><?= $po['pembayaran']; ?></td>
                            <td class="text-center"><?= $po['pengiriman']; ?></td>
                            <td class="text-center"><?= date('H:i:s, d-m-Y', strtotime($po['waktu_pesan'])); ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('obat/detailPemesananObat/') . $po['id']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                    <i class="fas fa-fw fa-search"></i>
                                </a>
                                <a href="<?= base_url('obat/hapusPemesananObat/') . $po['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Kamu yakin akan menghapus <?= $po['nama_obat']; ?> ?');">
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