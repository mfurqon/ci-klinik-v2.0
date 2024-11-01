<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Welcome Message -->
    <div class="row mb-4">
        <div class="col-lg-12 py-3">
            <div class="card shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="col text-center">
                        <img src="<?= base_url('assets/img/logo-klinik-biru-remove-bg.webp'); ?>" alt="Klinik Icon" class="img-fluid mb-3" style="max-width: 150px;">
                        <h2 class="h3 text-gray-800">Selamat Datang <span class="text-primary"><?= $user['nama']; ?></span></h2>
                        <h3 class="h4 text-gray-800">Ini adalah Halaman Dashboard Administrator CI Klinik</h3>

                        <div class="row justify-content-center">
                            <div class="col-sm-7">
                                <p class="text-muted">Kelola data obat, data dokter, data user, data janji temu, data pemeriksaan, data pemesanan obat Anda dengan mudah dan efisien.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Dokter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_dokter; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user-doctor fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Obat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_obat; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-pills fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Janji Temu
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_janji_temu; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-calendar-check fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_anggota; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->