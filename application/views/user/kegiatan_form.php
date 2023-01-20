<div class="col-md-8 offset-md-2">
	<div class="card mb-4">
		<div class="card-header">
			Input Kegiatan Siswa Magang
		</div>
		<div class="card-body">
			<form action="<?php echo base_url('kegiatan/insertkegiatan') ?>" method="POST">

				<div class="form-group">

					<label>Kegiatan Hari ini</label>
					<textarea class="form-control" name="kegiatan" placeholder="Isi Kegiatan Hari ini" value="" required></textarea>
				</div>

				<button type="submit" class="btn btn-primary">SIMPAN</button>
				<button type="reset" class="btn btn-warning">RESET</button>

			</form>
		</div>
	</div>
</div>
