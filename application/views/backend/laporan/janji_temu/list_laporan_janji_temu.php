<!-- Begin Page Content -->

<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">

            <!-- DataTales Janji Temu -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-3">Data Janji Temu</h5>
                    <div>
                        <a href="<?= base_url('admin/laporan/print-janji-temu'); ?>" class="btn btn-warning mb-3">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="<?= base_url('admin/laporan/export-pdf-janji-temu'); ?>" class="btn btn-danger mb-3">
                            <i class="far fa-file-pdf"></i> Download PDF
                        </a>
                        <a href="<?= base_url('admin/laporan/export-excel-janji-temu'); ?>" class="btn btn-success mb-3">
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
                                    <th>Nama User</th>
                                    <th>Email User</th>
                                    <th>No Telepon User</th>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal Temu</th>
                                    <th>Jam Temu</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($janji_temu as $jt) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $jt['nama_user']; ?></td>
                                        <td><?= $jt['email_user']; ?></td>
                                        <td><?= $jt['telepon_user']; ?></td>
                                        <td><?= $jt['nama_dokter']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($jt['tanggal_temu'])); ?></td>
                                        <td><?= $jt['jam_temu']; ?></td>
                                        <td><?= $jt['keluhan']; ?></td>
                                        <td><?= $jt['status']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($jt['tanggal_dibuat'])); ?></td>
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