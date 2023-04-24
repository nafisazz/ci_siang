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
					<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
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
												<td>Nama</td>
												<td>Asal Universitas</td>
												<td>Divisi</td>
												<td>Tanggal Mulai</td>
												<td>Surat Magang</td>
												<td>Status</td>
												<td>Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($pendaftaran as $pendaftaran) : ?>
												<tr>
													<td class="text-center"><?= $pendaftaran['nama_peserta']; ?></td>
													<td class="text-center"><?= $pendaftaran['asal_sekolah']; ?></td>
													<td class="text-center"><?= $pendaftaran['divisi']; ?></td>
													<td class="text-center"><?= $pendaftaran['tgl_mulai']; ?></td>
													<td class="text-center"><a href="<?= base_url('assets/img/' . $pendaftaran['surat_ket']) ?>" class="btn btn-primary btn-sm" target="_blank" role="button" aria-pressed="true"><i class="fas fa-download fa-sm"></i> Lihat Surat</a></td>
													<td class="text-center"><?php
																			if ($pendaftaran['acc'] == 'lolos') {
																				echo '<span class="badge badge-success">Lolos</span>';
																			} else if ($pendaftaran['acc'] == 'belum') {
																				echo '<span class="badge badge-info">Belum</span>';
																			} else if ($pendaftaran['acc'] == 'ditolak') {
																				echo '<span class="badge badge-danger">Ditolak</span>';
																			} else if ($pendaftaran['acc'] == 'tidak_aktif') {
																				echo '<span class="badge badge-secondary">Selesai</span>';
																			}
																			?>
													</td>
													<td class="text-center"><b>
															<?php
															if ($pendaftaran['acc'] == 'tidak_aktif') {
																echo '<span><button type="button" href="" class="btn btn-info btn-sm" disabled><i class="fas fa-check fa-sm"></i></button></span></b>
    <span><button type="button" href="" class="btn btn-danger btn-sm" disabled><i class="fa fa-times fa-sm"></i></button></span>';
															} else {
																echo '<span><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#setujuModal' . $pendaftaran['id'] . '"><i class="fas fa-check fa-sm"></i></a></span></b>
    <span><a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tolakModal' . $pendaftaran['id'] . '"><i class="fa fa-times fa-sm"></i></a></span>';
															}
															?>

															<span><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal<?= $pendaftaran['id'] ?>"><i class="fa fa-eye fa-sm"></i></a></span>
													</td>
								</div>
								<!-- Modal Setuju -->
								<div class="modal fade" id="setujuModal<?= $pendaftaran['id'] ?>" tabindex="-1" aria-labelledby="setujuModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="setujuModalLabel">Perhatian !</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url('SendEmail/index/') . $pendaftaran['id']; ?>" method="POST" enctype="multipart/form-data">
													<p>Apakah anda yakin ingin mensetujui perizinan? Jika iya klik oke untuk melanjutkan</p>
													<input type="hidden" name="acc" value="lolos">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-success">Oke</button>
											</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Modal Detail -->
								<div class="modal fade" id="detailModal<?= $pendaftaran['id'] ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="detailModalLabel">Detail Data</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form>
													<div class="form-group">
														<label for="exampleFormControlInput1">Email</label>
														<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" readonly value="<?= $pendaftaran['email'] ?>">
													</div>
													<div class="form-group">
														<label for="exampleFormControlInput1">Nama Peserta</label>
														<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" readonly value="<?= $pendaftaran['nama_peserta'] ?>">
													</div>
													<div class="form-group">
														<label for="exampleFormControlTextarea1">Alamat Rumah</label>
														<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly value=""><?= $pendaftaran['alamat'] ?></textarea>
													</div>
													<div class="form-group">
														<label for="exampleFormControlInput1">Asal Sekolah/Universitas</label>
														<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" readonly value="<?= $pendaftaran['asal_sekolah'] ?>">
													</div>
													<div class="form-group">
														<label for="exampleFormControlInput1">Jurusan</label>
														<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" readonly value="<?= $pendaftaran['jurusan'] ?>">
													</div>
													<div class="form-group">
														<label for="exampleFormControlInput1">Nomor Induk Siswa/Mahasiswa</label>
														<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" readonly value="<?= $pendaftaran['nim'] ?>">
													</div>
													<div class="form-group">
														<label for="exampleFormControlTextarea1">Alamat Sekolah</label>
														<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly value=""><?= $pendaftaran['alamat_sekolah'] ?></textarea>
													</div>

												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-success" data-dismiss="modal">OKE</button>
												<!-- <button type="submit" class="btn btn-success">Oke</button> -->
											</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Modal Tolak -->
								<div class="modal fade" id="tolakModal<?= $pendaftaran['id'] ?>" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="tolakModalLabel">Perhatian !</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url('SendEmail/index/') . $pendaftaran['id']; ?>" method="POST" enctype="multipart/form-data">

													<input type="hidden" name="acc" value="ditolak">
													<div class="mb-3">
														<label for="exampleFormControlTextarea1" class="form-label">Alasan Penolakan</label>
														<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan" required>
														<?= $pendaftaran['alasan']; ?>
														</textarea>
													</div>
													<p>Apakah anda yakin ingin menolak perizinan? Jika iya klik oke untuk melanjutkan</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin ingin menolak perizinan?')">Oke</button>
											</div>
											</form>
										</div>
									</div>
								</div>

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

</body>

</html>
