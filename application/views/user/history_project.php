<div class="card-body">



	<table class="table table-bordered table-striped" id="tableUser">
		<thead>
			<tr>

				<th>No</th>
				<th>Tanggal</th>
				<th>Jam</th>
				<th>Kegiatan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<?php $no = 1; ?>
		<?php foreach ($kegiatan as $k) : ?>


			<tr>


				<td><?= $no++; ?></td>
				<td>

					<?php
					$tahun = substr($k->tanggal, 0, 4);
					$bulan = substr($k->tanggal, 5, 2);
					$tanggal = substr($k->tanggal, 8, 2);
					echo $tanggal . "-" . $bulan . "-" . $tahun;

					?>
				</td>
				<td>
					<?php
					$w = substr($k->tanggal, 11, 2);
					$menit = substr($k->tanggal, 14, 2);
					$detik = substr($k->tanggal, 17, 2);

					echo $w . ":" . $menit . ":" . $detik;
					?>
				</td>
				<td><?= $k->isi_kegiatan ?></td>
				<td>


					<button class="btn btn-icon btn-2 btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#kegiatan<?= $k->id; ?>">
						<span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
					</button>

					<a href="<?php echo base_url('kegiatan/deletekegiatan/' . $k->id) ?>" class="btn btn-icon btn-2 btn-sm btn-danger btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')" <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
					</a>

				</td>

			</tr>

			<hr class="sidebar-divider d-none d-md-block">


			<div class="modal fade" id="kegiatan<?= $k->id; ?>">
				<div class="modal-dialog modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="detailModalLabel">Entry Project</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>


						<div class="modal-body">
							<?php echo form_open_multipart('kegiatan/updateKegiatan/' . $k->id); ?>

							<div class="form-group">
								<label for="exampleFormControlTextarea1">Kegiatan Hari ini</label>
								<textarea class="form-control" name="isi_kegiatan" id="exampleFormControlTextarea1" rows="3"><?= $k->isi_kegiatan; ?></textarea>

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
