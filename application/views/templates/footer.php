<!-- Footer Start -->
<div class="container-fluid text-light footer mt-5 p-5" data-wow-delay="0.1s" style="background-color: #1B2C51;">
        <div class="container py-5">
                <div class="row g-1">
                        <div class="col-lg-5 mb-4">
                                <h5 class="text-light mb-4">Alamat</h5>
                                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Keadilan 1 Kota Jakarta Timur DKJ</p>
                                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>08123456789</p>
                                <p class="mb-2"><i class="fa fa-envelope me-3"></i>ci-klinik@gmail.com</p>
                                <div class="d-flex pt-2">
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href=""><i class="fab fa-youtube"></i></a>
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                                <h5 class="text-light mb-4">Services</h5>
                                <div class="m-2">
                                        <i class="fa-solid fa-angle-right me-1"></i>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('home#form-janji-temu'); ?>">Janji Temu</a>
                                </div>
                                <div class="m-2">
                                        <i class="fa-solid fa-angle-right me-1"></i>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('obat#beli-obat'); ?>">Beli Obat</a>
                                </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                                <h5 class="text-light mb-4">Quick Links</h5>
                                <div class="m-2">
                                        <i class="fa-solid fa-angle-right me-1"></i>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('dokter'); ?>">Dokter</a>
                                </div>
                                <div class="m-2">
                                        <i class="fa-solid fa-angle-right me-1"></i>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('obat'); ?>">Obat</a>
                                </div>
                                <div class="m-2">
                                        <i class="fa-solid fa-angle-right me-1"></i>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('home/tentang'); ?>">Tentang</a>
                                </div>
                        </div>
                </div>
        </div>

        <div class="container">
                <div class="copyright">
                        <!-- <div class="row"> -->
                        <div class="text-center">
                                &copy; <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url(); ?>">CI Klinik</a> All Right Reserved.
                        </div>
                        <!-- <div class="col-md-6 text-center text-md-end"> -->
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            </br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                        <!-- </div> -->
                        <!-- </div> -->
                </div>
        </div>
</div>
<!-- Footer End -->
<!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a> -->



<!-- Optional JavaScript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
                const maxStok = <?= $obat['stok']; ?>;
                const stokInput = document.getElementById('jumlah');
                const btnDecrease = document.getElementById('btn-decrease');
                const btnIncrease = document.getElementById('btn-increase');

                btnDecrease.addEventListener('click', function() {
                        let currentValue = parseInt(stokInput.value);
                        if (currentValue > 1) {
                                stokInput.value = currentValue - 1;
                        }
                });

                btnIncrease.addEventListener('click', function() {
                        let currentValue = parseInt(stokInput.value);
                        if (currentValue < maxStok) {
                                stokInput.value = currentValue + 1;
                        }
                });
        });
</script>

</body>

</html>