<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion overflow-y-scroll" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-stethoscope rotate-n-15"></i>
            <!-- <i>
                <img class="img bg-white rounded p-1" src="<?= base_url('assets/img/logo-klinik-biru-remove-bg.webp'); ?>" alt="logo-klinik">
            </i> -->
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
        <li class="nav-item">
            <a href="<?= base_url('admin'); ?>" class="nav-link pb-0">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    <?php endif; ?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->