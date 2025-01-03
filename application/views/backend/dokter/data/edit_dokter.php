<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?= form_open_multipart('admin/dokter/ubah/' . $dokter['id_dokter']); ?>
            <input type="hidden" name="id" value="<?= $dokter['id_dokter']; ?>">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $dokter['nama_dokter']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $dokter['nip']; ?>">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_dokter" class="col-sm-3 col-form-label">Nama Dokter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $dokter['nama_dokter']; ?>">
                            <?= form_error('nama_dokter', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="spesialisasi" class="col-sm-3 col-form-label">Spesialisasi</label>
                        <div class="col-sm-9">
                            <select name="spesialisasi" id="spesialisasi" class="form-control">
                                <option value="">Pilih Spesialisasi</option>
                                <?php foreach ($spesialisasi as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('spesialisasi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $dokter['telepon']; ?>">
                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $dokter['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dokter['alamat']; ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jam_masuk" class="col-sm-3 col-form-label">Jam Masuk</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?= $dokter['jam_masuk']; ?>">
                            <?= form_error('jam_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jam_keluar" class="col-sm-3 col-form-label">Jam Keluar</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="<?= $dokter['jam_keluar']; ?>">
                            <?= form_error('jam_keluar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">Gambar Dokter</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/upload-dokter/') . $dokter['gambar']; ?>" alt="gambar dokter" class="img-thumbnail">
                                </div>

                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_dokter" name="gambar_dokter">
                                        <label for="gambar_dokter" class="custom-file-label">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button type="button" class="btn btn-dark" onclick="window.location.href='<?= base_url('admin/dokter'); ?>'">Kembali</button>
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