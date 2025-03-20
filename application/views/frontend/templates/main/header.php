<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="klinik" name="keywords">
    <meta content="klinik" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'); ?>" rel="stylesheet" />

    <!-- Custom styles Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/css/bootstrap-klinik.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/css/style-klinik.css'); ?>" rel="stylesheet">

    <!-- My Font Awesome API -->
    <script src="https://kit.fontawesome.com/30e4c5624e.js" crossorigin="anonymous"></script>

    <!-- Include the Bootstrap 4 Sweet Alert theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" type="image/x-icon" href="assets/img/klinik/logo-klinik-biru-remove-bg.webp">

    <title><?= $judul ?></title>
    
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white p-0 shadow wow fadeIn" data-wow-delay="0.1s">
        <a class="navbar-brand d-flex align-items-center px-4 px-lg-5" href="<?= base_url(); ?>">
            <h1 class="m-0 text-primary">
                <img class="img" src="<?= base_url('assets/img/klinik/logo-klinik-biru-remove-bg.webp'); ?>" alt="logo-klinik">
                CI Klinik
            </h1>
        </a>

        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?= base_url(); ?>" class="nav-item nav-link <?= ($judul == 'Beranda') ? 'text-primary' : ''; ?>">Beranda</a>
                <a href="<?= base_url('dokter'); ?>" class="nav-item nav-link <?= ($judul == 'Dokter') ? 'text-primary' : ''; ?>">Dokter</a>
                <a href="<?= base_url('obat'); ?>" class="nav-item nav-link <?= ($judul == 'Obat') ? 'text-primary' : ''; ?> ">Obat</a>
                <a href="<?= base_url('tentang'); ?>" class="nav-item nav-link <?= ($judul == 'Tentang') ? 'text-primary' : ''; ?>">Tentang</a>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        Riwayat
                    </a>
                    <div class="dropdown-menu rounded-0 rounded-top rounded-bottom m-0">
                        <a href="<?= base_url('riwayat/janji-temu'); ?>" class="dropdown-item">Riwayat Janji Temu</a>
                        <a href="<?= base_url('riwayat/pemesanan-obat'); ?>" class="dropdown-item">Riwayat Pemesanan</a>
                    </div>
                </div>
                <?php if ($user) : ?>
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-item nav-link">
                        Logout
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('auth'); ?>" class="nav-item nav-link">Login</a>
                    <a href="<?= base_url('keranjang'); ?>" class="nav-item nav-link position-relative">
                        <i class="fa-solid fa-cart-shopping fa-lg"></i>
                    </a>
                <?php endif; ?>
                <?php if ($user) : ?>
                    <?php if ($data_keranjang > 0) : ?>
                        <a href="<?= base_url('keranjang'); ?>" class="nav-item nav-link position-relative">
                            <i id="cartIcon" class="fa-solid fa-cart-shopping fa-lg" data-judul="<?= $judul; ?>"></i>
                            <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $data_keranjang; ?>
                                <span class="visually-hidden">jumlah obat dalam keranjang</span>
                            </span>
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url('keranjang'); ?>" class="nav-item nav-link position-relative">
                            <i id="cartIcon" class="fa-solid fa-cart-shopping fa-lg" data-judul="<?= $judul; ?>"></i>
                        </a>
                    <?php endif; ?>
                    <a class="nav-item nav-link" href="<?= base_url('profile'); ?>">
                        <img class="img-profile rounded-circle" id="profileImage" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" style="width: 25px; height: 25px; object-fit: cover; border: 2px solid gray; position: relative; top: -3px;" data-judul="<?= $judul; ?>">
                    </a>
                <?php endif; ?>
            </div>
            <a href="<?= base_url('janji-temu'); ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Janji Temu<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

    <?php if ($this->session->flashdata('pesan')) : ?>
        <?php $pesan = $this->session->flashdata('pesan'); ?>
        <script>
            Swal.fire({
                title: '<?= $pesan['title'] ?>',
                text: '<?= $pesan['text'] ?>',
                icon: '<?= $pesan['icon'] ?>',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        </script>
    <?php endif; ?>