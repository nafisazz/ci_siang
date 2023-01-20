<div class="col-md-8 offset-md-2">
	<div class="card mb-5">
		<div class="card-header">
			Input Progress Project
		</div>
		<div class="card-body">


			<div class="form-group">

				<label for="id_kegiatan">Nama Penyelia</label>
				<input class="form-control" type="text" name="id_kegiatan" value="<?= $nm_penyelia['nama_peserta']; ?>" readonly>

				<label for="id_kegiatan " class="mt-2">Nama Project</label>
				<input class="form-control" type="text" name="id_kegiatan" value="<?php
																					if (isset($project['judul_tugas']) == null) {
																						echo "Belum ada tugas";
																					} else {
																						echo $project['judul_tugas'];
																					}
																					?>
					" readonly>

				<label class="mt-2">Progess</label>
				<div class="div">
					<div class="progress">
						<div class="progress-bar" role="progressbar" style="width: <?= $project['progress']; ?>%" aria-valuenow="<?= $project['progress']; ?>" aria-valuemin="0" aria-valuemax="100"><?= $project['progress']; ?>%</div>
					</div>
				</div>

				<div class="form-group mt-2">
					<label for="exampleFormControlTextarea1">Deskripsi Project</label>
					<textarea class="form-control" name="deskripsi_project" id="exampleFormControlTextarea1" rows="4" readonly><?= $project['deskripsi_tugas']; ?></textarea>
				</div>

				<hr class="mt-4 mb-4 bg-dark text-dark">
				</hr>

				<form action="<?php echo base_url('user/inserthistoryproject') ?>" method="POST">


					<h4>Entry History Kegiatan</h4>
					<label class=" mt-4">Kegiatan Hari ini</label>
					<textarea class="form-control" name="kegiatan" placeholder="Isi Kegiatan Hari ini" value="" required rows="4"></textarea>
					<label class=" mt-2">Progress saat ini</label>
					<input type="number" class="form-control" name="progress" placeholder="Progress saat ini" value="" required>
					<label class="mt-2">Catatan</label>
					<textarea class="form-control" name="catatan" placeholder="Catatan" value="" required></textarea>

			</div>


			<button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">SIMPAN</button>
			<button type="reset" class="btn btn-warning">RESET</button>

			</form>
		</div>
	</div>
</div>
