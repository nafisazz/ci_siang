<div class="col-md-12">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Seleksi</h6>
		</div>
		<div class="card-body">
			<div class="card text-center">
				<div class="card-body">
					<span class="badge badge-danger" style="font-size: 20px;">ANDA TIDAK LOLOS</span>
					<br><br>
					<p class="card-text">Anda belum lolos. Terima kasih telah mengikuti seleksi dengan baik.</p>
					<h4>Alasan</h4>
					<?php

					if (isset($nama['alasan']) != null) {	?>
						<div class="alert alert-danger" style="font-size: 18px;"><?= $nama['alasan']; ?>.</div>

					<?php } else { ?>

					<?php } ?>


				</div>
				<div class="card-footer text-muted">
					<marquee style="margin-bottom: -5px;">SISTEM INFORMASI MAGANG DPRD JAWA TENGAH</marquee>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
