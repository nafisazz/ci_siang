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
					<h1 class="h3 mb-4 text-gray-800">Daftar Project</h1>
					<a href="<?= base_url('penyelia/addtugas') ?>" class="btn btn-primary mb-3">Tambah Project</a>
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
												<td>No</td>
												<td>Nama</td>
												<td>Asal Universitas/ Sekolah</td>
												<td>Project</td>
												<td>Tanggal Mulai</td>
												<td>Tanggal Selesai</td>
												<td>Progress</td>
												<td>Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php foreach ($pendaftaran as $pendaftaran) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td class="text-center"><?= $pendaftaran->nama_peserta; ?></td>
													<td><?= $pendaftaran->asal_sekolah; ?></td>
													<td>
														<?= $pendaftaran->judul_tugas; ?>
													</td>

													<td>
														<?php
														$year = substr($pendaftaran->tanggal_mulai, 0, 4);
														$month = substr($pendaftaran->tanggal_mulai, 5, 2);
														$day = substr($pendaftaran->tanggal_mulai, 8, 2);
														echo $day . '-' . $month . '-' . $year;
														?>
													</td>

													<td>
														<?php
														$year = substr($pendaftaran->tanggal_selesai, 0, 4);
														$month = substr($pendaftaran->tanggal_selesai, 5, 2);
														$day = substr($pendaftaran->tanggal_selesai, 8, 2);
														echo $day . '-' . $month . '-' . $year;
														?>
													</td>

													<td>
														<?php
														echo '<div class="progress">'
															. '<div class="progress-bar" role="progressbar" style="width: ' . $pendaftaran->progress . '%" aria-valuenow="' . $pendaftaran->progress . '" aria-valuemin="0" aria-valuemax="100">' . $pendaftaran->progress . '%</div>'
															. '</div>';
														?>
													</td>

													<td>
														<a href="<?= base_url('admin/pendaftaran/assign/' . $pendaftaran->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-sm"></i></a>

														<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tugas<?= $pendaftaran->id; ?>">
															<i class="fa fa-edit fa-sm"></i>
														</button>

														<a href="<?= base_url('penyelia/deleteTugas/' . $pendaftaran->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash fa-sm"></i></a>

													</td>


												</tr>

												<div class="modal fade" id="tugas<?= $pendaftaran->id; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-scrollable">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="detailModalLabel">Update Project</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>

															<div class="modal-body">
																<?php echo form_open_multipart('penyelia/updateTugas'); ?>
																<div class="form-group" hidden>
																	<label for="exampleFormControlInput1">User id</label>
																	<input type="number" class="form-control user_id" name="user_id" id="user_id" placeholder="" value="<?= $pendaftaran->user_id; ?>">
																</div>

																<div class="form-group">
																	<label for="exampleFormControlInput1">Judul Project</label>
																	<input type="text" class="form-control" name="judul_project" id="exampleFormControlInput1" placeholder="" value="<?= $pendaftaran->judul_tugas; ?>">
																</div>

																<div class="form-group">
																	<label for="exampleFormControlTextarea1">Deskripsi Project</label>
																	<textarea class="form-control" name="deskripsi_project" id="exampleFormControlTextarea1" rows="3"><?= $pendaftaran->deskripsi_tugas; ?></textarea>
																</div>

																<div class="form-group w-30">
																	<label for="example-date-input" class="form-control-label">Tanggal Mulai</label>
																	<input class="form-control" name="tgl_mulai" type="date" value="<?= $pendaftaran->tanggal_mulai; ?>" id="example-date-input" required>
																</div>

																<div class="form-group w-30">
																	<label for="example-date-input" class="form-control-label">Perkiraan Selesai</label>
																	<input class="form-control" name="tgl_selesai" type="date" value="<?= $pendaftaran->tanggal_selesai; ?>" id="example-date-input" required>
																</div>

																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
																	<button class="btn btn-primary" id="btnSubmit" type="submit" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?');">Update</button>
																</div>
																<?php echo form_close(); ?>
															</div>
														</div>
													</div>



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
