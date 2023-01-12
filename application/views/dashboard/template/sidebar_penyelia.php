      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
              <div class="sidebar-brand-icon rotate-n-15">
                  <i class="fas fa-user-headset"></i>
              </div>
              <div class="sidebar-brand-text mx-3">Penyelia</div>
          </a>

          <!-- Divider -->
          <!-- <hr class="sidebar-divider my-0"> -->

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Interface
          </div>

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('penyelia/index') ?>">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
          </li>

          <hr class="sidebar-divider d-none d-md-block">
          <!-- Nav Item - Tables -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('penyelia/peserta') ?>">
                  <i class="fas fa-fw fa-users"></i>
                  <span>Data Peserta </span></a>
          </li>
          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('penyelia/laporan') ?>">
                  <i class="fas fa-fw fa-clipboard"></i>
                  <span>Laporan</span></a>
          </li>
          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('penyelia/penilaian') ?>">
                  <i class="fas fa-fw fa-clipboard"></i>
                  <span>Hasil Penilaian</span></a>
          </li>
          <hr class="sidebar-divider d-none d-md-block">
          <!-- Nav Item - Tables -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                  <i class="fas fa-fw fa-sign-out-alt"></i>
                  <span>Log out</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

      </ul>
      <!-- End of Sidebar -->