<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?= form_open_multipart('admin/users/ubah/' . $anggota['user_id']); ?>
            <input type="hidden" name="id" value="<?= $anggota['user_id']; ?>">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $anggota['nama']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $anggota['email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $anggota['telepon']; ?>">
                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $anggota['alamat']; ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control datetimepicker-input" placeholder="Pilih Hari" data-target="#date" data-toggle="datetimepicker" id="tanggal_lahir" name="tanggal_lahir" value="<?= $anggota['tanggal_lahir_user']; ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role_id" class="col-sm-3 col-form-label">Ubah Role</label>
                        <div class="col-sm-9">
                            <select name="role_id" id="role_id" class="form-control">
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('role_id', '<small class="text-danger pl-3>', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">Gambar</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $anggota['gambar']; ?>" alt="profile image" class="img-thumbnail">
                                </div>

                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input mb-3" id="gambar" name="gambar">
                                        <label for="gambar" class="custom-file-label">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button type="button" class="btn btn-dark" onclick="window.location.href='<?= base_url('admin/users'); ?>'">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->