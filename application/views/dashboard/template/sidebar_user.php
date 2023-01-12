      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">USER</div>
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
    <a class="nav-link" href="<?= base_url('user/index') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('user/editprofil') ?>">
        <i class="fas fa-fw fa-user-edit"></i>
        <span>Edit Profil</span></a>
</li>
<hr class="sidebar-divider d-none d-md-block">
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('user/kegiatan') ?>">
        <i class="fas fa-fw fa-user-edit"></i>
        <span>Kegiatan Magang</span></a>
</li>
<hr class="sidebar-divider d-none d-md-block">
<!--Nav Item - Tables -->
 <!-- <li class="nav-item">
    <a class="nav-link" href="<?= base_url('user/laporan') ?>">
        <i class="fas fa-fw fa-user-edit"></i>
        <span>Laporan Magang</span></a>
</li>
<hr class="sidebar-divider d-none d-md-block"> -->
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