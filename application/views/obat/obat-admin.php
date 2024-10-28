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

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahObatModal">
                <i class="fas fa-fw fa-circle-plus"></i>
                Tambah Obat
            </a>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Nama Obat</th>
                        <th scope="col" class="text-center">Jenis Obat</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Stok</th>
                        <th scope="col" class="text-center">Kadaluwarsa</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($obat as $o) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $a++; ?></th>
                            <td class="text-center"><?= $o['nama_obat']; ?></td>
                            <td class="text-center"><?= $o['nama_jenis_obat']; ?></td>
                            <td class="text-center"><?= $o['harga']; ?></td>
                            <td class="text-center"><?= $o['stok']; ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($o['tanggal_kadaluwarsa'])); ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('obat/detailObat/') . $o['id']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                    <i class="fas fa-fw fa-search"></i>
                                </a>
                                <a href="<?= base_url('obat/ubahObat/') . $o['id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('obat/hapusObat/') . $o['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Kamu yakin akan menghapus <?= $o['nama_obat']; ?> ?');">
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
<div class="modal fade" id="tambahObatModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahObatModalLabel">Tambah Obat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('obat/obatAdmin'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= set_value('nama_obat'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="id_jenis_obat" class="form-label">Jenis Obat</label>
                        <select name="id_jenis_obat" id="id_jenis_obat" class="form-control">
                            <option value="">Pilih Jenis Obat</option>
                            <?php foreach ($jenis_obat as $jo) : ?>
                                <option value="<?= $jo['id']; ?>"><?= $jo['nama_jenis_obat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= set_value('deskripsi'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" value="<?= set_value('stok'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_kadaluwarsa" class="form-label">Tanggal Kadaluwarsa</label>
                        <input type="date" class="form-control" id="tanggal_kadaluwarsa" name="tanggal_kadaluwarsa">
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input mb-3" id="gambar_obat" name="gambar_obat">
                        <label for="gambar_obat" class="custom-file-label">Pilih Gambar Obat</label>
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