<!-- Begin Page Content -->

<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">

            <!-- DataTales Dokter -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-3">Data Dokter</h5>
                    <div>
                        <a href="<?= base_url('admin/laporan/print-dokter'); ?>" class="btn btn-warning mb-3">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="<?= base_url('admin/laporan/export-pdf-dokter'); ?>" class="btn btn-danger mb-3">
                            <i class="far fa-file-pdf"></i> Download PDF
                        </a>
                        <a href="<?= base_url('admin/laporan/export-excel-dokter'); ?>" class="btn btn-success mb-3">
                            <i class="far fa-file-excel"></i> Export ke Excel
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokter</th>
                                    <th>NIP</th>
                                    <th>Spesialisasi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Tanggal Ditambahkan</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($dokter as $d) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_dokter']; ?></td>
                                        <td><?= $d['nip']; ?></td>
                                        <td><?= $d['nama_spesialisasi']; ?></td>
                                        <td><?= $d['jenis_kelamin']; ?></td>
                                        <td><?= $d['telepon']; ?></td>
                                        <td><?= $d['email']; ?></td>
                                        <td><?= $d['alamat']; ?></td>
                                        <td><?= $d['jam_masuk']; ?></td>
                                        <td><?= $d['jam_keluar']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($d['tanggal_ditambahkan'])); ?></td>
                                        <td>
                                            <picture>
                                                <img src="<?= base_url('assets/img/upload-dokter/' . $d['gambar']); ?>" alt="gambar_dokter" style="max-width: 100px; max-height: 100px;">
                                            </picture>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->