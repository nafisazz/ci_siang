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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php $this->load->view('dashboard/template/sidebar_user')?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('dashboard/template/topbar_user')?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
                    <div class="col-lg-6">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                        <form class="user" method="post" action="<?= base_url('User/editprofil') ?>" >

                            <div class="form-group row">
                                <label for="email" class="col-sm- col form-label"> Email </label> 
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email"  name="email" value="<?= $nama['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_peserta" class="col-sm- col form-label"> Nama </label> 
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_peserta"  name="nama_peserta" value="<?= $nama['nama_peserta']; ?>">
                                    <?= form_error('nama_peserta', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm- col form-label"> Alamat Rumah </label> 
                                <div class="col-sm-9">
                                    <input type="textarea" class="form-control" id="alamat"  name="alamat" value="<?= $nama['alamat']; ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?> 
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="agama" class="col-sm-2 col form-label"> Agama </label> 
                                <div class="col-sm-10">
									<select name="agama" id="agama" class="form-control" placeholder="Pilih Agama" value="">
										<option value="">Pilih Agama</option>
										<option value="islam">Islam</option>
										<option value="kristen">Kristen</option>
										<option value="katolik">Katolik</option>
										<option value="hindu">Hindu</option>
										<option value="budha">Budha</option>
                                    </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="asal_sekolah" class="col-sm- col form-label"> Asal Sekolah </label> 
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="asal_sekolah"  name="asal_sekolah" value="<?= $nama['asal_sekolah']; ?>">
                                    <?= form_error('asal_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jurusan" class="col-sm- col form-label"> Jurusan </label> 
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jurusan"  name="jurusan" value="<?= $nama['jurusan']; ?>">
                                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jurusan" class="col-sm- col form-label"> Nomor Induk Siswa/Mahasiswa </label> 
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nim"  name="nim" value="<?= $nama['nim']; ?>">
                                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jurusan" class="col-sm- col form-label"> Alamat Sekolah </label> 
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alamat_Sekolah"  name="alamat_sekolah" value="<?= $nama['alamat_sekolah']; ?>">
                                    <?= form_error('alamat_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telp" class="col-sm- col form-label"> No Telepon </label> 
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_telp"  name="no_telp" value="<?= $nama['no_telp']; ?>">
                                </div>
                            </div>

                            <?php
                            if(isset($nama['image']) && $nama['image'] != '') {
                                $image = '../uploads/' . $nama['image'] ;
                            } else {
                                $image = '../assets/img/profile/default.png';
                            }
                            ?>
                            <img src="<?= $image ?>" alt="foto profil" class="img-fluid" width="90px">

                            <input type="file" name="gambar" class="form-control mt-2">
                         
                            <br>
                            <button type="submit" class = "btn btn-primary"> Ubah </button>
                            
                        </form>
                        </div>                    
                            <!--<div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                <button type="submit" class = "btn btn-primary"> Ubah </button>
                            </div>-->
                        
                    </div>
            
                </div>
                <!-- /.container-fluid -->
               <!-- ISI HALAMAN -->

            </div>
            <!-- Footer -->
            
            
            <?php $this->load->view('dashboard/template/footer_user')?>
            <!-- End of Footer -->
        <!-- End of Content Wrapper -->
        </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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