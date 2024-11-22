<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <!-- Custom Font Awesome -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/30e4c5624e.js" crossorigin="anonymous"></script>

    <title><?= $judul ?></title>

    <!-- Include the Bootstrap 4 Sweet Alert theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmSubmissionJanjiTemu(event) {
            var isConfirmed = confirm('Apakah anda sudah yakin buat janji temu? Data yang sudah dikirim tidak dapat diubah!!');
            if (!isConfirmed) {
                event.preventDefault(); // Mencegah pengiriman form jika pengguna mengklik "Batal"
            }
        }

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
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
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
                    <?php if ($user) : ?>
                        <a href="<?= base_url('member/logout'); ?>" class="nav-item nav-link">Logout</a>
                    <?php else : ?>
                        <a href="<?= base_url('member'); ?>" class="nav-item nav-link">Login</a>
                    <?php endif; ?>
                </div>
                <!-- <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Janji Temu<i class="fa fa-arrow-right ms-3"></i></a> -->
            </div>
        </div>
    </nav>