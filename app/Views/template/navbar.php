<div class="horizontal-menu">
    <!-- navbar atas -->
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <!-- <ul class="navbar-nav navbar-nav-left">
                    <li class="nav-item ml-0 mr-5 d-lg-flex d-none">
                        <a href="#" class="nav-link horizontal-nav-left-menu">
                            <i class="mdi mdi-format-list-bulleted"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="mdi mdi-bell mx-0"></i>
                            <span class="count bg-success">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-information mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-account-box mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                            id="messageDropdown" href="#" data-toggle="dropdown">
                            <i class="mdi mdi-email mx-0"></i>
                            <span class="count bg-primary">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="messageDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?= base_url() ?>/assets/images/faces/face4.jpg" alt="image"
                                        class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?= base_url() ?>/assets/images/faces/face2.jpg" alt="image"
                                        class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        New product launch
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?= base_url() ?>/assets/images/faces/face3.jpg" alt="image"
                                        class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal"> <?= session()->get('name') ?>
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        Upcoming board meeting
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link count-indicator "><i class="mdi mdi-message-reply-text"></i></a>
                    </li>
                    <li class="nav-item nav-search d-none d-lg-block ml-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="search">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="search" aria-label="search"
                                aria-describedby="search">
                        </div>
                    </li>
                </ul> -->
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="index.html"><img
                            src="https://sinergydep.co.id/images/sdp-logo.png" style="width: 150px; height: 70px;" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img
                            src="https://sinergydep.co.id/images/sdp-logo-white.png" alt="logo" /></a>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <span class="nav-profile-name"><?= session()->get('name') ?></span>
                            <span class="online-status"></span>
                            <?php if (!session()->get('photo')): ?>
                                <img src="<?= base_url() ?>/assets/images/faces/blank.png" alt="profile" />
                            <?php else :?>
                                <img src="<?= base_url('img') ?>/<?= session()->get('photo')?>" alt="profile" />
                            <?php endif ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?= base_url('profile') ?>">
                                <i class="mdi mdi-account text-primary"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- navbar bawah -->
    <nav class="bottom-navbar">
        <div class="container px-5">
            <ul class="nav page-navigation">
                <li class="nav-item">
                <?php if (session()->get('role') == 'staff') : ?>
                    <a class="nav-link" href="<?= base_url() ?>/staff">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                <?php elseif (session()->get('role') == 'admin') : ?>
                    <a class="nav-link" href="<?= base_url('Admin/AdminController/') ?>">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                <?php elseif (session()->get('role') == 'gudang') : ?>
                    <a class="nav-link" href="<?= base_url('Gudang/GudangController/') ?>">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                <?php elseif (session()->get('role') == 'finance') : ?>
                    <a class="nav-link" href="<?= base_url('Finance/FinanceController/') ?>">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                <?php elseif (session()->get('role') == 'manager') : ?>
                    <a class="nav-link" href="<?= base_url('Manager/ManagerController/') ?>">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <?php endif ?>
                <?php if (session()->get('role') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/admin/AdminController/pengguna">
                        <i class="bi bi-people-fill menu-icon"></i>
                        <span class="menu-title">Pengguna</span>
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-worker menu-icon"></i>
                        <span class="menu-title">Operasional</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <?php if (session()->get('role') == 'staff') : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= site_url() ?>staff/OperasionalController">Pengajuan Dana Operasional</a></li>
                            <?php elseif (session()->get('role') == 'gudang') : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= site_url() ?>staff/OperasionalController">Pengajuan Dana Operasional</a></li>
                            <?php elseif (session()->get('role') == 'manager') : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= site_url('manager/OperasionalController') ?>">Verifikasi Pengajuan Operasional</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= site_url('manager/OperasionalController/showReportOperasional') ?>">Report Pengajuan Operasional</a></li>
                            <?php elseif (session()->get('role') == 'finance') : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= site_url('finance/OperasionalController') ?>">Verifikasi Pengajuan Operasional</a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Gudang</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <?php if (session()->get('role') == 'staff') : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('staff/BarangController/permintaanBarang'); ?>">Pengajuan<br>
                                    Permintaan Barang</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('staff/BarangController'); ?>">
                                    Inventaris</a></li>
                            <?php elseif (session()->get('role') == 'manager') : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('manager/BarangController/permintaanBarang'); ?>">Verifikasi<br>
                                    Permintaan Barang</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('manager/BarangController'); ?>">
                                    Inventaris</a></li>
                            <?php elseif (session()->get('role') == 'finance') : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('finance/BarangController'); ?>">
                                    Inventaris</a></li>
                            <?php elseif (session()->get('role') == 'admin') : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/AdminController/gudang'); ?>">
                                    Inventaris</a></li>
                            <?php elseif (session()->get('role') == 'gudang') : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('gudang/BarangController/permintaanBarang'); ?>">Verifikasi<br>
                                    Permintaan Barang</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('gudang/BarangController'); ?>">
                                    Inventaris</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('gudang/BarangController/kelolaInventaris'); ?>">Kelola
                                    Inventaris</a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>