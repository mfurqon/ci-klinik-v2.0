<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">

            <?= form_open_multipart('janjiTemu/ubahJanjiTemu/' . $janji_temu['id']); ?>
            <input type="hidden" name="id" value="<?= $janji_temu['id']; ?>">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $janji_temu['nama']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $janji_temu['nama']; ?>">
                            <?= form_error('nama', '<Nama class="text-danger pl-3">', '</Nama>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $janji_temu['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $janji_temu['telepon']; ?>">
                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
                        <div class="col-sm-10">
                            <select name="nama_dokter" class="form-control form-control-user">
                                <?php foreach ($nama_dokter as $nd) : ?>
                                    <option value="<?= $nd['nama_dokter']; ?>"><?= $nd['nama_dokter']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('nama_dokter', '<small class="text-danger pl-3>', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_temu" class="col-sm-2 col-form-label">Tanggal Temu</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_temu" name="tanggal_temu" value="<?= $janji_temu['tanggal_temu']; ?>">
                            <?= form_error('tanggal_temu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jam_temu" class="col-sm-2 col-form-label">Jam Temu</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="jam_temu" name="jam_temu" value="<?= $janji_temu['jam_temu']; ?>">
                            <?= form_error('jam_temu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                        <div class="col-sm-10">
                            <textarea name="keluhan" id="keluhan" class="form-control"><?= $janji_temu['keluhan']; ?></textarea>
                            <?= form_error('keluhan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
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