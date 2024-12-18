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

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahSpesialisasiModal">
                <i class="fas fa-fw fa-circle-plus"></i>
                Tambah Spesialisasi Dokter
            </a>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Spesialisasi Dokter</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($spesialisasi as $s) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $a++; ?></th>
                            <td class="text-center"><?= $s['nama']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('dokter/ubah_spesialisasi/') . $s['id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('dokter/hapus_spesialis/') . $s['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Apakah kamu yakin akan menghapus spesialisasi <?= $s['nama']; ?> ?');">
                                    <i class="fas fa-fw fa-trash"></i>
                                </a>
                            </td>
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



<!-- Modal -->
<div class="modal fade" id="tambahSpesialisasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahSpesialisasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSpesialisasiModalLabel">Tambah Spesialisasi Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('dokter/spesialisasi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="spesialisasi" class="form-label">Spesialisasi</label>
                        <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?= set_value('spesialisasi'); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>