<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?= form_open('pemeriksaan/ubahPemeriksaan/' . $pemeriksaan['id']); ?>
            <input type="hidden" name="id" id="id" value="<?= $pemeriksaan['id']; ?>">

            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $pemeriksaan['nama_pasien']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_pasien" class="col-sm-3 col-form-label">Nama Pasien</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $pemeriksaan['nama_pasien']; ?>">
                            <?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pemeriksaan['tanggal_lahir']; ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $pemeriksaan['telepon']; ?>">
                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $pemeriksaan['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pemeriksaan['alamat']; ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_dokter" class="col-sm-3 col-form-label">Nama Dokter</label>
                        <div class="col-sm-9">
                            <select name="nama_dokter" id="nama_dokter" class="form-control">
                                <option value="">Pilih Nama Dokter</option>
                                <?php foreach ($dokter as $d) : ?>
                                    <option value="<?= $d['nama_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('nama_dokter', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                        <div class="col-sm-9">
                            <textarea name="catatan" id="catatan" class="form-control"><?= $pemeriksaan['catatan']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status_pembayaran" class="col-sm-3 col-form-label">Status Pembayaran</label>
                        <div class="col-sm-9">
                            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                <option value="">Pilih Status Pembayaran</option>
                                <option value="Sudah Bayar">Sudah Bayar</option>
                                <option value="Belum Bayar">Belum Bayar</option>
                            </select>
                            <?= form_error('status_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button class="btn btn-primary" type="submit">Ubah</button>
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