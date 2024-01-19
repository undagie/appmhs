<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Aplikasi Data Mahasiswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">@alfiannor</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url; ?>/home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url; ?>/fakultas" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Master Fakultas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url; ?>/programstudi" class="nav-link">
                        <i class="nav-icon fas fa-window-restore"></i>
                        <p>
                            Master Program Studi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url; ?>/mahasiswa" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Master Mahasiswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url; ?>/about" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            About Me
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>