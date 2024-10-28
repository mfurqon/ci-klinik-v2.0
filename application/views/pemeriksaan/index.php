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

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahPemeriksaanModal">
                <i class="fas fa-fw fa-circle-plus"></i>
                Tambah Data Pemeriksaan
            </a>

            <table class="table table-hover table-responsive">
                <thead class="bg-gradient-primary text-white">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Tanggal Pemeriksaan</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($pemeriksaan as $p) : ?>
                        <tr class="text-center">
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $p['nama_pasien']; ?></td>
                            <td><?= $p['jenis_kelamin']; ?></td>
                            <td><?= $p['tanggal_lahir']; ?></td>
                            <td><?= $p['telepon']; ?></td>
                            <td><?= date('d-m-Y', strtotime($p['tanggal_pemeriksaan'])); ?></td>
                            <td><?= $p['status_pembayaran']; ?></td>
                            <td>
                                <a href="<?= base_url('pemeriksaan/detailPemeriksaan/') . $p['id']; ?>" class="badge bg-gradient-light p-2" title="Lihat">
                                    <i class="fas fa-fw fa-search"></i>
                                </a>
                                <a href="<?= base_url('pemeriksaan/ubahPemeriksaan/') . $p['id']; ?>" class="badge bg-gradient-light text-success p-2" title="Ubah">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('pemeriksaan/hapusPemeriksaan/') . $p['id']; ?>" class="badge bg-gradient-light text-danger p-2" title="Hapus" onclick="return confirm('Kamu yakin akan menghapus <?= $p['nama_pasien']; ?> ?');">
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
<div class="modal fade" id="tambahPemeriksaanModal" tabindex="-1" role="dialog" aria-labelledby="tambahPemeriksaanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPemeriksaanModalLabel">Tambah Pemeriksaan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('pemeriksaan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php
                    $date = date('Y-m-d'); ?>
                    <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" value="<?= $date; ?>" hidden>

                    <div class="form-group">
                        <label for="nama_pasien" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= set_value('nama_pasien'); ?>">
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
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="telepon" class="form-label">Nomor Telepon</label>
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
                        <label for="nama_dokter" class="form-label">Nama Dokter</label>
                        <select name="nama_dokter" id="nama_dokter" class="form-control">
                            <option value="">Pilih Nama Dokter</option>
                            <?php foreach ($dokter as $d) : ?>
                                <option value="<?= $d['nama_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control" placeholder="Catatan tambahan pasien (opsional)"><?= set_value('catatan'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                        <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                            <option value="">Pilih Status Pembayaran</option>
                            <option value="Sudah Bayar">Sudah Bayar</option>
                            <option value="Belum Bayar">Belum Bayar</option>
                        </select>
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