<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/template/backend/index3.html" class="brand-link">
        <img src="/template/backend/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SKU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link <?= $active == 'home' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= $active == 'file' ? 'menu-open' : ''; ?>">
                    <a href="/template/backend/#" class="nav-link <?= $active == 'file' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Files
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exit</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/template/backend/./index.html" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Data Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index2.html" class="nav-link active">
                                <i class="fas fa-truck nav-icon"></i>
                                <p>Data Kendaraan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Data Sopir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="fas fa-car nav-icon"></i>
                                <p>Status kendaraan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="/template/backend/#" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/template/backend/./index.html" class="nav-link">
                                <i class="fas fa-shipping-fast nav-icon"></i>
                                <p>Pengiriman Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index2.html" class="nav-link active">
                                <i class="fas fa-truck-loading nav-icon"></i>
                                <p>Bongkar Muat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="fa fa-ban nav-icon"></i>
                                <p>Batal Muat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>Pembayaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="/template/backend/#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/template/backend/./index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ekspedisi Terkirim</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index2.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Pembayaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Kendaraan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Sopir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/template/backend/./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Status Kendaraan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>