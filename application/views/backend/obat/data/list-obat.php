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

            <!-- DataTales Obat -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary d-inline-block mt-2">Data Obat</h5>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahObatModal">
                        <i class="fas fa-fw fa-circle-plus"></i>
                        Tambah Obat
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Harga (Rp)</th>
                                    <th>Stok</th>
                                    <th>Tanggal Kedaluwarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($obat as $o) : ?>
                                    <tr>
                                        <td><?= $o['nama_obat']; ?></td>
                                        <td><?= $o['nama_jenis_obat']; ?></td>
                                        <td><?= number_format($o['harga']); ?></td>
                                        <td><?= $o['stok']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($o['tanggal_kedaluwarsa'])); ?></td>
                                        <td>
                                            <a href="<?= base_url('obat/detail_obat/') . $o['id_obat']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                                <i class="fas fa-fw fa-search"></i>
                                            </a>
                                            <a href="<?= base_url('obat/ubah_obat/') . $o['id_obat']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                                <i class="fas fa-fw fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('obat/hapus_obat/') . $o['id_obat']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Apakah kamu yakin akan menghapus obat <?= $o['nama_obat']; ?> ?');">
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

            <form action="<?= base_url('obat'); ?>" method="post" enctype="multipart/form-data">
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
                                <option value="<?= $jo['id']; ?>"><?= $jo['nama']; ?></option>
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
                        <label for="tanggal_kedaluwarsa" class="form-label">Tanggal Kedaluwarsa</label>
                        <input type="date" class="form-control" id="tanggal_kedaluwarsa" name="tanggal_kedaluwarsa">
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