<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('pesan') ?>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- DataTales Dokter -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-2">Data Janji Temu</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal Temu</th>
                                    <th>Jam Temu</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($janji_temu as $jt) : ?>
                                    <tr>
                                        <td><?= $jt['nama_user']; ?></td>
                                        <td><?= $jt['email_user']; ?></td>
                                        <td><?= $jt['nama_dokter']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($jt['tanggal_temu'])); ?></td>
                                        <td><?= $jt['jam_temu']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($jt['tanggal_dibuat'])); ?></td>
                                        <td>
                                            <?php if ($jt['status'] == "Diproses") : ?>
                                                <a class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                    Ubah Status
                                                </a>
                                            <?php else : ?>
                                                <a href="<?= base_url('admin/janji-temu/ubah-status/' . $jt['id']); ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                    Ubah Status
                                                </a>
                                            <?php endif; ?>
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