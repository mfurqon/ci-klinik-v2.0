<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card mt-3 shadow">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $obat['nama_obat']; ?></h5>
                </div>
                <div class="row g-0 align-items-center pl-5">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/upload-obat/') . $obat['gambar_obat']; ?>" class="img-fluid rounded-start" alt="gambar obat" style="max-height: 100%;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><strong>Jenis Obat:</strong> <?= $obat['nama_jenis_obat']; ?></p>
                            <p class="card-text"><strong>Harga:</strong> <?= $obat['harga']; ?></p>
                            <p class="card-text"><strong>Deskripsi:</strong> <?= $obat['deskripsi']; ?></p>
                            <p class="card-text"><strong>Stok:</strong> <?= $obat['stok']; ?></p>
                            <p class="card-text"><strong>Tanggal Kadaluwarsa:</strong> <?= date('d-m-Y', strtotime($obat['tanggal_kadaluwarsa'])); ?></p>
                            <button class="btn btn-primary mt-3" onclick="window.history.go(-1)">Kembali</button>
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