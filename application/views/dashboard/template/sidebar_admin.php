      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      	<!-- Sidebar - Brand -->
      	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      		<div class="sidebar-brand-icon rotate-n-15">
      			<i class="fas fa-user-headset"></i>
      		</div>
      		<div class="sidebar-brand-text mx-3">ADMIN</div>
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
      		<a class="nav-link" href="<?= base_url('admin/index') ?>">
      			<i class="fas fa-fw fa-tachometer-alt"></i>
      			<span>Dashboard</span></a>
      	</li>

      	<hr class="sidebar-divider d-none d-md-block">

      	<li class="nav-item dropdown">
      		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
      			<i class="fas fa-fw fa-clipboard"></i>
      			<span>Status Magang</span></a>
      		<ul class="dropdown-menu">
      			<li><a class="dropdown-item" href="<?= base_url('admin/statusMagang/2') ?>">Belum Verifikasi</a></li>
      			<li><a class="dropdown-item" href="<?= base_url('admin/statusMagang/1') ?>">Peserta Lolos</a></li>
      			<li><a class="dropdown-item" href="<?= base_url('admin/statusMagang/0') ?>">Peserta Ditolak</a></li>
      		</ul>
      	</li>

      	<hr class="sidebar-divider d-none d-md-block">

      	<li class="nav-item dropdown">
      		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
      			<i class="fas fa-fw fa-clipboard"></i>
      			<span>Data Mahasiswa</span></a>
      		<ul class="dropdown-menu">

      			<li><a class="dropdown-item" href="<?= base_url('admin/daftarDevisi/1') ?>">Divisi Humas</a></li>
      			<li><a class="dropdown-item" href="<?= base_url('admin/daftarDevisi/2') ?>">Divisi Tata Usaha</a></li>
      			<li><a class="dropdown-item" href="<?= base_url('admin/daftarDevisi/3') ?>">Divisi Perlengkapan</a></li>
      			<li><a class="dropdown-item" href="<?= base_url('admin/daftarDevisi/4') ?>">Divisi Rumah Tangga</a></li>
      			<li><a class="dropdown-item" href="<?= base_url('admin/daftarDevisi/5') ?>">Divisi Persidangan</a></li>
      		</ul>
      	</li>

      	<hr class="sidebar-divider d-none d-md-block">
      	<li class="nav-item">
      		<a class="nav-link" href="<?= base_url('admin/laporan') ?>">
      			<i class="fas fa-fw fa-clipboard"></i>
      			<span>Laporan</span></a>

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