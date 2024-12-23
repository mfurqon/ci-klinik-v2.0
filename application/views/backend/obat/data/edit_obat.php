<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?= form_open_multipart('admin/obat/ubah/' . $obat['id_obat']); ?>
            <input type="hidden" name="id" value="<?= $obat['id_obat']; ?>">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $obat['nama_obat']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_obat" class="col-sm-3 col-form-label">Obat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $obat['nama_obat']; ?>">
                            <?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_jenis_obat" class="col-sm-3 col-form-label">Jenis Obat</label>
                        <div class="col-sm-9">
                            <select name="id_jenis_obat" id="id_jenis_obat" class="form-control">
                                <option value="">Pilih Jenis Obat</option>
                                <?php foreach ($jenis_obat as $jo) : ?>
                                    <option value="<?= $jo['id']; ?>"><?= $jo['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_jenis_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $obat['harga']; ?>">
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $obat['deskripsi']; ?>">
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="stok" name="stok" value="<?= $obat['stok']; ?>">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_kedaluwarsa" class="col-sm-3 col-form-label">Tanggal Kedaluwarsa</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_kedaluwarsa" name="tanggal_kedaluwarsa" value="<?= $obat['tanggal_kedaluwarsa']; ?>">
                            <?= form_error('tanggal_kedaluwarsa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">Gambar Obat</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/upload-obat/') . $obat['gambar']; ?>" alt="gambar obat" class="img-thumbnail">
                                </div>

                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input mb-3" id="gambar_obat" name="gambar_obat">
                                        <label for="gambar_obat" class="custom-file-label">Pilih File</label>
                                    </div>
                                </div>
                            </div>
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