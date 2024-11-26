<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
                <div class="row g-5">
                        <div class="col-lg-5 col-md-6">
                                <h5 class="text-light mb-4">Alamat</h5>
                                <p class="mb-2">
                                        <i class="fa fa-map-marker-alt me-3"></i>
                                        Jl. Keadilan 1 Kota Jakarta Timur DKJ
                                </p>
                                <p class="mb-2">
                                        <i class="fa fa-phone-alt me-3"></i>
                                        08123456789
                                </p>
                                <p class="mb-2">
                                        <i class="fa fa-envelope me-3"></i>
                                        ci-klinik@gmail.com
                                </p>
                                <div class="d-flex pt-2">
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href="">
                                                <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href="">
                                                <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href="">
                                                <i class="fab fa-youtube"></i>
                                        </a>
                                        <a class="btn btn-outline-light btn-social rounded-circle m-1" href="">
                                                <i class="fab fa-linkedin-in"></i>
                                        </a>
                                </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                                <h5 class="text-light mb-4">Services</h5>
                                <a class="btn btn-link" href="<?= base_url('home/janji_temu'); ?>">
                                        Janji Temu
                                </a>
                                <a class="btn btn-link" href="<?= base_url('home/obat#beli-obat'); ?>">
                                        Beli Obat
                                </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                                <h5 class="text-light mb-4">Quick Links</h5>
                                <a class="btn btn-link" href="<?= base_url('home/dokter'); ?>">
                                        Dokter
                                </a>
                                <a class="btn btn-link" href="<?= base_url('home/obat'); ?>">
                                        Obat
                                </a>
                                <a class="btn btn-link" href="<?= base_url('home/tentang'); ?>">
                                        Tentang
                                </a>
                        </div>
                </div>
        </div>

        <div class="container">
                <div class="copyright">
                        <!-- <div class="row"> -->
                        <div class="text-center">
                                &copy; <a class="link-offset-2 link-underline link-underline-opacity-0 text-primary" href="<?= base_url(); ?>">CI Klinik</a> All Right Reserved.
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

<!-- Back to Top -->
<a href="" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>



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

<!-- Javascript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/lib/wow/wow.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/easing/easing.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/waypoints/waypoints.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/counterup/counterup.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/tempusdominus/js/moment.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/tempusdominus/js/moment-timezone.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>

<!-- Template Javascript -->
<script src="<?= base_url('assets/js/klinik.js'); ?>"></script>

<!-- Sweet Alert Javascript -->
<script src="<?= base_url('assets/js/sweetalert.js'); ?>"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/DataTablesKlinik/datatables.min.js'); ?>"></script>

<!-- Panggil Datatables -->
<script src="<?= base_url('assets/js/panggil-datatables.js'); ?>"></script>

</body>

</html>