<!-- Obat Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <p class="d-inline-block border rounded-pill py-1 px-4"><?= $judul; ?></p>
            <h1>Obat Kami Sudah Sesuai Dengan Resep Dokter</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="bg-light rounded d-flex align-items-center p-5 shadow">
                    <form action="<?= base_url('obat/beli_obat/' . $obat['id']); ?>" method="post" onsubmit="confirmSubmissionPesanObat(event)">
                        <?php
                        $date = date('Y-m-d H:i:s', time()); ?>
                        <input type="datetime" class="form-control" id="waktu_pesan" name="waktu_pesan" value="<?= $date; ?>" hidden>

                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label for="nama_pemesan" class="form-control-label ps-2 mb-2">Nama Anda</label>
                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" style="height: 55px;" value="<?= $user['nama']; ?>" readonly>
                                <?= form_error('nama_pemesan', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="email" class="form-control-label ps-2 mb-2">Email Anda</label>
                                <input type="text" class="form-control" id="email" name="email" style="height: 55px;" value="<?= $user['email']; ?>" readonly>
                                <?= form_error('email', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="telepon" class="form-control-label ps-2 mb-2">Nomor Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" style="height: 55px;" value="<?= set_value('telepon'); ?>">
                                <?= form_error('telepon', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="tanggal_lahir" class="form-control-label ps-2 mb-2">Tanggal Lahir</label>
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="date" class="form-control datetimepicker-input" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" id="tanggal_lahir" name="tanggal_lahir">
                                    <?= form_error('tanggal_lahir', '<small class="text-danger ps-2">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="alamat" class="form-control-label ps-2 mb-2">Alamat Anda</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" style="height: 55px;" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="nama_obat" class="form-control-label ps-2 mb-2">Nama Obat</label>
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" style="height: 55px;" value="<?= $obat['nama_obat']; ?>" readonly>
                                <?= form_error('nama_obat', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="pembayaran" class="form-control-label ps-2 mb-2">Opsi Pembayaran</label>
                                <select name="pembayaran" id="pembayaran" class="form-select" style="height: 55px;" value="<?= set_value('pembayaran'); ?>">
                                    <option value="">Pilih Pembayaran</option>
                                    <option value="Transfer Bank BSI">Transfer Bank BSI</option>
                                    <option value="Transfer Bank BRI">Transfer Bank BRI</option>
                                    <option value="Transfer Bank BNI">Transfer Bank BNI</option>
                                    <option value="Transfer Bank BCA">Transfer Bank BCA</option>
                                    <option value="Transfer Bank Mandiri">Transfer Bank Mandiri</option>
                                    <option value="Debit BCA">Debit BCA</option>
                                    <option value="Debit Mandiri">Debit Mandiri</option>
                                </select>
                                <?= form_error('pembayaran', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="pengiriman" class="form-control-label ps-2 mb-2">Opsi Pengiriman</label>
                                <select name="pengiriman" id="pengiriman" class="form-select" style="height: 55px;">
                                    <option value="">Pilih Pengiriman</option>
                                    <option value="Antar ke alamat">Antar ke alamat</option>
                                    <option value="Ambil di klinik">Ambil di klinik</option>
                                </select>
                                <?= form_error('pengiriman', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="jumlah" class="form-control-label ps-2 mb-2">Jumlah Obat</label>
                                <input type="text" readonly class="form-control" id="jumlah" name="jumlah" value="<?= $obat['stok']; ?>" style="height: 55px;">
                                <div class="input-group-append mt-2 ps-2">
                                    <button class="btn btn-outline-secondary" type="button" id="btn-decrease">-</button>
                                    <button class="btn btn-outline-secondary" type="button" id="btn-increase">+</button>
                                </div>
                                <?= form_error('jumlah', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Pesan Obat</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->