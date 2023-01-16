<div class="col-md-12">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">MASUKKAN DATA ANDA</h6>
		</div>
		<form class="user" method="post" action="<?= base_url('user/submitform') ?>">
			<div class="card-body ">
				<p class="text">pilih tanggal mulai magang</p>
				<input type="date" name="tgl_mulai" id="tgl_mulai" placeholder="" autocomplete="off" class="form-control w-50" value="<?= set_value('tgl_mulai'); ?>">
			</div>
			<div class="card-body">
				<p class="text">pilih tanggal selesai magang</p>
				<input type="date" name="tgl_selesai" id="tgl_selesai" placeholder="" autocomplete="off" class="form-control w-50" value="<?= set_value('tgl_selesai'); ?>">
			</div>
			<div class="card-body">
				<p class="text">Pilih Divisi</p>
				<select name="divisi" id="divisi" class="form-control w-50" placeholder="Pilih Divisi" value="<?= set_value('divisi'); ?>">
					<?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
					<option value="">Pilih Divisi</option>
					<?php foreach ($divisi as $dv) : ?>
						<option value="<?= $dv->id ?>"><?= $dv->divisi ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="card-body">
				<label> <label for="varchar"> Upload Surat Keterangan Magang</label>
					<input type="file" name="surat_ket" value="surat_ket">
					<?= form_error('surat_ket', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<input type="hidden" name="status" value="1">
			<br>
			<hr>
			<div class="card-body text-right">
				<button type="submit" name="btn_simpan" id="btnSubmit" value="simpan_nilai" class="btn btn-primary">Simpan</button>
				<!-- <a href="index.php" class="btn btn-danger">Kembali</a> -->
			</div>

	</div>
	</form>
</div>
</div>
