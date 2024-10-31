<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('pesan'); ?>

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#roleBaruModal">
                <i class="fas fa-fw fa-circle-plus"></i>
                Tambah Role
            </a>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    foreach ($role as $r) : ?>
                        <tr class="text-center">
                            <th scope="row"><?= $n++; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                                <a href="<?= base_url('user/ubah_role/') . $r['id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="<?= base_url('user/hapus_role/') . $r['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= 'role' . ' ' . $r['role']; ?> ?');" class="badge bg-gradient-light text-danger p-2" title="Hapus">
                                    <i class="fas fa-trash"></i>
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

<!-- Modal Tambah Anggota Baru -->
<div class="modal fade" id="roleBaruModal" tabindex="-1" role="dialog" aria-labelledby="roleBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleBaruModalLabel">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('user/role'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="role" name="role" placeholder="Masukkan Role" value="<?= set_value('role'); ?>">
                        <?= form_error('role', '<small class="text-danger pl-3>', '</small>') ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-ban"></i>
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah -->