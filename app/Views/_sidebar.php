<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[0] ?? null;
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="dist/img/logo-dprd.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SI Surat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= user()->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" id="home" class="nav-link <?= (!$uri1) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if (!in_groups('tu')) : ?>
                    <li class="nav-item">
                        <a href="suratMasuk" class="nav-link <?= ($uri1 == 'suratMasuk') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Surat Masuk
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="suratKeluar" class="nav-link <?= ($uri1 == 'suratKeluar') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-envelope-open"></i>
                        <p>
                            Surat Keluar
                        </p>
                    </a>
                </li>
                <?php if (!in_groups('admin')) : ?>
                    <li class="nav-item">
                        <a href="disposisi" class="nav-link <?= ($uri1 == 'disposisi') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>
                                Disposisi
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>