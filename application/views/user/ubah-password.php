<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('user/ubah_password'); ?>" method="post">
                <div class="form-group">
                    <label for="password_lama">Password Saat Ini</label>
                    <input type="password" class="form-control" id="password_lama" name="password_lama">
                    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password_baru1">Password Baru</label>
                    <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                    <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password_baru2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                    <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->