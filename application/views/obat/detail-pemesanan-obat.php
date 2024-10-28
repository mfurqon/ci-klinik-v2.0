<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $pemesanan_obat['nama_pemesan']; ?></h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($pemesanan_obat['tanggal_lahir'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon" class="col-sm-4 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" id="telepon" name="telepon" value="<?= $pemesanan_obat['telepon']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $pemesanan_obat['email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pemesanan_obat['alamat']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_obat" class="col-sm-4 col-form-label">Obat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $pemesanan_obat['nama_obat']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $pemesanan_obat['jumlah']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pembayaran" class="col-sm-4 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pembayaran" name="pembayaran" value="<?= $pemesanan_obat['pembayaran']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pengiriman" class="col-sm-4 col-form-label">Metode Pengiriman</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pengiriman" name="pengiriman" value="<?= $pemesanan_obat['pengiriman']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="waktu_pesan" class="col-sm-4 col-form-label">Waktu Pemesanan</label>
                        <div class="col-sm-8">
                            <input type="datetime" class="form-control" id="waktu_pesan" name="waktu_pesan" value="<?= date('H:i:s, d-m-Y', strtotime($pemesanan_obat['waktu_pesan'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-8">
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