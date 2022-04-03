<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item ">
        <span class="nav-link font-weight-bold">Hi, <?= session('nama_user'); ?></span>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/AuthController/logout">
          <span class="text-danger font-weight-bold">Logout</span>
        </a>        
      </li>
          
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-bold">SIMPEG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">          
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                                  
                
                <li class="nav-item <?= (session('level') == 2) ? '' : 'd-none'; ?>">
                    <a href="<?= base_url() ?>/dashboard" class="nav-link  <?= ($active == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (session('level') == 1) ? '' : 'd-none'; ?>">
                    <a href="<?= base_url() ?>/gaji" class="nav-link  <?= ($active == 'gaji') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Data Gaji
                        </p>
                    </a>
                </li>
            <li class="nav-item">
                <a href="<?= base_url(); ?>/pegawai" class="nav-link <?= ($active == 'pegawai') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Data Pegawai
                </p>
                </a>
            </li>  
            <li class="nav-item <?= (session('level') == 1) ? '' : 'd-none'; ?>">
                <a href="<?= base_url() ?>/kontrak" class="nav-link <?= ($active == 'kontrak') ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Data Kontrak
                    </p>
                </a>
            </li>     
            <li class="nav-item <?= (session('level') == 1) ? '' : 'd-none'; ?>">
                    <a href="<?= base_url() ?>/pengeluaran" class="nav-link <?= ($active == 'peng') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Pengeluaran
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-close <?= (session('level') == 3) ? 'd-none' : ''; ?>">
                    <a href="#" class="nav-link <?= ($active == 'laporan_p') ? 'active' : ''; ?> <?= ($active == 'laporan_k') ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-print"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/laporan-kontrak" class="nav-link <?= ($active == 'laporan_k') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Kontrak</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/laporan-keuangan" class="nav-link <?= ($active == 'laporan_p') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Keuangan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </li> 
            <li class="nav-item <?= (session('level') == 2) ? 'd-none' : ''; ?>">
                    <a href="<?= base_url() ?>/slip-gaji" class="nav-link <?= ($active == 'slip') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Slip Gaji
                        </p>
                    </a>
            </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>