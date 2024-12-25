<section class="my-5">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-lg-8 mb-4 mb-lg-0">
                <div class="card mb-3 shadow" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background: linear-gradient(180deg, rgba(0,212,255,1) 0%, rgba(9,9,121,1) 100%);">
                            <img src="<?= base_url('assets/img/profile/' . $user['gambar']); ?>"
                                alt="Avatar" class="img-fluid my-5" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                            <h5 class="text-white"><?= $user['nama']; ?></h5>
                            <!-- <p>Web Designer</p> -->
                            <a href="profile/ubah-profile" class="text-white"><i class="far fa-edit mb-5"></i></a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h5>Profile User</h5>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted"><?= $user['email']; ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted"><?= $user['telepon']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6>Alamat</h6>
                                    <p class="text-muted"><?= $user['alamat']; ?></p>
                                </div>
                                <div class="row">
                                    <h6>Tanggal Gabung</h6>
                                    <p class="text-muted"><?= $user['tanggal_dibuat']; ?></p>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <!-- <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>