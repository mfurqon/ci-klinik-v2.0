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

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahJenisObatModal">
                <i class="fas fa-fw fa-circle-plus"></i>
                Tambah Jenis Obat
            </a>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Jenis Obat</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($jenis_obat as $jo) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $a++; ?></th>
                            <td class="text-center"><?= $jo['nama']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('obat/ubah_jenis_obat/') . $jo['id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('obat/hapus_jenis_obat/') . $jo['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Kamu yakin akan menghapus <?= $jo['nama']; ?> ?');">
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
<div class="modal fade" id="tambahJenisObatModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahObatModalLabel">Tambah Jenis Obat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('obat/jenis_obat'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jenis_obat" class="form-label">Jenis Obat</label>
                        <input type="text" class="form-control" id="jenis_obat" name="jenis_obat" value="<?= set_value('jenis_obat'); ?>">
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