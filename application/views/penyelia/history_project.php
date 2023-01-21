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
		<?php $this->load->view('dashboard/template/sidebar_penyelia') ?>
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
					<h1 class="h3 mb-4 text-gray-800">History Project</h1>
					<h5>"<?= $tugas['judul_tugas']; ?>"</h5>

					<div class="progress mt-2">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $tugas['progress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $tugas['progress']; ?>%"><?= $tugas['progress']; ?>%</div>
					</div>

				</div>
				<!-- /.container-fluid -->
				<!-- ISI INDEX -->
				<div class="col-md-12 mt-5">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Daftar Kegiatan</h6>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-hover" id="tableUser">
										<thead>
											<tr>
												<td>No</td>
												<td>Tanggal</td>
												<td>Isi Kegiatan</td>
												<td>Catatan</td>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php foreach ($history_project as $hs) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td>
														<?php
														$year = substr($hs->date_created, 0, 4);
														$month = substr($hs->date_created, 5, 2);
														$day = substr($hs->date_created, 8, 2);
														echo $day . '-' . $month . '-' . $year;
														?>
													</td>
													<td><?= $hs->isi_kegiatan; ?></td>
													<td><?= $hs->note; ?></td>




												</tr>




											<?php endforeach; ?>

								</div>
							</div>
						</div>
					</div>
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
