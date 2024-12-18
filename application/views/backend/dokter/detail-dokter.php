<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card mt-3 shadow">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"><?= $dokter['nama_dokter']; ?></h5>
                </div>
                <div class="row g-0 align-items-center pl-5">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/upload-dokter/') . $dokter['gambar']; ?>" class="img-fluid rounded-start" alt="gambar dokter" style="max-height: 100%;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><strong>NIP :</strong> <?= $dokter['nip']; ?></p>
                            <p class="card-text"><strong>Spesialisasi :</strong> <?= $dokter['nama_spesialisasi']; ?></p>
                            <p class="card-text"><strong>Jenis Kelamin :</strong> <?= $dokter['jenis_kelamin']; ?></p>
                            <p class="card-text"><strong>Telepon :</strong> <?= $dokter['telepon']; ?></p>
                            <p class="card-text"><strong>Email :</strong> <?= $dokter['email']; ?></p>
                            <p class="card-text"><strong>Alamat :</strong> <?= $dokter['alamat']; ?></p>
                            <p class="card-text"><strong>Jam Operasional :</strong> <?= $dokter['jam_masuk'] . ' - ' . $dokter['jam_keluar']; ?></p>
                            <p class="card-text"><strong>Tanggal Ditambahkan :</strong> <?= date('d-m-Y', strtotime($dokter['tanggal_ditambahkan'])); ?></p>

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