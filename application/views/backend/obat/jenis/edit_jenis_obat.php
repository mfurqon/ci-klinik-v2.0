<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?= form_open_multipart('admin/jenis-obat/ubah/' . $jenis_obat['id']); ?>
            <input type="hidden" name="id" value="<?= $jenis_obat['id']; ?>">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $jenis_obat['nama']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="jenis_obat" class="col-sm-3 col-form-label">Jenis Obat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jenis_obat" name="jenis_obat" value="<?= $jenis_obat['nama']; ?>">
                            <?= form_error('jenis_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button type="button" class="btn btn-dark" onclick="window.location.href='<?= base_url('admin/jenis-obat'); ?>'">Kembali</button>
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