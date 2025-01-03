<!-- Begin Page Content -->

<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">

            <!-- DataTales Obat -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-3">Data Obat</h5>
                    <div>
                        <a href="<?= base_url('admin/laporan/print-obat'); ?>" class="btn btn-warning mb-3">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="<?= base_url('admin/laporan/export-pdf-obat'); ?>" class="btn btn-danger mb-3">
                            <i class="far fa-file-pdf"></i> Download PDF
                        </a>
                        <a href="<?= base_url('admin/laporan/export-excel-obat'); ?>" class="btn btn-success mb-3">
                            <i class="far fa-file-excel"></i> Export ke Excel
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Harga (Rp)</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Tanggal Kedaluwarsa</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($obat as $o) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $o['nama_obat']; ?></td>
                                        <td><?= $o['nama_jenis_obat']; ?></td>
                                        <td><?= number_format($o['harga'], 0, ',', '.'); ?></td>
                                        <td><?= $o['deskripsi']; ?></td>
                                        <td><?= $o['stok']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($o['tanggal_kedaluwarsa'])); ?></td>
                                        <td>
                                            <picture>
                                                <img src="<?= base_url('assets/img/upload-obat/' . $o['gambar']); ?>" alt="gambar_obat" style="max-width: 100px; max-height: 100px;">
                                            </picture>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->