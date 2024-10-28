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

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahDokterModal">
                <i class="fas fa-fw fa-circle-plus"></i>
                Tambah Dokter
            </a>

            <table class="table table-hover">
                <thead class="bg-gradient-primary text-light">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Spesialisasi</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Ditambahkan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($dokter as $d) : ?>
                        <tr class="text-center">
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $d['nip']; ?></td>
                            <td><?= $d['nama_dokter']; ?></td>
                            <td><?= $d['spesialisasi']; ?></td>
                            <td><?= $d['jenis_kelamin']; ?></td>
                            <td><?= date('d-m-Y', strtotime($d['tanggal_ditambahkan'])); ?></td>
                            <td>
                                <a href="<?= base_url('dokter/detailDokter/') . $d['id']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                    <i class="fas fa-fw fa-search"></i>
                                </a>
                                <a href="<?= base_url('dokter/ubahDokter/') . $d['id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('dokter/hapusDokter/') . $d['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Kamu yakin akan menghapus <?= $d['nama_dokter']; ?> ?');">
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

            <form action="<?= base_url('dokter/dokterAdmin'); ?>" method="post" enctype="multipart/form-data">
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
                        <select name="spesialisasi" id="spesialisasi" class="form-control">
                            <option value="">Pilih Spesialisasi</option>
                            <option value="Umum">Umum</option>
                            <option value="Gigi">Gigi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
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

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar_dokter" name="gambar_dokter" value="<?= set_value('gambar_dokter'); ?>">
                        <label for="gambar_dokter" class="custom-file-label">Gambar Dokter</label>
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