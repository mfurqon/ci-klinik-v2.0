<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('pesan'); ?>

            <!-- DataTales Pemesanan Obat -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-2"><?= $judul; ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th nowrap>Nama Pengguna</th>
                                    <th nowrap>No Invoice</th>
                                    <th nowrap>Tanggal Pemesanan</th>
                                    <th nowrap>Jam Pemesanan</th>
                                    <th nowrap>Status Pembayaran</th>
                                    <th nowrap>Total Pembayaran (Rp)</th>
                                    <th nowrap>Metode Pemesanan</th>
                                    <th nowrap>Pilihan Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pemesanan_obat as $po) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $po['nama']; ?></td>
                                        <td><?= $po['no_invoice']; ?></td>
                                        <td><?= $po['tanggal']; ?></td>
                                        <td><?= $po['jam']; ?></td>
                                        <td><?= $po['status_pembayaran']; ?></td>
                                        <td><?= number_format($po['total_pembayaran'], 0, ',', '.'); ?></td>
                                        <td><?= $po['metode_pembelian']; ?></td>
                                        <td><?= $po['metode_pembayaran']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/pemesanan-obat/hapus/') . $po['id_pemesanan']; ?>" class="btn btn-sm btn-danger" title="Hapus Data Pemesanan Obat" onclick="return confirm('Apakah anda yakin ingin menghapus data Pemesanan Obat dengan ID <?= $po['id_pemesanan'] ?>')">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
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