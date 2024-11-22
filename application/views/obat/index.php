<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible;         animation-delay: 0.1s; animation-name: fadeIn;
    background: url(../../../../ci-klinik/assets/img/obat/gambar-obat.jpg) top center no-repeat;
    background-size: cover;
    text-shadow: 0 0 30px rgba(0, 0, 0, 1);
">
    <div class="container py-5">
        <h1 class="display-2 text-white font-weight-bold mb-3  slideInDown">Obat</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- Obat Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Obat</p>
            <h1>Obat Kami</h1>
        </div>

        <div class="row g-4" id="beli-obat">
            <?php foreach ($obat as $o) : ?>
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item position-relative rounded shadow overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('assets/img/upload-obat/') . $o['gambar']; ?>" alt="gambar obat">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5><?= $o['nama']; ?></h5>
                            <p class="text-primary">Rp <?= $o['harga']; ?></p>
                            <div class="team-social text-center">
                                <a href="<?= base_url('obat/beliObat/') . $o['id']; ?>" class="btn btn-primary">
                                    <i class="fas fa-shopping-cart"></i>
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Obat End -->