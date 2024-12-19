<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Page Heading -->
            <h1 class="h3 my-4 text-primary"><?= $judul; ?></h1>

            <div class="card mb-4 shadow-sm border-0">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/upload-dokter/') . $dokter['gambar']; ?>" class="img-fluid rounded-start" alt="gambar-dokter" style="object-fit: cover; height: 100%;">
                    </div>
                    <div class="col-md-8 bg-light">
                        <div class="card-body p-4">
                            <h5 class="card-title text-primary"><?= $dokter['nama_dokter']; ?></h5>
                            <p class="card-text"><strong>Spesialisasi:</strong> <?= $dokter['nama_spesialisasi']; ?></p>
                            <p class="card-text"><strong>Jam Operasional:</strong> <?= $dokter['jam_masuk'] . ' - ' . $dokter['jam_keluar']; ?></p>

                            <button class="btn btn-outline-primary mt-3" onclick="window.history.back()">Kembali</button>
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

<!-- Optional Custom CSS -->
<!-- <style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .card-body {
        background-color: #f8f9fa;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .card-text {
        margin-bottom: 0.75rem;
        color: #333;
    }

    .btn-outline-primary {
        border-width: 2px;
    }

    .btn-outline-primary:hover {
        background-color: #0069d9;
        color: #fff;
    }
</style> -->