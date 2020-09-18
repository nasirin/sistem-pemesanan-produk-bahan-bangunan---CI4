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
                <a href="#" class="d-block"><?= ucwords(session()->get('username')); ?></a>
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

                <!-- menu admin -->
                <?php if (session()->get('level') == 'admin') : ?>
                    <li class="nav-item has-treeview <?= $open == 'master' ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?= $open == 'master' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/pelanggan" class="nav-link <?= $active == 'pelanggan' ? 'active' : ''; ?>">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Data Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/kendaraan" class="nav-link <?= $active == 'kendaraan' ? 'active' : ''; ?>">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Data Kendaraan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/driver" class="nav-link <?= $active == 'driver' ? 'active' : ''; ?>">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Data Sopir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/sk" class="nav-link <?= $active == 'sk' ? 'active' : ''; ?>">
                                    <i class="fas fa-car nav-icon"></i>
                                    <p>Status kendaraan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?= $open == 'tansaksi' ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?= $open == 'tansaksi' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-cash-register"></i>
                            <p>
                                Transaksi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kirim" class="nav-link <?= $active == 'kirim' ? 'active' : ''; ?>">
                                    <i class="fas fa-shipping-fast nav-icon"></i>
                                    <p>Pengiriman Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/BM" class="nav-link <?= $active == 'bm' ? 'active' : ''; ?>">
                                    <i class="fas fa-truck-loading nav-icon"></i>
                                    <p>Bongkar Muat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/batal" class="nav-link <?= $active == 'batal' ? 'active' : ''; ?>">
                                    <i class="fa fa-ban nav-icon"></i>
                                    <p>Batal Muat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/bayar" class="nav-link <?= $active == 'bayar' ? 'active' : ''; ?>">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>Pembayaran</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#cetakSO" data-toggle="modal" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ekspedisi Terkirim</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#cetakPembayaran" data-toggle="modal" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Pembayaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/pelanggan" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/kendaraan" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Kendaraan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/supir" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Sopir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/sk" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Status Kendaraan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- menu manager -->
                <?php if (session()->get('level') == 'manager') : ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#cetakSO" data-toggle="modal" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ekspedisi Terkirim</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#cetakPembayaran" data-toggle="modal" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Pembayaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/pelanggan" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/kendaraan" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Kendaraan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/supir" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Sopir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/sk" class="nav-link" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Status Kendaraan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- menu pelanggan -->
                <?php if (session()->get('level') == 'pelanggan') : ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Print
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#cetakSOPel" data-toggle="modal" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cetak SO</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#cetakPembayaranPel" data-toggle="modal" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cetak Pembayaran</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="/auth/logout" class="nav-link" onclick="return confirm('Ingin keluar?')">
                        <i class="fa fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<?= $this->include('components/modal-print'); ?>