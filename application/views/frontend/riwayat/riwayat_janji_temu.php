<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mt-4 mb-2 text-gray-800"><?= $judul; ?></h1>
    <p class="text-danger mb-4">Catatan: Status hanya dapat dibatalkan jika status masih "Diproses"</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catatan Riwayat Janji Temu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables-klinik" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th nowrap>Nama Pengguna</th>
                            <th nowrap>Nama Dokter</th>
                            <th nowrap>Tanggal Janji Temu</th>
                            <th nowrap>Jam Janji Temu</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th nowrap>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($janji_temu as $jt) : ?>
                            <tr class="text-center">
                                <td><?= $no++; ?></td>
                                <td><?= $jt['nama_user']; ?></td>
                                <td><?= $jt['nama_dokter']; ?></td>
                                <td><?= $jt['tanggal_temu']; ?></td>
                                <td><?= $jt['jam_temu']; ?></td>
                                <td><?= $jt['keluhan']; ?></td>
                                <td><?= $jt['status']; ?></td>
                                <td><?= $jt['tanggal_dibuat']; ?></td>
                                <td nowrap>
                                    <button onclick="window.location.href='<?= base_url('riwayat/detail-janji-temu/') . $jt['id']; ?>'" class="btn btn-sm btn-primary" title="Detail Janji Temu">
                                        <i class="fa-solid fa-search"></i>
                                    </button>
                                    <?php if ($jt['status'] == "Diproses") : ?>
                                        <button class="btn btn-sm btn-success" onclick="showConfirmAlert(
                                        'Batalkan Janji Temu?',
                                        'Anda yakin ingin membatalkan janji dengan Dr. <?= $jt['nama_dokter']; ?>?',
                                        '<?= base_url('janji-temu/batalkan-janji-temu/' . $jt['id']); ?>'
                                        )">
                                            <i class="fa-solid fa-x" title="Batalkan Janji Temu"></i>
                                        </button>
                                    <?php else : ?>
                                        <button class="btn btn-sm btn-secondary" title="Batalkan Janji Temu">
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->