<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('pesan')) : ?>
        <?= $this->session->flashdata('pesan'); ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-9">

            <?= form_open_multipart('admin/profile/ubah-profile'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $user['telepon']; ?>">
                    <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input mb-3" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='<?= base_url('admin/profile'); ?>'">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->