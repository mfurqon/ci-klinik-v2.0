<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow mt-3">

                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $janji_temu['nama']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $janji_temu['email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $janji_temu['telepon']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_dokter" class="col-sm-3 col-form-label">Nama Dokter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $janji_temu['nama_dokter']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_temu" class="col-sm-3 col-form-label">Tanggal Temu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tanggal_temu" name="tanggal_temu" value="<?= date('d-m-Y', strtotime($janji_temu['tanggal_temu'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jam_temu" class="col-sm-3 col-form-label">Jam Temu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jam_temu" name="jam_temu" value="<?= $janji_temu['jam_temu']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-9">
                            <textarea name="keluhan" id="keluhan" class="form-control" readonly><?= $janji_temu['keluhan']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_dibuat" class="col-sm-3 col-form-label">Tanggal Dibuat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" value="<?= date('d-m-Y', strtotime($janji_temu['tanggal_dibuat'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button class="btn btn-primary" onclick="window.history.go(-1)">Kembali</button>
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