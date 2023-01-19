<div class="col-md-8 offset-md-2">
	<div class="card mb-5">
		<div class="card-header">
			Input Kegiatan Siswa Magang
		</div>
		<div class="card-body">
			<form action="<?php echo base_url('kegiatan/insertkegiatan') ?>" method="POST">

				<div class="form-group">

					<label for="id_kegiatan">Nama Penyelia</label>
					<input class="form-control" type="text" name="id_kegiatan" value="Ayu Utaminingtyas" readonly>

					<label for="id_kegiatan " class="mt-2">Tugas</label>
					<input class="form-control" type="text" name="id_kegiatan" value="Membuat Perancangan dan relasi database" readonly>

					<label class="mt-2">Progess</label>
					<input class="form-control " type="text" name="id_kegiatan" value="50%">

					<div class="progress mt-2">
						<div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

					</div>


					<label class="mt-4">Kegiatan Hari ini</label>
					<textarea class="form-control" name="kegiatan" placeholder="Isi Kegiatan Hari ini" value=""></textarea>
				</div>


				<button type="submit" class="btn btn-primary">SIMPAN</button>
				<button type="reset" class="btn btn-warning">RESET</button>

			</form>
		</div>
	</div>
</div>
