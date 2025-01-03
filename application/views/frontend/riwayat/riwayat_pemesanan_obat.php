<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mt-4 mb-2 text-gray-800"><?= $judul; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catatan Riwayat Pemesanan Obat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables-klinik" width="100%" cellspacing="0">
                    <thead class="align-middle">
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
                                <td nowrap>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url('riwayat/pemesanan-obat/print/') . $po['id_pemesanan']; ?>" title="Print Invoice">
                                        <i class="fas fa-fw fa-print"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="<?= base_url('riwayat/pemesanan-obat/export-pdf/') . $po['id_pemesanan']; ?>" title="Export to PDF Invoice">
                                        <i class="fas fa-fw fa-file-pdf"></i>
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
<!-- End Content Page -->