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
                    <h1 class="h3 mb-4 text-gray-800">Hasil Penilaian</h1>
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
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td>Nama</td>
                                                <td>Asal Universitas</td>
                                                <td>Tanggal Mulai</td>
                                                <td>Tanggal Selesai</td>
                                                <td>Status</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($pendaftaran as $pendaftaran) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $pendaftaran['nama_peserta']; ?></td>
                                                    <td class="text-center"><?= $pendaftaran['asal_sekolah']; ?></td>
                                                    <td class="text-center"><?= $pendaftaran['tgl_mulai']; ?></td>
                                                    <td class="text-center"><?= $pendaftaran['tgl_selesai']; ?></td>
                                                    <td class="text-center"><?php
                                                                            if ($pendaftaran['acc'] == 'lolos') {
                                                                                echo '<span class="badge badge-primary">Aktif</span>';
                                                                            } else if ($pendaftaran['acc'] == 'belum') {
                                                                                echo '<span class="badge badge-info">Belum</span>';
                                                                            } else if ($pendaftaran['acc'] == 'ditolak') {
                                                                                echo '<span class="badge badge-danger">Ditolak</span>';
                                                                            } else if ($pendaftaran['acc'] == 'tidak_aktif') {
                                                                                echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                                                            }
                                                                            ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <b>
                                                            <span>
                                                                <a type="button" href="<?= base_url('penyelia/detail_nilai/') . $pendaftaran['id'] ?>" class="btn btn-info">Nilai</a>
                                                            </span>
                                                        </b>

                                                    </td>
                                                </tr>
                                                <?php echo form_open_multipart('penyelia/insertnilai'); ?>
                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="penilaian<?= $pendaftaran['id'] ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailModalLabel">Penilaian</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group" hidden>
                                                                    <label for="exampleFormControlInput1">User id</label>
                                                                    <input type="number" class="form-control" name="user_id" id="exampleFormControlInput1" placeholder="" value="<?= $pendaftaran['id']; ?>">
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Inovasi</label>
                                                                        <input type="number" class="form-control" name="inovasi" id="exampleFormControlInput1" placeholder="" value="">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Kerja Sama</label>
                                                                        <input type="number" class="form-control" name="kerja_sama" id="exampleFormControlInput1" placeholder="" value="">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Disiplin</label>
                                                                        <input type="number" class="form-control" name="disiplin" id="exampleFormControlInput1" placeholder="" value="">
                                                                    </div>



                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-success">Oke</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php echo form_close(); ?>

                                            <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END ISI INDEX         -->
            <!-- Footer -->

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