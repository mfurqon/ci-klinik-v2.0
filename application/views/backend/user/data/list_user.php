<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('pesan'); ?>

            <!-- DataTales Anggota -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-2">Data Anggota</h5>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#anggotaBaruModal">
                        <i class="fas fa-fw fa-circle-plus"></i>
                        Tambah Anggota
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Gabung</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggota as $a) : ?>
                                    <tr>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['email']; ?></td>
                                        <td><?= $a['role_nama']; ?></td>
                                        <td><?= $a['jenis_kelamin_user']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($a['tanggal_lahir_user'])); ?></td>
                                        <td><?= date('d-m-Y', strtotime($a['tanggal_dibuat'])); ?></td>
                                        <td>
                                            <picture>
                                                <img src="<?= base_url('assets/img/profile/') . $a['gambar']; ?>" class="img-fluid img-thumbnail" alt="profile image" style="max-width: 100px;">
                                            </picture>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/users/ubah/') . $a['user_id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('admin/users/hapus/') . $a['user_id']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus <?= 'anggota' . ' ' . $a['nama']; ?> ?');" class="badge bg-gradient-light text-danger p-2" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
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

<!-- Modal Tambah Anggota Baru -->
<div class="modal fade" id="anggotaBaruModal" tabindex="-1" role="dialog" aria-labelledby="anggotaBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="anggotaBaruModalLabel">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('admin/users'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Anggota" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <select name="role" class="form-control form-control-user">
                            <option value="">Pilih Role</option>
                            <?php
                            foreach ($role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('role', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon" value="<?= set_value('telepon'); ?>">
                        <?= form_error('telepon', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Pilih Hari" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat'); ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password" value="<?= set_value('password1'); ?>">
                        <?= form_error('password1', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password" value="<?= set_value('password2'); ?>">
                        <?= form_error('password2', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-ban"></i>
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah -->