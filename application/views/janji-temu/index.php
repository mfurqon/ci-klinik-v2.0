<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('pesan') ?>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Tanggal Temu</th>
                        <th scope="col">Jam Temu</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($janji_temu as $jt) : ?>
                        <tr class="text-center">
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $jt['nama']; ?></td>
                            <td><?= $jt['email']; ?></td>
                            <td><?= $jt['nama_dokter']; ?></td>
                            <td><?= date('d-m-Y', strtotime($jt['tanggal_temu'])); ?></td>
                            <td><?= $jt['jam_temu']; ?></td>
                            <td><?= date('d-m-Y', strtotime($jt['tanggal_dibuat'])); ?></td>
                            <td class="">
                                <a href="<?= base_url('janjiTemu/detailJanjiTemu/') . $jt['id']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                    <i class="fas fa-fw fa-search"></i>
                                </a>
                                <a href="<?= base_url('janjiTemu/ubahJanjiTemu/') . $jt['id']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('janjiTemu/hapusJanjiTemu/') . $jt['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Kamu yakin akan menghapus data janji temu <?= $jt['nama']; ?> ?');">
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
<div class="modal fade" id="tambahDokterModal" tabindex="-1" role="dialog" aria-labelledby="tambahDokterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDokterModalLabel">Tambah Dokter Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('dokter/dokterAdmin'); ?>" method="post">
                <?php
                $date = date('Y-m-d'); ?>
                <input type="date" class="form-control" id="tanggal_ditambahkan" name="tanggal_ditambahkan" value="<?= $date; ?>" hidden>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama_dokter" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= set_value('nama_dokter'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="spesialisasi" class="form-label">Spesialisasi</label>
                        <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?= set_value('spesialisasi'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= set_value('telepon'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="jam_masuk" class="form-label">Jam Masuk</label>
                        <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?= set_value('jam_masuk'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="jam_keluar" class="form-label">Jam Keluar</label>
                        <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="<?= set_value('jam_keluar'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="gambar_dokter" class="form-label">Gambar Dokter</label>
                        <input type="file" class="form-control" id="gambar_dokter" name="gambar_dokter" value="<?= set_value('gambar_dokter'); ?>">
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