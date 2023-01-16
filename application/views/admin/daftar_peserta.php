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
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view('dashboard/template/sidebar_admin') ?>
		<!-- end of sidebar -->

		<!-- Content Wrapper -->
		<di id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view('dashboard/template/topbar_admin') ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800">

						<?php


						if ($judul == '1') {
							echo "Daftar Peserta Divisi Humas";
						} else if ($judul == 2) {
							echo 'Divisi Tata Usaha';
						} else if ($judul == 3) {
							echo 'Divisi Perlengkapan';
						} else if ($judul == 4) {
							echo 'Divisi Rumah Tangga';
						} else if ($judul == 5) {
							echo 'Divisi Persidangan';
						}

						?>



					</h1>
				</div>
				<!-- /.container-fluid -->
				<!-- ISI INDEX -->

				<div class="col-md-12">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-hover" id="tableUser">
										<thead>
											<tr>
												<td class="text-center">No</td>
												<td class="text-center">Nama</td>
												<td class="text-center">Asal Universitas</td>
												<td class="text-center">Divisi</td>
												<td class="text-center">Tanggal Mulai</td>
												<td class="text-center">Surat Magang</td>

											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php foreach ($divisi as $divisi) : ?>
												<tr>
													<td class="text-center"><?= $no++; ?></td>
													<td class="text-center"><?= $divisi->nama_peserta; ?></td>
													<td class="text-center"><?= $divisi->asal_sekolah; ?></td>
													<td class="text-center">

														<?php

														if ($divisi->divisi == 1) {
															echo "Humas";
														} else if ($divisi->divisi == 2) {
															echo "Tata Usaha";
														} else if ($divisi->divisi == 3) {
															echo "Perlengkapan";
														} else if ($divisi->divisi == 4) {
															echo "Rumah Tangga";
														} else if ($divisi->divisi == 5) {
															echo "Persidangan";
														}

														?>
													</td>
													<td class="text-center">
														<?php

														$tanggal = $divisi->tgl_mulai;
														$bulan = array(
															1 =>   'Januari',
															'Februari',
															'Maret',
															'April',
															'Mei',
															'Juni',
															'Juli',
															'Agustus',
															'September',
															'Oktober',
															'November',
															'Desember'
														);

														echo date('d', strtotime($tanggal)) . ' ' . $bulan[(int)date('m', strtotime($tanggal))] . ' ' . date('Y', strtotime($tanggal));


														?>
													</td>
													<td class="text-center"><a href="<?= base_url('assets/img/' . $divisi->surat_ket) ?>" class="btn btn-primary btn-sm" target="_blank" role="button" aria-pressed="true"><i class="fas fa-download fa-sm"></i> Lihat Surat</a></td>


												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>

							<!-- END ISI INDEX         -->
							<!-- Footer -->
							<?php $this->load->view('dashboard/template/footer_user') ?>
							<!-- End of Footer -->

						</div>
						<!-- End of Content Wrapper -->

					</div>
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
				<script src="<?= base_url('assets/vendor/jquery.dataTables.min.js'); ?>"></script>
				<script src="<?= base_url('assets/vendor/dataTables.bootstrap4.js'); ?>"></script>
				<script>
					$(document).ready(function() {
						$('#tableUser').DataTable();

					});
				</script>

</body>

</html>
