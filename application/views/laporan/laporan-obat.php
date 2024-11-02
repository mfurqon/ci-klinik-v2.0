<!-- Begin Page Content -->

<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-message alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('laporan/cetak_data_obat'); ?>" class="btn btn-dark mb-3">
                <i class="fas fa-print"></i> Print
            </a>
            <a href="<?= base_url('laporan/pdf_data_obat'); ?>" class="btn btn-warning mb-3">
                <i class="far fa-file-pdf"></i> Download PDF
            </a>
            <a href="<?= base_url('laporan/excel_data_obat'); ?>" class="btn btn-success mb-3">
                <i class="far fa-file-excel"></i> Export ke Excel
            </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Jenis Obat</th>
                        <th scope="col">Harga (Rp)</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Tanggal Kedaluwarsa</th>
                        <th scope="col">Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; foreach ($obat as $o) : ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $o['nama_obat']; ?></td>
                            <td><?= $o['nama_jenis_obat']; ?></td>
                            <td><?= number_format($o['harga']) ?></td>
                            <td><?= $o['deskripsi']; ?></td>
                            <td><?= $o['stok']; ?></td>
                            <td><?= $o['tanggal_kedaluwarsa']; ?></td>
                            <td><?= $o['gambar']; ?></td>
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