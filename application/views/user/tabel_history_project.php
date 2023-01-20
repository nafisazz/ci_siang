<div class="card-body">



	<table class="table table-bordered table-striped" id="tableUser">
		<thead>
			<tr>

				<th>No</th>
				<th>Tanggal</th>
				<th>Isi Kegiatan</th>
				<th>Catatan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<?php $no = 1; ?>
		<?php foreach ($history_project as $k) : ?>


			<tr>


				<td><?= $no++; ?></td>
				<td>

					<?php
					$tahun = substr($k->date_created, 0, 4);
					$bulan = substr($k->date_created, 5, 2);
					$tanggal = substr($k->date_created, 8, 2);
					echo $tanggal . "-" . $bulan . "-" . $tahun;

					?>
				</td>

				<td><?= $k->isi_kegiatan ?></td>
				<td><?= $k->note ?></td>
				<td>


					<button class="btn btn-icon btn-2 btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#kegiatan<?= $k->id; ?>">
						<span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
					</button>

					<a href="<?php echo base_url('user/delete_history_project/' . $k->id) ?>" class="btn btn-icon btn-2 btn-sm btn-danger btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')" <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
					</a>

				</td>

			</tr>

			<div class="modal fade" id="kegiatan<?= $k->id; ?>">
				<div class="modal-dialog modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="detailModalLabel">Update History Project</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<?php echo form_open_multipart('kegiatan/updateKegiatan/' . $k->id); ?>

							<div class="form-group">
								<input type="text" name="id" value="<?= $k->id; ?>" hidden>
								<input type="text" name="user_id" value="<?= $k->user_id; ?>" hidden>
								<label for="exampleFormControlTextarea1">Kegiatan Hari ini</label>
								<textarea class="form-control" name="isi_kegiatan" id="exampleFormControlTextarea1" rows="3"><?= $k->isi_kegiatan; ?></textarea>


								<label for="exampleFormControlTextarea1">Progress</label>
								<input type="number" class="form-control" name="progress" placeholder="Progress saat ini" value="<?= $project['progress']; ?>" required>


								<label for="exampleFormControlTextarea1" class="mt-2">Catatan</label>
								<textarea class="form-control" name="catatan" id="exampleFormControlTextarea1" rows="3"><?= $k->note; ?></textarea>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button class="btn btn-primary" id="btnSubmit" type="submit" onclick="return confirm('Apakah anda yakin ingin menambahkan data ini?');">Add</button>
								</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>


				<?php endforeach; ?>

	</table>

</div>
