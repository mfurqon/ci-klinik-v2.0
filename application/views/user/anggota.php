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

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#anggotaBaruModal">
                <i class="fas fa-fw fa-circle-plus"></i>
                Tambah Anggota
            </a>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Tanggal Gabung</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    foreach ($anggota as $a) : ?>
                        <tr class="text-center">
                            <th scope="row"><?= $n++; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['role_nama']; ?></td>
                            <td><?= date('d-m-Y', strtotime($a['tanggal_dibuat'])); ?></td>
                            <td>
                                <picture>
                                    <img src="<?= base_url('assets/img/profile/') . $a['gambar']; ?>" class="img-fluid img-thumbnail" alt="profile image" style="max-width: 100px;">
                                </picture>
                            </td>
                            <td>
                                <a href="<?= base_url('user/ubah_anggota/') . $a['user_id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="<?= base_url('user/hapus_anggota/') . $a['user_id']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus <?= 'anggota' . ' ' . $a['nama']; ?> ?');" class="badge bg-gradient-light text-danger p-2" title="Hapus">
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

            <form action="<?= base_url('user/manage'); ?>" method="post" enctype="multipart/form-data">
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