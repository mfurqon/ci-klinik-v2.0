<style>
    .profile-image-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 2rem;
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
    }

    .edit-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .edit-icon:hover {
        background: #034fc8;
        transform: scale(1.1);
    }
</style>

<div class="container my-3 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8">
            <div class="card shadow">
                <div class="card-body p-5">
                    <h2 class="text-center text-primary mb-4">Edit Profile</h2>

                    <?= form_open_multipart('profile/ubah-profile'); ?>
                    <div class="profile-image-container">
                        <img src="<?= base_url('assets/img/profile/' . $user['gambar']); ?>" alt="Profile Picture" class="profile-image">
                        <label for="gambar" class="edit-icon bg-primary">
                            <input type="file" id="gambar" name="gambar" class="d-none">
                            <i class="fas fa-edit"></i>
                        </label>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label for="nama" class="col-sm-4 form-label mb-0">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label for="email" class="col-sm-4 form-label mb-0">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label for="telepon" class="col-sm-4 form-label mb-0">Nomor Telepon</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" value="<?= $user['telepon']; ?>">
                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label for="email" class="col-sm-4 form-label mb-0">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label for="telepon" class="col-sm-4 form-label mb-0">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control datetimepicker-input" placeholder="Pilih Hari" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user['tanggal_lahir_user']; ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger ps-2">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="alamat" class="col-sm-4 form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"><?= $user['alamat']; ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary px-4 me-4">Simpan Perubahan</button>
                            <button type="button" class="btn btn-outline-primary px-4" onclick="window.location.href='<?= base_url('profile'); ?>'">Batal</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>