  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-success navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-success-primary elevation-4 bg-light">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="<?= base_url() ?>/assets/dist/img/logodesa.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Desa Tegal Maja</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>/assets/dist/img/logouserr.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin" class="d-block">Dashboard</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/masyarakat" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Masyarakat
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/pembayaran" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/dusun" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Dusun
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/petugas/index" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                <?php
                echo "Data petugas";
                ?>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/login/logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>