<div class="container vh-100 d-flex justify-content-center align-items-center">

    <!-- Outer Row -->
    <div class="row justify-content-center w-100">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5 bg-transparent-blur">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-primary mb-5">Login Member</h1>
                                </div>

                                <?= $this->session->flashdata('pesan'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan alamat email..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small text-primary" href="<?= base_url('auth/daftar'); ?>">Buat akun!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small text-primary" href="<?= base_url(); ?>">Kembali ke Beranda</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>