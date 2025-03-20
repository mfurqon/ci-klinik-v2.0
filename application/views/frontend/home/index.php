            <!-- Start Header -->
            <div class="container-fluid header bg-primary p-0 mb-5">
                
                <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
                    <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                        <h1 class="display-4 text-white mb-5">
                            Kesehatan adalah kunci kebahagiaan
                        </h1>

                        <div class="row g-4">
                            <div class="col-sm-4">
                                <div class="border-start border-light ps-4">
                                    <h2 class="text-white mb-1" data-toggle="counter-up">
                                        10
                                    </h2>
                                    <p class="text-light mb-0">
                                        Cabang <br> di Indonesia
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="border-start border-light ps-4">
                                    <h2 class="text-white mb-1" data-toggle="counter-up">
                                        30
                                    </h2>
                                    <p class="text-light mb-0">
                                        Dokter <br> Berpengalaman
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="border-start border-light ps-4">
                                    <h2 class="text-white mb-1" data-toggle="counter-up">
                                        34
                                    </h2>
                                    <p class="text-light mb-0">
                                        Total <br> Staf Medis
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="owl-carousel header-carousel">
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
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <p class="d-inline-block border rounded-pill py-1 px-4">Dokter</p>
                        <h1>Dokter Kami Yang Berpengalaman</h1>
                    </div>

                    <div class="row g-4">

                        <?php foreach ($dokter_limit as $dl) : ?>
                            <div class="col-lg-3 col-md-6 wow fadeInUp mb-4" data-wow-delay="0.1s">
                                <div class="team-item position-relative rounded overflow-hidden shadow">
                                    <div class="overflow-hidden">
                                        <img src="<?= base_url('assets/img/upload-dokter/') . $dl['gambar']; ?>" alt="gambar_dokter" title="gambar dokter" class="img-fluid">
                                    </div>

                                    <div class="team-text bg-light text-center p-4">
                                        <h5><?= $dl['nama_dokter']; ?></h5>
                                        <p class="text-primary">Spesialisasi <?= $dl['nama_spesialisasi']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <!-- End Doctors -->


            <!-- Janji Temu Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex flex-column">
                                <img class="img-fluid rounded w-75 align-self-end" src="<?= base_url('assets/img/klinik/suntik.jpg'); ?>" alt="gambar-klinik">
                                <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="<?= base_url('assets/img/klinik/ruang-klinik-2.jpg'); ?>" alt="gambar-klinik" style="margin-top: -25%;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <p class="d-inline-block border rounded-pill py-1 px-4">Janji Temu</p>
                            <h1 class="mb-4">Buat Janji Temu Dengan Dokter Kami</h1>
                            <p>Pada menu janji temu, Anda dapat mengatur jadwal konsultasi atau pertemuan dengan mudah dan nyaman. Pilih waktu yang sesuai, dan kami akan memastikan layanan terbaik untuk Anda.</p>
                            <p class="mb-4">Janji temu dirancang untuk mempermudah Anda dalam mengatur jadwal konsultasi atau layanan secara langsung melalui website utama kami. Dengan fitur ini, Anda dapat memilih waktu yang sesuai tanpa perlu antre atau menunggu lama.</p>
                            <p><i class="far fa-check-circle text-primary me-3"></i>Quality health care</p>
                            <p><i class="far fa-check-circle text-primary me-3"></i>Only Qualified Doctors</p>
                            <p><i class="far fa-check-circle text-primary me-3"></i>Medical Research Professionals</p>
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="<?= base_url('janji-temu'); ?>">Buat Janji Temu</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Janji Temu End -->


            <!-- Testimonial Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <p class="d-inline-block border rounded-pill py-1 px-4">Testimoni</p>
                        <h1>Apa Kata Mereka</h1>
                    </div>

                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                        <div class="testimonial-item text-center">
                            <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?= base_url('assets/img/profile/default.jpg'); ?>" style="width: 100px; height: 100px;">
                            <div class="testimonial-text rounded text-center p-4">
                                <p>Dokternya ganteng-ganteng cantik-cantik &#128525;</p>
                                <h5 class="mb-1">Anisa Rahma</h5>
                                <span class="fst-italic">Mahasiswa</span>
                            </div>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?= base_url('assets/img/profile/default.jpg'); ?>" style="width: 100px; height: 100px;">
                            <div class="testimonial-text rounded text-center p-4">
                                <p>
                                    Pelayanannya bagus, memuaskan lah pokoknya
                                </p>
                                <h5 class="mb-1">
                                    Tubagus Kahfi
                                </h5>
                                <span class="fst-italic">
                                    Karyawan Swasta
                                </span>
                            </div>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?= base_url('assets/img/profile/default.jpg'); ?>" style="width: 100px; height: 100px;">
                            <div class="testimonial-text rounded text-center p-4">
                                <p>
                                    Tempatnya bagus, nyaman, pelayanannya juga oke
                                </p>
                                <h5 class="mb-1">
                                    Ahmad Raihan
                                </h5>
                                <span class="fst-italic">
                                    Pegawai Negeri
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->