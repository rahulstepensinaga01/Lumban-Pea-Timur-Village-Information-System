<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Pengguna') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mt-3">Sistem Informasi Desa Lumban Pea</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- QUERY MENU -->
            <?php
            $id_role = $this->session->userdata('id_role');
            $queryMenu = "SELECT tb_menu.id_menu , menu
                                FROM tb_menu JOIN tb_akses_menu
                                ON tb_menu.id_menu = tb_akses_menu.id_menu
                                WHERE tb_akses_menu.id_role = $id_role
                                ORDER BY tb_akses_menu.id_menu ASC";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
                <div class="sidebar-heading">
                    <?= $m['menu']; ?>
                </div>

                <!-- LOOPING SUBMENU -->
                <?php
                $menuID = $m['id_menu'];
                $querySubMenu = "SELECT * FROM tb_sub_menu
                                    JOIN tb_menu
                                    ON tb_sub_menu.id_menu = tb_menu.id_menu
                                    WHERE tb_sub_menu.id_menu = $menuID
                                    AND tb_sub_menu.is_active = 1";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['nama_menu']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['nama_menu']; ?></span></a>
                        </li>
                    <?php endforeach; ?>
                    <hr class="sidebar-divider mt-3">
                <?php endforeach; ?>

                <!-- Nav Item - Dashboard -->


                <!-- Divider -->

                <!-- Heading -->
                <!-- <div class="sidebar-heading">
                    Pengguna
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('Admin/profil') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </li> -->

                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Kependudukan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="<?= base_url('Admin/DaftarPenduduk') ?>">Daftar Penduduk</a>
                            <a class="collapse-item" href="<?= base_url('Admin/DaftarPendudukAktivasi') ?>">Daftar Penduduk Aktivasi</a>
                        </div>
                    </div>
                </li> -->

                <!-- Nav Item - Utilities Collapse Menu -->
                <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Keuangan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="utilities-color.html">Uang kas</a>
                            <a class="collapse-item" href="utilities-border.html">Borders</a>
                            <a class="collapse-item" href="utilities-animation.html">Animations</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a>
                        </div>
                    </div>
                </li> -->

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>