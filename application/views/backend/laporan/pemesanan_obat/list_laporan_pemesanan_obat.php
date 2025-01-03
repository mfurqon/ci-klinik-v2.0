<!-- Begin Page Content -->

<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">

            <!-- DataTales Pemesanan Obat -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-3"><?= $judul; ?></h5>
                    <div>
                        <a href="<?= base_url('admin/laporan/print-pemesanan-obat'); ?>" class="btn btn-warning mb-3">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="<?= base_url('admin/laporan/export-pdf-pemesanan-obat'); ?>" class="btn btn-danger mb-3">
                            <i class="far fa-file-pdf"></i> Download PDF
                        </a>
                        <a href="<?= base_url('admin/laporan/export-excel-pemesanan-obat'); ?>" class="btn btn-success mb-3">
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
                                    <th nowrap>Nama Pengguna</th>
                                    <th nowrap>No Invoice</th>
                                    <th nowrap>Tanggal Pemesanan</th>
                                    <th nowrap>Jam Pemesanan</th>
                                    <th nowrap>Status Pembayaran</th>
                                    <th nowrap>Total Pembayaran (Rp)</th>
                                    <th nowrap>Metode Pemesanan</th>
                                    <th nowrap>Pilihan Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pemesanan_obat as $po) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $po['nama']; ?></td>
                                        <td><?= $po['no_invoice']; ?></td>
                                        <td><?= $po['tanggal']; ?></td>
                                        <td><?= $po['jam']; ?></td>
                                        <td><?= $po['status_pembayaran']; ?></td>
                                        <td><?= number_format($po['total_pembayaran'], 0, ',', '.'); ?></td>
                                        <td><?= $po['metode_pembelian']; ?></td>
                                        <td><?= $po['metode_pembayaran']; ?></td>
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