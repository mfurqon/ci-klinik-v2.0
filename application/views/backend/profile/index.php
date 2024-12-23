<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-8">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-fluid rounded-start" alt="gambar profil">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-body-secondary">Bergabung sejak <?= date('d F Y', strtotime($user['tanggal_dibuat'])); ?></small></p>

                    <div style="margin-top: 30px;">
                        <a href="<?= base_url('admin/profile/ubah-profile'); ?>" class="btn btn-primary" style="border-radius: 20px; font-size: 0.80em; margin-right: 10px;">
                            <i class="fas fa-fw fa-user-edit"></i>
                            Ubah Profil
                        </a>
                        <a href="<?= base_url('admin/profile/ubah-password'); ?>" class="btn btn-success" style="border-radius: 20px; font-size: 0.80em;">
                            <i class="fas fa-fw fa-key"></i>
                            Ubah Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->