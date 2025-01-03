<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion overflow-y-scroll" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-stethoscope rotate-n-15"></i> -->
            <i>
                <img class="img bg-white rounded p-1" src="<?= base_url('assets/img/klinik/logo-klinik-biru-remove-bg.webp'); ?>" alt="logo-klinik">
            </i>
        </div>
        <div class="sidebar-brand-text mx-3">CI Klinik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->

    <?php if ($user['role_id'] == 1) : ?>
        <li class="nav-item <?= ($judul == "Dashboard") ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?= ($judul == "Data Obat") ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/obat'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-capsules"></i>
                <span>Data Obat</span>
            </a>
        </li>
        <li class="nav-item <?= ($judul == "Data Jenis Obat") ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/jenis-obat'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-tablets"></i>
                <span>Data Jenis Obat</span>
            </a>
        </li>
        <li class="nav-item <?= ($judul == "Data Dokter") ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/dokter'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-user-doctor"></i>
                <span>Data Dokter</span>
            </a>
        </li>
        <li class="nav-item <?= ($judul == "Data Spesialisasi Dokter") ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/spesialisasi'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-stethoscope"></i>
                <span>Data Spesialisasi Dokter</span>
            </a>
        </li>
        <li class="nav-item <?= ($judul == "Data Anggota") ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/users'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Anggota</span>
            </a>
        </li>
        <li class="nav-item <?= ($judul == "Data Role") ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/role'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Data Role</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item <?= ($judul == "Data Janji Temu") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/janji-temu'); ?>" class="nav-link pb-0">
            <i class="fas fa-fw fa-calendar-days"></i>
            <span>Data Janji Temu</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == "Data Pemesanan Obat") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/pemesanan-obat'); ?>" class="nav-link pb-0">
            <i class="fas fa-fw fa-pills"></i>
            <span>Data Pemesanan Obat</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item <?= ($judul == "Laporan Data Obat") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/laporan/obat'); ?>" class="nav-link pb-0">
            <i class="fa-fw fa-solid fa-clipboard"></i>
            <span>Laporan Data Obat</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == "Laporan Data Dokter") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/laporan/dokter'); ?>" class="nav-link pb-0">
            <i class="fa-fw fa-solid fa-clipboard"></i>
            <span>Laporan Data Dokter</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == "Laporan Data User") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/laporan/user'); ?>" class="nav-link pb-0">
            <i class="fa-fw fa-solid fa-clipboard"></i>
            <span>Laporan Data User</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == "Laporan Janji Temu") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/laporan/janji-temu'); ?>" class="nav-link pb-0">
            <i class="fa-fw fa-solid fa-clipboard"></i>
            <span>Laporan Janji Temu</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == "Laporan Pemesanan Obat") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/laporan/pemesanan-obat'); ?>" class="nav-link pb-0">
            <i class="fa-fw fa-solid fa-clipboard"></i>
            <span>Laporan Pemesanan Obat</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item <?= ($judul == "Beranda") ? 'active' : ''; ?>">
        <a href="<?= base_url(); ?>" class="nav-link pb-0">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == "Profil Saya") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/profile'); ?>" class="nav-link pb-0">
            <i class="fa-regular fa-user"></i>
            <span>Profil Saya</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == "Logout") ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/auth/logout'); ?>" class="nav-link pb-0">
            <i class="fas fa-fw fa-sign-out"></i>
            <span>Logout</span>
        </a>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-3">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->