<!-- Start Janji Temu -->
<div class="container-xxl py-5" id="form-janji-temu">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="d-inline-block border rounded-pill py-1 px-4">Janji Temu</p>
                <h1 class="mb-4">Buat Janji Temu Dengan Dokter Kami</h1>
                <p class="mb-4">Anda dapat membuat janji dengan dokter kami sesuai dengan keinginan anda penuh</p>

                <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                        <i class="fa fa-phone-alt text-primary fa-fade"></i>
                    </div>

                    <div class="ms-4">
                        <p class="mb-2">Telepon Kami Sekarang</p>
                        <h5 class="mb-0">08123456789</h5>
                    </div>
                </div>

                <div class="bg-light rounded d-flex align-items-center p-5">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                        <i class="fa fa-envelope-open text-primary fa-fade"></i>
                    </div>

                    <div class="ms-4">
                        <p class="mb-2">Hubungi Kami Sekarang</p>
                        <h5 class="mb-0">ci-klinik@gmail.com</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                    <form action="<?= base_url('janji-temu'); ?>" method="post">
                        <input type="text" id="id_user" name="id_user" value="<?= $user['id']; ?>" hidden>

                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" id="nama" name="nama" placeholder="Nama Anda" readonly style="height: 55px;" value="<?= $user['nama']; ?>">
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" id="email" name="email" placeholder="Email Anda" readonly style="height: 55px;" value="<?= $user['email']; ?>">
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" id="telepon" name="telepon" placeholder="Nomor Handphone" readonly style="height: 55px;" value="<?= $user['telepon'] ?>">
                                <?= form_error('telepon', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <select name="dokter" id="dokter" class="form-select border-0" style="height: 55px;">
                                    <option value="">Pilih Dokter</option>
                                    <?php foreach ($dokter as $d) : ?>
                                        <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('dokter', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="date" class="form-control border-0 datetimepicker-input" placeholder="Pilih Hari" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" id="tanggal_temu" name="tanggal_temu">
                                <?= form_error('tanggal_temu', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="time" class="form-control border-0 datetimepicker-input" placeholder="Pilih Waktu" data-target="#time" data-toggle="datetimepicker" style="height: 55px;" id="jam_temu" name="jam_temu">
                                <?= form_error('jam_temu', '<small class="text-danger ps-2">', '</small>'); ?>
                            </div>

                            <div class="col-12">
                                <textarea name="keluhan" id="keluhan" rows="5" class="form-control border-0" placeholder="Jelaskan gejala anda (opsional)"></textarea>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" id="buat-janji-temu">Buat Janji Temu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Janji Temu -->