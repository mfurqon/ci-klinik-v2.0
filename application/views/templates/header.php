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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'); ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/css/bootstrap-klinik.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/css/style-klinik.css'); ?>" rel="stylesheet">

    <!-- Custom styles Datatables -->
    <link href="<?= base_url('assets/vendor/DataTablesKlinik/datatables.min.css'); ?>" rel="stylesheet">

    <!-- My Font Awesome API -->
    <script src="https://kit.fontawesome.com/30e4c5624e.js" crossorigin="anonymous"></script>

    <title><?= $judul ?></title>

    <!-- Include the Bootstrap 4 Sweet Alert theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmSubmissionPesanObat(event) {
            var isConfirmed = confirm('Apakah anda sudah yakin buat pemesanan obat? Data yang sudah dikirim tidak dapat diubah!!');
            if (!isConfirmed) {
                event.preventDefault(); // Mencegah pengiriman form jika pengguna mengklik "Batal"
            }
        }
    </script>
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
                <a href="<?= base_url('home/dokter'); ?>" class="nav-item nav-link <?= ($judul == 'Dokter') ? 'text-primary' : ''; ?>">Dokter</a>
                <a href="<?= base_url('home/obat'); ?>" class="nav-item nav-link <?= ($judul == 'Obat') ? 'text-primary' : ''; ?> ">Obat</a>
                <a href="<?= base_url('home/tentang'); ?>" class="nav-item nav-link <?= ($judul == 'Tentang') ? 'text-primary' : ''; ?>">Tentang</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        Riwayat
                    </a>
                    <div class="dropdown-menu rounded-0 rounded-top rounded-bottom m-0">
                        <a href="<?= base_url('home/riwayat_janji_temu'); ?>" class="dropdown-item">Riwayat Janji Temu</a>
                        <a href="<?= base_url('home/riwayat_beli_obat'); ?>" class="dropdown-item">Riwayat Pembelian</a>
                    </div>
                </div>
                <?php if ($user) : ?>
                    <a href="<?= base_url('member/logout'); ?>" class="nav-item nav-link">
                        Logout
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('member'); ?>" class="nav-item nav-link">Login</a>
                <?php endif; ?>
                <a href="<?= base_url('obat/keranjang/' . $user['id']); ?>" class="nav-item nav-link position-relative">
                    <i class="fa-solid fa-lg fa-cart-shopping"></i>
                    <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">jumlah obat dalam keranjang</span>
                    </span>
                </a>
                <?php if ($user) : ?>
                    <a class="nav-item nav-link" href="<?= base_url('home/user/' . $user['id']); ?>">
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" style="max-width: 25px; max-height: 25px; border: 1px solid gray; position: relative; top: -3px;">
                    </a>
                <?php endif; ?>
            </div>
            <a href="<?= base_url('home/janji_temu'); ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Janji Temu<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>