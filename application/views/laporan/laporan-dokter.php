<!-- Begin Page Content -->

<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-message alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('laporan/cetak_data_dokter'); ?>" class="btn btn-dark mb-3">
                <i class="fas fa-print"></i> Print
            </a>
            <a href="<?= base_url('laporan/pdf_data_dokter'); ?>" class="btn btn-warning mb-3">
                <i class="far fa-file-pdf"></i> Download PDF
            </a>
            <a href="<?= base_url('laporan/excel_data_dokter'); ?>" class="btn btn-success mb-3">
                <i class="far fa-file-excel"></i> Export ke Excel
            </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Spesialis</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Jam Keluar</th>
                        <th scope="col">Tanggal Ditambahkan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; foreach ($dokter as $d) : ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $d['nama_dokter']; ?></td>
                            <td><?= $d['nip']; ?></td>
                            <td><?= $d['gelar_spesialis']; ?></td>
                            <td><?= $d['jenis_kelamin']; ?></td>
                            <td><?= $d['telepon']; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td><?= $d['alamat']; ?></td>
                            <td><?= $d['jam_masuk']; ?></td>
                            <td><?= $d['jam_keluar']; ?></td>
                            <td><?= $d['tanggal_ditambahkan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->