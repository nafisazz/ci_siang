<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view('dashboard/template/sidebar_user') ?>
		<!-- end of sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view('dashboard/template/topbar_user') ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
				</div>
				<!-- /.container-fluid -->
				<!-- ISI INDEX -->
				<!-- Pengumuman hasil seleksi -->

				<div class="col-md-12">

					<div class="row">

						<div class="col-lg-6">
							<?= $this->session->flashdata('message'); ?>
						</div>

						<?php
						if ($this->session->userdata('divisi') != '') {
							require_once('penentuan.php');
						} else if ($this->session->flashdata('success_insert')) {
							require_once('tungguacc.php');
						} else {
							require_once('submitform.php');
						}
						?>


						<!-- End of Main Content -->

						<!-- data diri -->
						<div class="col-md-12">

							<div class="col-md-12">
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
									</div>
									<div class="card-body">
										<div class="card-body">
											<div class="col-auto mt-3 text-center">
												<img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $nama['image']; ?> " style="width: 200px; height: 200px;">
												<div class="text-right">
													<a href="editprofil" class="btn btn-warning btn-sm">Edit Profil</a>
												</div>
											</div>
											<h5 class="card-title mb-3 text-center">
												<?= $nama['nama_peserta'] ?>
											</h5>
											<ul class="list-group">
												<li class="list-group-item">
													<h6 class="mb-0" style="color: black;">Alamat Rumah</h6>
													<small class="text-muted"><?= $nama['alamat'] ?></small>
												</li>
												<!-- <li class="list-group-item">
													<h6 class="mb-0" style="color: black;">Agama</h6>
													<small class="text-muted"><?= $nama['agama'] ?></small>
												</li> -->
												<li class="list-group-item">
													<h6 class="mb-0" style="color: black;">Asal Sekolah/Universitas</h6>
													<small class="text-muted"><?= $nama['asal_sekolah'] ?></small>
												</li>
												<li class="list-group-item">
													<h6 class="mb-0" style="color: black;">Jurusan</h6>
													<small class="text-muted"><?= $nama['jurusan'] ?></small>
												</li>
												<ul class="list-group">
													<li class="list-group-item">
														<h6 class="mb-0" style="color: black;">Nomor Induk Siswa/Mahasiswa</h6>
														<small class="text-muted"><?= $nama['nim'] ?></small>
													</li>
													<li class="list-group-item">
														<h6 class="mb-0" style="color: black;">Email</h6>
														<small class="text-muted"><?= $nama['email'] ?></small>
													</li>
													<li class="list-group-item">
														<h6 class="mb-0" style="color: black;">Nomor Telepon</h6>
														<small class="text-muted"><?= $nama['no_telp'] ?></small>
													</li>
												</ul>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>


					<!-- end data diri -->

					<!-- END ISI INDEX         -->
					<!-- Footer -->
					<?php $this->load->view('dashboard/template/footer_user') ?>
					<!-- End of Footer -->

				</div>
				<!-- End of Content Wrapper -->

			</div>
			<!-- End of Page Wrapper -->

			<!-- Scroll to Top Button-->
			<a class="scroll-to-top rounded" href="#page-top">
				<i class="fas fa-angle-up"></i>
			</a>

			<!-- Logout Modal-->
			<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Bootstrap core JavaScript-->
			<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- Core plugin JavaScript-->
			<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

			<!-- Custom scripts for all pages-->
			<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
