    <style>
        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
        }

        .doctor-avatar {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    <div class="bg-light">
        <div class="container py-5">
            <!-- Header dengan Status -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="mb-1">Detail Janji Temu #<?= $janji_temu['no_janji_temu']; ?></h4>
                            <p class="text-muted mb-0">
                                Dibuat pada
                                <?= strftime('%d %B %Y', strtotime($janji_temu['tanggal_dibuat'])); ?>,
                                <?= date('H:i', strtotime($janji_temu['jam_dibuat'])); ?> WIB
                            </p>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-primary status-badge">
                                <?= $janji_temu['status']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Informasi Dokter -->
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets/img/upload-dokter/' . $janji_temu['gambar_dokter']); ?>" alt="Foto Dokter" class="doctor-avatar mb-3">
                            <h5 class="mb-1"><?= $janji_temu['nama_dokter']; ?></h5>
                            <p class="text-muted mb-3"><?= $janji_temu['nama_spesialisasi']; ?></p>
                            <div class="d-flex justify-content-center gap-2 mb-3">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Jadwal -->
                <div class="col-md-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Detail Jadwal</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-calendar-alt fa-fw text-primary fs-4"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-muted mb-0">Tanggal</p>
                                            <strong>
                                                <?= strftime('%d %B %Y', strtotime($janji_temu['tanggal_temu'])); ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-clock fa-fw text-primary fs-4"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-muted mb-0">Waktu</p>
                                            <strong><?= $janji_temu['jam_temu']; ?> WIB</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Pasien -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body  p-4">
                            <h5 class="card-title mb-4">Informasi Pasien</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <p class="text-muted mb-1">Nama Lengkap</p>
                                    <strong><?= $janji_temu['nama_user']; ?></strong>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted mb-1">Tanggal Lahir</p>
                                    <strong><?= strftime('%d %B %Y', strtotime($janji_temu['tanggal_lahir_user'])); ?></strong>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted mb-1">Jenis Kelamin</p>
                                    <strong><?= $janji_temu['jenis_kelamin_user']; ?></strong>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted mb-1">Keluhan</p>
                                    <strong><?= $janji_temu['keluhan']; ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row mt-4">
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='<?= base_url('riwayat/janji-temu'); ?>'">
                        <i class="fas fa-arrow-left me-1"></i>
                        Kembali
                    </button>
                </div>
            </div>
        </div>

    </div>