<title>Registrasi Magang</title>
<link rel="icon" type="image/png" href="assets/img/logodpr.png">
<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">

				<div class="col-lg">
					<div class="p-5">
						
							<div class="text-center">
							<img src="../assets/img/logodpr.png" alt="Logo DPRD" class="logo-login" width="100px">
							<div class="p-2">

								<h1 class="h4 text-gray-900 mb-4">Registrasi Calon Peserta Magang</h1>
								
							</div>
						</div>
						<form class="user" method="post" action="<?= base_url('auth/registrasi'); ?>">

							<div class="form-group">
							<label for="nama_peserta">Nama Lengkap</label>
								<input type="text" class="form-control " id="nama_peserta" placeholder="" name="nama_peserta" value="<?= set_value('nama_peserta'); ?>">
								<?= form_error('nama_peserta', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
							<label for="alamat">Alamat Rumah</label>
								<input type="text" class="form-control " id="alamat" placeholder="" name="alamat" value="<?= set_value('alamat'); ?>">
								<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="">
								<label for="agama">Agama</label>
								<select name="agama" id="agama" class="form-control" placeholder="" value="<?= set_value('agama'); ?>">
									<option value="">Pilih Agama</option>
									<option value="islam">Islam</option>
									<option value="kristen">Kristen</option>
									<option value="katolik">Katolik</option>
									<option value="hindu">Hindu</option>
									<option value="budha">Budha</option>
								</select>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Jenis Kelamin</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="jenis_kel" id="lk" value="L">
										<label class="form-check-label" for="lk">
											Laki Laki
										</label>
										<?= form_error('jenis_kel', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="jenis_kel" id="pr" value="P">
										<label class="form-check-label" for="pr">
											Perempuan
										</label>
									</div>
								</div>
								<?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
							<label for="agama">Asal Sekolah</label>
								<input type="text" class="form-control " id="asal_sekolah" placeholder="" name="asal_sekolah" value="<?= set_value('asal_sekolah'); ?>">
								<?= form_error('asal_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
							<label for="alamat_sekolah">Alamat Sekolah</label>
								<input type="text" class="form-control " id="alamat" placeholder="" name="alamat_sekolah" value="<?= set_value('alamat_sekolah'); ?>">
								<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
							<label for="jurusan">Jurusan</label>
								<input type="text" class="form-control " id="jurusan" placeholder="" name="jurusan" value="<?= set_value('jurusan'); ?>">
								<?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
							<label for="jurusan">Nomor Induk Siswa / Mahasiswa</label>
								<input type="text" class="form-control " id="nim" placeholder="" name="nim" value="<?= set_value('nim'); ?>">
								<?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<!--  -->
							<div class="form-group">
							<label for="email">Alamat Email</label>
								<input type="text" class="form-control " id="email" placeholder="" name="email" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
							<label for="no_telp">Nomor Telepon</label>
								<input type="text" class="form-control " id="no_telp" placeholder="" name="no_telp" value="<?= set_value('no_telp'); ?>">
								<?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control " id="password1" name="password1" placeholder="Password">
									<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control " id="password2" name="password2" placeholder="Ulangi Password">
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
								</a>
								</button>	
								
								<!-- <button type="submit" class="btn btn-google btn-user btn-block">
									<i class="fab fa-google fa-fw"></i> Register with Google
									</a>
								</button>	 -->
						</form>
						<hr>
						<!-- <div class="text-center">
							<a class="small" href="forgot-password.html">Lupa Password?</a>
						</div> -->
						<div class="text-center">
							<a class="small" href="../">Sudah Punya Akun? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
