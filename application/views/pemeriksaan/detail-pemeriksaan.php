<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $pemeriksaan['nama_pasien']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $pemeriksaan['jenis_kelamin']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($pemeriksaan['tanggal_lahir'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $pemeriksaan['telepon']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $pemeriksaan['email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pemeriksaan['alamat']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_dokter" class="col-sm-3 col-form-label">Nama Dokter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $pemeriksaan['nama_dokter']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                        <div class="col-sm-9">
                            <textarea name="catatan" id="catatan" class="form-control" readonly><?= $pemeriksaan['catatan']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_pemeriksaan" class="col-sm-3 col-form-label">Tanggal Pemeriksaan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" value="<?= date('d-m-Y', strtotime($pemeriksaan['tanggal_pemeriksaan'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status_pembayaran" class="col-sm-3 col-form-label">Status Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran" value="<?= $pemeriksaan['status_pembayaran']; ?>" readonly>
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