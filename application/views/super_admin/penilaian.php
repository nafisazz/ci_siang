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
		<?php $this->load->view('dashboard/template/sidebar_superadmin') ?>
		<!-- end of sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view('dashboard/template/topbar_superadmin') ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<h1 class=" text-gray-800">Data Penilaian Magang</h1><br>
					<h3 class="mb-4 text-gray-800"><i class="fas fa-user"></i> <?= $peserta['nama_peserta'] ?></h3>
				</div>


				<!-- /.container-fluid -->
				<!-- ISI INDEX -->



				<!-- END ISI INDEX         -->
				<!-- Footer -->

				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Laporan Nilai </h6>
					</div>
					<div class="card-body">
						<div class="card text-center">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered table-hover datalaporan" id="datalaporan" width="100%" cellspacing="0">
										<thead class="text-center">
											<tr>
												<td>Inovasi</td>
												<td>Kerja Sama</td>
												<td>Disiplin</td>
												<td>Rata - Rata</td>

											</tr>
										</thead>
										<tbody>

											<?php foreach ($penilaian as $penilaian) : ?>
												<tr>
													<td class="text-center"><?= $penilaian['inovasi']; ?></td>
													<td class="text-center"><?= $penilaian['kerja_sama']; ?></td>
													<td class="text-center"><?= $penilaian['disiplin']; ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>



		<!-- Bootstrap core JavaScript-->
		<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


		<!-- Core plugin JavaScript-->
		<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

		<script>
			$(document).ready(function() {
				$('#datalaporan').DataTable({
					"pageLength": 10,
					order: [
						[0, 'desc']
					]
				});
			});
		</script>

</body>

</html>
