<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible;         animation-delay: 0.1s; animation-name: fadeIn;
    background: url(../../../../ci-klinik/assets/img/dokter/doctors-wearing-mask.jpeg) top center no-repeat;
    background-size: cover;
    text-shadow: 0 0 30px rgba(0, 0, 0, 1);
">
    <div class="container py-5">
        <h1 class="display-2 text-white font-weight-bold mb-3  slideInDown">Dokter</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- Dokter Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Dokter</p>
            <h1>Dokter Kami</h1>
        </div>

        <div class="row g-4">
            <?php foreach ($dokter as $d) : ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded shadow overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('assets/img/upload-dokter/') . $d['gambar']; ?>" alt="gambar dokter">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5><?= $d['nama_dokter']; ?></h5>
                            <p class="text-primary">Spesialisasi <?= $d['nama_spesialisasi']; ?></p>
                            <div class="team-social text-center">
                                <a href="<?= base_url('dokter/detail/') . $d['id_dokter']; ?>" class="btn btn-primary">
                                    <i class="fas fa-eye align-items-center"></i>
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Dokter End -->