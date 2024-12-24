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

            <!-- DataTales User -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-3">Data User</h5>
                    <div>
                        <a href="<?= base_url('admin/laporan/print-user'); ?>" class="btn btn-warning mb-3">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="<?= base_url('admin/laporan/export-pdf-user'); ?>" class="btn btn-danger mb-3">
                            <i class="far fa-file-pdf"></i> Download PDF
                        </a>
                        <a href="<?= base_url('admin/laporan/export-excel-user'); ?>" class="btn btn-success mb-3">
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
                                    <th>Alamat Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Role</th>
                                    <th>Tanggal Gabung</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $user['nama']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['telepon']; ?></td>
                                        <td><?= $user['alamat']; ?></td>
                                        <td><?= $user['role_nama']; ?></td>
                                        <td><?= $user['tanggal_dibuat']; ?></td>
                                        <td>
                                            <picture>
                                                <img src="<?= base_url('assets/img/profile/' . $user['gambar']); ?>" alt="gambar_user" style="max-width: 100px; max-height: 100px;">
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