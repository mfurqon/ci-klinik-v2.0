<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?= form_open_multipart('dokter/ubah_spesialis/' . $spesialis['id']); ?>
            <input type="hidden" name="id" value="<?= $spesialis['id']; ?>">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $spesialis['gelar_spesialis']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="spesialis" class="col-sm-3 col-form-label">Spesialis Dokter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?= $spesialis['gelar_spesialis']; ?>">
                            <?= form_error('spesialis', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button class="btn btn-dark" onclick="window.history.go(-1)">Kembali</button>
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