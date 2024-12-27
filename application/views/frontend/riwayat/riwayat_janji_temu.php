<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mt-4 mb-2 text-gray-800"><?= $judul; ?></h1>
    <p class="text-danger mb-4">Catatan: Jika Status sudah berubah menjadi Dijadwalkan, Janji Temu tidak dapat dibatalkan</p>

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
                            <th>Nama Pengguna</th>
                            <th>Nama Dokter</th>
                            <th>Tanggal Janji Temu</th>
                            <th>Jam Janji Temu</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($janji_temu as $jt) : ?>
                        <tbody>
                            <tr>
                                <td><?= $jt['nama_user']; ?></td>
                                <td><?= $jt['nama_dokter']; ?></td>
                                <td><?= $jt['tanggal_temu']; ?></td>
                                <td><?= $jt['jam_temu']; ?></td>
                                <td><?= $jt['keluhan']; ?></td>
                                <td><?= $jt['status']; ?></td>
                                <td><?= $jt['tanggal_dibuat']; ?></td>
                                <td>
                                    <?php if ($jt['status'] == "Diproses") : ?>
                                        <button class="btn btn-outline-primary" onclick="showConfirmAlert(
                                        'Batalkan Janji Temu?',
                                        'Anda yakin ingin membatalkan janji dengan Dr. <?= $jt['nama_dokter']; ?>?',
                                        '<?= base_url('janji-temu/batalkan-janji-temu/' . $jt['id']); ?>'
                                        )">
                                            Batalkan
                                        </button>
                                    <?php else : ?>
                                        <a class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-fw fa-edit"></i>
                                            Lihat Detail
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->