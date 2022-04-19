<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->


            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- QUERY MENU -->


            <!-- LOOPING MENU -->
            <div class="sidebar-heading">
                Autentikasi
            </div>

            <!-- LOOPING SUBMENU -->


            <li class="nav-item active">
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('Pengunjung'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
                <a class="nav-link pb-0" href="<?= base_url('Autentikasi'); ?>">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span></a>
                <a class="nav-link pb-0" href="<?= base_url('Autentikasi/Register') ?>">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Register</span></a>
            </li>
            <hr class="sidebar-divider mt-3">

            <div class="sidebar-heading">
                Pengunjung
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Pengunjung/Galeri') ?>">
                    <i class="fas fa-photo-video"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>