        <div class="container-fluid bg-primary p-0 mb-5">

            <?php if ($this->session->flashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '<?= $this->session->flashdata('pesan') ?>',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                </script>
            <?php endif; ?>

            <!-- Start Header -->
            <div class="row align-items-center flex-column-reverse flex-lg-row m-0">
                <div class="col-lg-6 p-5">
                    <h1 class="display-4 text-white mb-5">
                        Kesehatan adalah kunci kebahagiaan
                    </h1>

                    <div class="row g-4">
                        <div class="col-sm-4 mb-4">
                            <div class="border-start border-light ps-3 mr-1">
                                <h2 class="text-white mb-1">
                                    10
                                </h2>
                                <p class="text-light mb-0">
                                    Cabang <br> di Indonesia
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <div class="border-start border-light ps-3 mr-1">
                                <h2 class="text-white mb-1">
                                    30
                                </h2>
                                <p class="text-light mb-0">
                                    Dokter <br> Berpengalaman
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="border-start border-light ps-3 mr-1">
                                <h2 class="text-white mb-1">
                                    34
                                </h2>
                                <p class="text-light mb-0">
                                    Total <br> Staf Medis
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-0">
                    <div class="owl-item active">
                        <div class="owl-carousel-item position-relative">
                            <img src="<?= base_url('assets/img/klinik/ruang-klinik.jpg'); ?>" alt="gambar ruang klinik" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->


        <!-- Start Doctors -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Dokter</p>
                    <h1>Dokter Kami Yang Berpengalaman</h1>
                </div>

                <div class="row g-4">

                    <?php foreach ($dokter_limit as $dl) : ?>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="team-item position-relative rounded overflow-hidden shadow">
                                <div class="overflow-hidden">
                                    <img src="<?= base_url('assets/img/upload-dokter/') . $dl['gambar']; ?>" alt="gambar_dokter" title="gambar dokter" class="img-fluid">
                                </div>

                                <div class="team-text bg-light text-center p-4">
                                    <h5><?= $dl['nama_dokter']; ?></h5>
                                    <p class="text-primary">Spesialis <?= $dl['gelar_spesialis']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <!-- End Doctors -->


        <!-- Start Janji Temu -->
        <div class="container-xxl py-5" id="form-janji-temu">
            <div class="container-fluid">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <p class="d-inline-block border rounded-pill py-1 px-4">Janji Temu</p>
                        <h1 class="mb-4 sm-3">Buat Janji Temu Dengan Dokter Kami</h1>
                        <p class="mb-4">Anda dapat membuat janji dengan dokter kami sesuai dengan keinginan anda penuh</p>

                        <div class="bg-light d-flex align-items-center p-5 mb-4 text-dark">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                                <i class="fa fa-phone-alt text-primary fa-fade"></i>
                            </div>

                            <div class="ms-4">
                                <p class="mb-2">Telepon Kami Sekarang</p>
                                <h5 class="mb-0">08123456789</h5>
                            </div>
                        </div>

                        <div class="bg-light d-flex align-items-center p-5 text-dark">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                                <i class="fa fa-envelope-open text-primary fa-fade"></i>
                            </div>

                            <div class="ms-4">
                                <p class="mb-2">Hubungi Kami Sekarang</p>
                                <h5 class="mb-0">ci-klinik@gmail.com</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                            <form action="<?= base_url('home'); ?>" method="post" onsubmit="confirmSubmissionJanjiTemu(event)">
                                <?php
                                $date = date('Y-m-d'); ?>
                                <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" value="<?= $date; ?>" hidden>

                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control border-0" id="nama" name="nama" placeholder="Nama Anda" style="height: 55px;" value="<?= $user['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger ps-2">', '</small>'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control border-0" id="email" name="email" placeholder="Email Anda" style="height: 55px;" value="<?= $user['email']; ?>">
                                        <?= form_error('email', '<small class="text-danger ps-2">', '</small>'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control border-0" id="telepon" name="telepon" placeholder="Nomor Handphone" style="height: 55px;" value="<?= set_value('telepon'); ?>">
                                        <?= form_error('telepon', '<small class="text-danger ps-2">', '</small>'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <select name="dokter" id="dokter" class="form-select border-0" style="height: 55px;">
                                            <option value="">Pilih Dokter</option>
                                            <?php foreach ($dokter as $d) : ?>
                                                <option value="<?= $d['nama_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('dokter', '<small class="text-danger ps-2">', '</small>'); ?>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="date" id="date" data-target-input="nearest">
                                            <input type="date" class="form-control border-0 datetimepicker-input" placeholder="Pilih Hari" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" id="tanggal_temu" name="tanggal_temu">
                                            <?= form_error('tanggal_temu', '<small class="text-danger ps-2">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="time" id="time" data-target-input="nearest">
                                            <input type="time" class="form-control border-0 datetimepicker-input" placeholder="Pilih Waktu" data-target="#time" data-toggle="datetimepicker" style="height: 55px;" id="jam_temu" name="jam_temu">
                                            <?= form_error('jam_temu', '<small class="text-danger ps-2">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <textarea name="keluhan" id="keluhan" rows="5" class="form-control border-0" placeholder="Jelaskan gejala anda (opsional)"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3">Buat Janji Temu</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Janji Temu -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Testimoni</p>
                    <h1>Apa Kata Mereka</h1>
                </div>

                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner p-5">
                        <div class="carousel-item active text-center" data-bs-interval="10000">
                            <div class="container p-2 shadow">
                                <img src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="img-fluid bg-light rounded-circle p-2 mb-4 border border-primary" alt="user-profile" style="width: 100px; height: 100px;">
                                <div class="container w-75 h-75">
                                    <div class="testimonial-text rounded p-4 bg-primary text-white mb-4">
                                        <p>Dokternya ganteng-ganteng cantik-cantik &#128525;</p>
                                        <h5 class="mb-1">Anisa Rahma</h5>
                                        <span class="fst-italic">Mahasiswa</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item text-center" data-bs-interval="2000">
                            <div class="container p-2 shadow">
                                <img src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="img-fluid bg-light rounded-circle p-2 mb-4 border border-primary" alt="user-profile" style="width: 100px; height: 100px;">
                                <div class="container w-75">
                                    <div class="testimonial-text rounded p-4 bg-primary text-white mb-4
                                    ">
                                        <p>Pelayanannya bagus, memuaskan lah pokoknya</p>
                                        <h5 class="mb-1">Tubagus Kahfi</h5>
                                        <span class="fst-italic">Karyawan Swasta</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item text-center" data-bs-interval="2000">
                            <div class="container p-2 shadow">
                                <img src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="img-fluid bg-light rounded-circle p-2 mb-4 border border-primary" alt="user-profile" style="width: 100px; height: 100px;">
                                <div class="container w-75">
                                    <div class="testimonial-text rounded p-4 bg-primary text-white mb-4">
                                        <p>Tempatnya bagus, nyaman, pelayanannya juga oke</p>
                                        <h5 class="mb-1">Ahmad Raihan</h5>
                                        <span class="fst-italic">Pegawai Negeri</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                        <i class="fa-solid fa-arrow-left fa-xl" style="color: #0d6efd;"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                        <i class="fa-solid fa-arrow-right fa-xl" style="color: #0d6efd;"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->